/* ООП славянам — навигация без перезагрузки, плеер и мелкие удобства. */
(function () {
	'use strict';

	var CONSENT_KEY = 'oop-audio-consent';
	var VOLUME_KEY = 'oop-audio-volume';
	var TIME_KEY = 'oop-video-time';
	var DEFAULT_VOLUME = 0.6;

	var content = document.getElementById('content');
	var player = document.getElementById('player');
	var video = document.getElementById('soundtrack');
	var consent = document.getElementById('consent');
	var toast = document.getElementById('toast');
	var siteNav = document.getElementById('site-nav');
	var navToggle = document.querySelector('.nav-toggle');
	var submenu = document.querySelector('.has-submenu');
	var submenuToggle = document.querySelector('.submenu-toggle');
	var volumeInput = document.querySelector('.player__volume');
	var progressBar = document.querySelector('.player__progress span');

	var toastTimer = null;
	var saveTimer = null;
	var navigationController = null;

	function $(selector, root) {
		return (root || document).querySelector(selector);
	}

	function $$(selector, root) {
		return Array.prototype.slice.call((root || document).querySelectorAll(selector));
	}

	function clamp(value, min, max) {
		return Math.min(max, Math.max(min, value));
	}

	function readStorage(store, key) {
		try {
			return store.getItem(key);
		} catch (error) {
			return null;
		}
	}

	function writeStorage(store, key, value) {
		try {
			store.setItem(key, value);
		} catch (error) {
			/* Приватный режим и запрет storage — не повод ломать сайт. */
		}
	}

	function showToast(message) {
		if (!toast) {
			return;
		}
		toast.textContent = message;
		toast.classList.add('is-visible');
		window.clearTimeout(toastTimer);
		toastTimer = window.setTimeout(function () {
			toast.classList.remove('is-visible');
		}, 2200);
	}

	/* ---------------- Плеер ---------------- */

	function updatePlayButton() {
		if (!player || !video) {
			return;
		}
		var paused = video.paused;
		player.classList.toggle('is-paused', paused);
		$$('[data-player="toggle"]', player).forEach(function (button) {
			button.setAttribute('aria-label', paused ? 'Воспроизвести' : 'Пауза');
		});
	}

	function updateMuteButton() {
		if (!player || !video) {
			return;
		}
		player.classList.toggle('is-muted', video.muted);
		var button = $('[data-player="mute"]', player);
		if (button) {
			button.setAttribute('aria-label', video.muted ? 'Включить звук' : 'Выключить звук');
		}
	}

	function updateProgress() {
		if (!video || !progressBar || !isFinite(video.duration) || video.duration <= 0) {
			return;
		}
		var percent = clamp((video.currentTime / video.duration) * 100, 0, 100);
		progressBar.style.width = percent + '%';
	}

	function saveVideoTime() {
		if (!video) {
			return;
		}
		writeStorage(window.sessionStorage, TIME_KEY, String(video.currentTime || 0));
	}

	function restoreVideoTime() {
		if (!video || !isFinite(video.duration) || video.duration <= 0) {
			return;
		}
		var saved = parseFloat(readStorage(window.sessionStorage, TIME_KEY) || '0');
		if (isFinite(saved) && saved > 0 && saved < video.duration - 1) {
			video.currentTime = saved;
		}
	}

	function playMuted() {
		if (!video) {
			return;
		}
		video.muted = true;
		updateMuteButton();
		var promise = video.play();
		if (promise && typeof promise.catch === 'function') {
			promise.catch(function () {
				updatePlayButton();
			});
		}
	}

	function playWithSound() {
		if (!video) {
			return;
		}
		video.muted = false;
		if (video.volume === 0) {
			video.volume = DEFAULT_VOLUME;
		}
		updateMuteButton();
		var promise = video.play();
		if (promise && typeof promise.catch === 'function') {
			promise.catch(function () {
				playMuted();
				if (player) {
					player.classList.add('player--needs-gesture');
				}
				if (readStorage(window.sessionStorage, 'oop-audio-hint-shown') !== '1') {
					writeStorage(window.sessionStorage, 'oop-audio-hint-shown', '1');
					showToast('Браузер не разрешил звук. Нажмите на динамик в плеере.');
				}
			});
		}
	}

	function toggleVideo() {
		if (!video) {
			return;
		}
		if (video.paused) {
			var promise = video.play();
			if (promise && typeof promise.catch === 'function') {
				promise.catch(function () {
					showToast('Нажмите ещё раз, чтобы запустить видео.');
				});
			}
		} else {
			video.pause();
		}
	}

	function unmuteVideo() {
		if (!video) {
			return;
		}
		video.muted = false;
		if (video.volume === 0) {
			video.volume = DEFAULT_VOLUME;
		}
		if (player) {
			player.classList.remove('player--needs-gesture');
		}
		updateMuteButton();
		if (video.paused) {
			var promise = video.play();
			if (promise && typeof promise.catch === 'function') {
				promise.catch(function () {
					showToast('Браузер заблокировал запуск. Нажмите на видео.');
				});
			}
		}
	}

	function initPlayer() {
		if (!video) {
			return;
		}

		var storedVolume = parseFloat(readStorage(window.localStorage, VOLUME_KEY));
		if (isFinite(storedVolume)) {
			video.volume = clamp(storedVolume, 0, 1);
		} else {
			video.volume = DEFAULT_VOLUME;
		}
		if (volumeInput) {
			volumeInput.value = String(video.volume);
		}

		video.addEventListener('play', updatePlayButton);
		video.addEventListener('pause', updatePlayButton);
		video.addEventListener('volumechange', function () {
			if (volumeInput) {
				volumeInput.value = String(video.volume);
			}
			writeStorage(window.localStorage, VOLUME_KEY, String(video.volume));
			updateMuteButton();
		});
		video.addEventListener('timeupdate', updateProgress);
		video.addEventListener('loadedmetadata', restoreVideoTime);
		video.addEventListener('timeupdate', function () {
			if (saveTimer) {
				return;
			}
			saveTimer = window.setTimeout(function () {
				saveTimer = null;
				saveVideoTime();
			}, 2000);
		});
		video.addEventListener('click', toggleVideo);

		if (video.readyState >= 1) {
			restoreVideoTime();
		}

		if (volumeInput) {
			volumeInput.addEventListener('input', function () {
				video.volume = clamp(parseFloat(volumeInput.value) || 0, 0, 1);
				video.muted = video.volume === 0;
				updateMuteButton();
			});
		}

		window.addEventListener('beforeunload', saveVideoTime);
		updatePlayButton();
		updateMuteButton();

		var savedConsent = readStorage(window.localStorage, CONSENT_KEY);
		if (savedConsent === 'yes') {
			playWithSound();
		} else if (savedConsent === 'no') {
			playMuted();
		} else {
			playMuted();
			window.setTimeout(showConsent, 700);
		}
	}

	function showConsent() {
		if (!consent) {
			return;
		}
		consent.hidden = false;
		var firstButton = $('[data-consent="yes"]', consent);
		if (firstButton) {
			window.setTimeout(function () {
				firstButton.focus();
			}, 30);
		}
	}

	function hideConsent() {
		if (!consent) {
			return;
		}
		consent.hidden = true;
	}

	function applyConsent(value) {
		writeStorage(window.localStorage, CONSENT_KEY, value);
		hideConsent();
		if (value === 'yes') {
			playWithSound();
			showToast('Звук включён. Плеер можно свернуть.');
		} else {
			playMuted();
			showToast('Видео играет без звука. Включить его можно в плеере.');
		}
	}

	function initConsent() {
		if (!consent) {
			return;
		}

		consent.addEventListener('click', function (event) {
			var button = event.target.closest('[data-consent]');
			if (!button) {
				return;
			}
			var value = button.getAttribute('data-consent');
			if (value === 'yes' || value === 'no') {
				applyConsent(value);
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape' && !consent.hidden) {
				applyConsent('no');
			}
		});
	}

	/* ---------------- Кнопки плеера ---------------- */

	function syncPlayerLayout() {
		if (!player) {
			return;
		}

		var smallScreen = window.matchMedia('(max-width: 960px)').matches;
		if (document.body.classList.contains('is-home') && !smallScreen) {
			player.classList.remove('is-collapsed');
			return;
		}

		if (player.getAttribute('data-user-expanded') !== 'true') {
			player.classList.add('is-collapsed');
		}
	}

	function initPlayerButtons() {
		document.addEventListener('click', function (event) {
			var button = event.target.closest('[data-player]');
			if (!button) {
				return;
			}

			var action = button.getAttribute('data-player');

			if (action === 'toggle') {
				toggleVideo();
			} else if (action === 'mute') {
				if (video.muted) {
					unmuteVideo();
				} else {
					video.muted = true;
					updateMuteButton();
				}
			} else if (action === 'unmute') {
				unmuteVideo();
			} else if (action === 'collapse') {
				if (player) {
					player.classList.toggle('is-collapsed');
					var collapsed = player.classList.contains('is-collapsed');
					player.setAttribute('data-user-expanded', collapsed ? 'false' : 'true');
					button.setAttribute('aria-label', collapsed ? 'Развернуть плеер' : 'Свернуть плеер');
				}
			} else if (action === 'open') {
				if (player) {
					player.classList.remove('is-collapsed');
					player.setAttribute('data-user-expanded', 'true');
					var collapseButton = $('[data-player="collapse"]', player);
					if (collapseButton) {
						collapseButton.setAttribute('aria-label', 'Свернуть плеер');
					}
					var muteButton = $('[data-player="mute"]', player);
					if (muteButton) {
						muteButton.focus();
					}
				}
			}
		});
	}

	/* ---------------- Мобильное меню ---------------- */

	function closeMobileNav() {
		if (siteNav) {
			siteNav.classList.remove('is-open');
		}
		if (navToggle) {
			navToggle.setAttribute('aria-expanded', 'false');
		}
		if (submenu) {
			submenu.classList.remove('is-open');
		}
		if (submenuToggle) {
			submenuToggle.setAttribute('aria-expanded', 'false');
		}
		// Если фокус был внутри скрытого списка, вернуть его на кнопку.
		if (submenu && submenuToggle && submenu.contains(document.activeElement)) {
			submenuToggle.focus();
		}
	}

	function initNavigation() {
		if (navToggle && siteNav) {
			navToggle.addEventListener('click', function () {
				var open = siteNav.classList.toggle('is-open');
				navToggle.setAttribute('aria-expanded', String(open));
			});
		}

		if (submenuToggle && submenu) {
			submenuToggle.addEventListener('click', function (event) {
				event.preventDefault();
				var open = submenu.classList.toggle('is-open');
				submenuToggle.setAttribute('aria-expanded', String(open));
			});
		}

		document.addEventListener('click', function (event) {
			if (!event.target.closest('.site-header')) {
				closeMobileNav();
			}
		});

		document.addEventListener('keydown', function (event) {
			if (event.key === 'Escape') {
				closeMobileNav();
			}
		});
	}

	/* ---------------- Подсветка и кнопки копирования ---------------- */

	function copyText(text) {
		if (navigator.clipboard && navigator.clipboard.writeText) {
			return navigator.clipboard.writeText(text).then(function () {
				return true;
			}).catch(function () {
				return false;
			});
		}

		try {
			var area = document.createElement('textarea');
			area.value = text;
			area.setAttribute('readonly', 'readonly');
			area.style.position = 'fixed';
			area.style.left = '-9999px';
			document.body.appendChild(area);
			area.select();
			var copied = document.execCommand('copy');
			document.body.removeChild(area);
			return Promise.resolve(copied);
		} catch (error) {
			return Promise.resolve(false);
		}
	}

	function enhanceCodeBlocks(root) {
		$$('.script', root).forEach(function (script) {
			if (script.getAttribute('data-enhanced') === 'true') {
				return;
			}
			var code = $('code', script);
			var bar = $('.script-article', script);
			if (!code || !bar) {
				return;
			}
			script.setAttribute('data-enhanced', 'true');

			var button = document.createElement('button');
			button.type = 'button';
			button.className = 'copy-btn';
			button.textContent = 'Копировать';
			button.setAttribute('aria-label', 'Скопировать код');

			button.addEventListener('click', function () {
				copyText(code.textContent).then(function (ok) {
					if (ok) {
						button.textContent = 'Скопировано';
						showToast('Код скопирован.');
						window.setTimeout(function () {
							button.textContent = 'Копировать';
						}, 1600);
					} else {
						showToast('Не удалось скопировать. Выделите код вручную.');
					}
				});
			});

			bar.appendChild(button);
		});
	}

	function highlightCode() {
		if (window.Rainbow && typeof window.Rainbow.color === 'function') {
			try {
				window.Rainbow.color();
			} catch (error) {
				/* Если Rainbow споткнулся — код всё равно должен читаться. */
			}
		}
	}

	function initSolutions(root) {
		$$('.solution', root).forEach(function (details) {
			if (details.getAttribute('data-enhanced') === 'true') {
				return;
			}
			details.setAttribute('data-enhanced', 'true');

			var label = $('.solution__summary-main', details);
			if (!label) {
				return;
			}

			var syncLabel = function () {
				label.textContent = details.open ? 'Скрыть решение' : 'Показать решение';
			};

			details.addEventListener('toggle', syncLabel);
			syncLabel();
		});
	}

	function enhanceContent(root) {
		enhanceCodeBlocks(root);
		initSolutions(root);
		highlightCode();
	}

	/* ---------------- Переходы без перезагрузки ---------------- */

	function normalizePath(pathname) {
		var path = pathname || '/';

		if (/\.(?:php|html)$/i.test(path)) {
			return path.replace(/\.(?:php|html)$/i, '');
		}

		path = path.replace(/\/+$/, '');
		return (path || '') + '/index';
	}

	function updateActiveNav() {
		var current = normalizePath(window.location.pathname);
		$$('.site-nav a[data-nav]').forEach(function (link) {
			var url;
			try {
				url = new URL(link.href, window.location.href);
			} catch (error) {
				return;
			}
			if (normalizePath(url.pathname) === current) {
				link.setAttribute('aria-current', 'page');
			} else {
				link.removeAttribute('aria-current');
			}
		});

		if (submenu) {
			submenu.classList.toggle('is-active', /\/lb\d+$/i.test(current));
		}
	}

	function scrollToHash(hash) {
		var id = decodeURIComponent(String(hash || '').replace(/^#/, ''));
		if (!id) {
			return;
		}
		var element = document.getElementById(id);
		if (element) {
			if (element.tagName === 'DETAILS') {
				element.open = true;
			}
			element.scrollIntoView({ behavior: 'smooth', block: 'start' });
		}
	}

	function isInternalPage(url) {
		if (url.origin !== window.location.origin) {
			return false;
		}
		return /\.(?:php|html)$/i.test(url.pathname) || url.pathname === '/' || /\/$/.test(url.pathname);
	}

	function shouldHandleLink(event, link) {
		if (!link || event.defaultPrevented || event.button !== 0) {
			return false;
		}
		if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
			return false;
		}
		if (link.target && link.target !== '_self') {
			return false;
		}
		if (link.hasAttribute('download') || link.getAttribute('data-no-spa') === 'true') {
			return false;
		}
		var href = link.getAttribute('href');
		if (!href || href.charAt(0) === '#' || /^(mailto:|tel:|javascript:)/i.test(href)) {
			return false;
		}
		return true;
	}

	function navigate(url, options) {
		var settings = options || {};
		var target;
		try {
			target = new URL(url, window.location.href);
		} catch (error) {
			window.location.href = url;
			return;
		}

		if (!content) {
			window.location.href = target.href;
			return;
		}

		if (settings.push !== false) {
			try {
				history.replaceState(
					Object.assign({}, history.state || {}, { scrollY: window.scrollY }),
					'',
					window.location.href
				);
			} catch (error) {
				/* ignore */
			}
		}

		if (navigationController) {
			navigationController.abort();
		}
		navigationController = new AbortController();

		content.classList.add('is-loading');
		document.body.classList.add('is-navigating');

		fetch(target.href, {
			signal: navigationController.signal,
			headers: { 'X-Requested-With': 'fetch' }
		})
			.then(function (response) {
				if (!response.ok) {
					throw new Error('HTTP ' + response.status);
				}
				return response.text();
			})
			.then(function (html) {
				var parsed = new DOMParser().parseFromString(html, 'text/html');
				var nextContent = parsed.querySelector('#content');
				if (!nextContent) {
					window.location.href = target.href;
					return;
				}

				content.innerHTML = nextContent.innerHTML;
				document.title = parsed.title;
				if (parsed.body) {
					document.body.className = parsed.body.className;
				}
				document.body.classList.add('is-navigating');

				if (settings.push !== false) {
					history.pushState({ url: target.href, scrollY: 0 }, '', target.href);
				}

				enhanceContent(content);
				updateActiveNav();
				syncPlayerLayout();
				closeMobileNav();

				if (target.hash) {
					window.requestAnimationFrame(function () {
						scrollToHash(target.hash);
					});
				} else if (settings.restoreScroll && history.state && typeof history.state.scrollY === 'number') {
					window.scrollTo(0, history.state.scrollY);
				} else {
					window.scrollTo(0, 0);
				}

				content.focus({ preventScroll: true });

				if (typeof window.ym === 'function') {
					try {
						window.ym(62053039, 'hit', target.href);
					} catch (error) {
						/* ignore */
					}
				}
			})
			.catch(function (error) {
				if (error && error.name === 'AbortError') {
					return;
				}
				window.location.href = target.href;
			})
			.finally(function () {
				content.classList.remove('is-loading');
				document.body.classList.remove('is-navigating');
			});
	}

	function initSpaNavigation() {
		document.addEventListener('click', function (event) {
			var link = event.target.closest('a');

			if (link && !event.defaultPrevented && event.button === 0) {
				var rawHref = link.getAttribute('href');
				if (rawHref && rawHref.charAt(0) === '#') {
					event.preventDefault();
					scrollToHash(rawHref);
					return;
				}
			}

			if (!shouldHandleLink(event, link)) {
				return;
			}

			var url;
			try {
				url = new URL(link.href, window.location.href);
			} catch (error) {
				return;
			}

			if (!isInternalPage(url)) {
				return;
			}

			if (normalizePath(url.pathname) === normalizePath(window.location.pathname) && url.search === window.location.search) {
				event.preventDefault();
				if (url.hash) {
					scrollToHash(url.hash);
				} else {
					window.scrollTo({ top: 0, behavior: 'smooth' });
				}
				return;
			}

			event.preventDefault();
			navigate(url.href, { push: true });
		});

		window.addEventListener('popstate', function () {
			navigate(window.location.href, { push: false, restoreScroll: true });
		});

		try {
			history.replaceState(
				Object.assign({}, history.state || {}, { scrollY: window.scrollY }),
				'',
				window.location.href
			);
		} catch (error) {
			/* ignore */
		}
	}

	/* ---------------- Запуск ---------------- */

	function init() {
		enhanceContent(document);
		updateActiveNav();
		initNavigation();
		initConsent();
		initPlayerButtons();
		initPlayer();
		syncPlayerLayout();
		initSpaNavigation();

		var playerMedia = window.matchMedia('(max-width: 960px)');
		if (typeof playerMedia.addEventListener === 'function') {
			playerMedia.addEventListener('change', syncPlayerLayout);
		} else if (typeof playerMedia.addListener === 'function') {
			playerMedia.addListener(syncPlayerLayout);
		}

		if (window.location.hash) {
			window.setTimeout(function () {
				scrollToHash(window.location.hash);
			}, 80);
		}
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
