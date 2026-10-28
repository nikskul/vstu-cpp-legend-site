	</main>

	<footer class="site-footer">
		<div class="shell site-footer__inner">
			<p><strong>ООП славянам!</strong> © <?= date('Y') ?></p>
			<p>Сделано на C++ и боли. Видео играет, пока вы страдаете.</p>
		</div>
	</footer>

	<aside class="player is-paused is-muted<?= $bodyClass === 'is-home' ? '' : ' is-collapsed' ?>" id="player" aria-label="Фоновый видеоплеер">
		<div class="player__video-wrap">
			<video id="soundtrack" class="player__video" src="includes/Halogen - U Got That.mp4" loop playsinline preload="metadata"></video>
			<div class="player__badge" aria-hidden="true">live</div>
			<button class="player__big-toggle" type="button" data-player="toggle" aria-label="Воспроизвести">
				<svg class="icon-pause" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 5h4v14H7zM13 5h4v14h-4z"/></svg>
				<svg class="icon-play" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
			</button>
		</div>

		<div class="player__body">
			<div class="player__meta">
				<span class="player__kicker">саундтрек</span>
				<strong class="player__title">Halogen — U Got That</strong>
			</div>

			<div class="player__controls">
				<button class="player__btn" type="button" data-player="toggle" aria-label="Пауза">
					<svg class="icon-pause" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 5h4v14H7zM13 5h4v14h-4z"/></svg>
					<svg class="icon-play" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
				</button>
				<button class="player__btn" type="button" data-player="mute" aria-label="Выключить звук">
					<svg class="icon-volume" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 9v6h4l5 4V5L8 9H4zm12.5 3a4.5 4.5 0 0 0-2.5-4.03v8.06A4.5 4.5 0 0 0 16.5 12z"/></svg>
					<svg class="icon-muted" viewBox="0 0 24 24" aria-hidden="true"><path d="M4 9v6h4l5 4V5L8 9H4zm13.6 3 2.7-2.7-1.4-1.4-2.7 2.7-2.7-2.7-1.4 1.4 2.7 2.7-2.7 2.7 1.4 1.4 2.7-2.7 2.7 2.7 1.4-1.4z"/></svg>
				</button>
				<input class="player__volume" type="range" min="0" max="1" step="0.01" value="0.6" aria-label="Громкость">
				<button class="player__btn player__btn--collapse" type="button" data-player="collapse" aria-label="Свернуть плеер">
					<svg class="icon-collapse" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 11h14v2H5z"/></svg>
					<svg class="icon-expand" viewBox="0 0 24 24" aria-hidden="true"><path d="M11 5h2v6h6v2h-6v6h-2v-6H5v-2h6z"/></svg>
				</button>
			</div>

			<div class="player__progress" aria-hidden="true"><span></span></div>
		</div>
	</aside>

	<div class="consent" id="consent" role="dialog" aria-modal="true" aria-labelledby="consent-title" hidden>
		<div class="consent__backdrop"></div>
		<div class="consent__card">
			<span class="consent__kicker">саундтрек сайта</span>
			<h2 id="consent-title">Врубить Halogen — U Got That?</h2>
			<p>Видео будет играть фоном на всех страницах. Звук включится только с вашего согласия.</p>
			<div class="consent__actions">
				<button class="btn btn--primary" type="button" data-consent="yes">Да, со звуком</button>
				<button class="btn btn--ghost" type="button" data-consent="no">Нет, без звука</button>
			</div>
			<p class="consent__note">Выбор запомнится. Плеер можно выключить в любой момент.</p>
		</div>
	</div>

	<div class="toast" id="toast" role="status" aria-live="polite"></div>

	<noscript>
		<div class="noscript-note">Без JavaScript видео на каждой странице будет начинаться заново, а звук можно включить обычными кнопками плеера.</div>
	</noscript>

	<script src="js/rainbow-custom.min.js"></script>
	<script src="js/c.js"></script>
	<script src="js/app.js"></script>
</body>
</html>
