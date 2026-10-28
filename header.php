<?php
$currentPage = basename($_SERVER['PHP_SELF'] ?? 'index.php');
$isLab = strpos($currentPage, 'lb') === 0;
$bodyClass = $currentPage === 'index.php' ? 'is-home' : ($isLab ? 'is-lab' : 'is-page');

function nav_current($page, $currentPage)
{
    return $page === $currentPage ? ' aria-current="page"' : '';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#4a4f34">
	<title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' — ООП славянам!' : 'ООП славянам!' ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/rainbow.css">
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	   ym(62053039, "init", {
	        clickmap:true,
	        trackLinks:true,
	        accurateTrackBounce:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/62053039" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<body class="<?= htmlspecialchars($bodyClass) ?>">
	<a class="skip-link" href="#content">Перейти к содержимому</a>

	<header class="site-header">
		<div class="shell site-header__inner">
			<a class="brand" href="index.php" aria-label="ООП славянам — на главную">
				<img class="brand__logo" src="img/logo.gif" alt="Логотип ООП славянам">
				<span class="brand__text">
					<span class="brand__title">ООП славянам!</span>
					<span class="brand__subtitle">курс выживания</span>
				</span>
			</a>

			<button class="nav-toggle" type="button" aria-controls="site-nav" aria-expanded="false">
				<span class="nav-toggle__lines" aria-hidden="true"></span>
				<span>Меню</span>
			</button>

			<nav class="site-nav" id="site-nav" aria-label="Основная навигация">
				<ul class="site-nav__list">
					<li><a href="index.php" data-nav="home"<?= nav_current('index.php', $currentPage) ?>>Главная</a></li>
					<li><a href="kursach.php" data-nav="kursach"<?= nav_current('kursach.php', $currentPage) ?>>Курсовой проект</a></li>
					<li class="has-submenu<?= $isLab ? ' is-active' : '' ?>">
						<button class="submenu-toggle" type="button" aria-haspopup="true" aria-expanded="false">
							<span>Лабораторные работы</span>
							<img src="img/caret-down-solid.svg" alt="" aria-hidden="true">
						</button>
						<ul class="submenu">
							<li><a href="lb1.php" data-nav="lab"<?= nav_current('lb1.php', $currentPage) ?>>Лабораторная работа 1</a></li>
							<li><a href="lb2.php" data-nav="lab"<?= nav_current('lb2.php', $currentPage) ?>>Лабораторная работа 2</a></li>
							<li><a href="lb3.php" data-nav="lab"<?= nav_current('lb3.php', $currentPage) ?>>Лабораторная работа 3</a></li>
							<li><a href="lb4.php" data-nav="lab"<?= nav_current('lb4.php', $currentPage) ?>>Лабораторная работа 4</a></li>
							<li><a href="lb5.php" data-nav="lab"<?= nav_current('lb5.php', $currentPage) ?>>Лабораторная работа 5</a></li>
							<li><a href="lb6.php" data-nav="lab"<?= nav_current('lb6.php', $currentPage) ?>>Лабораторная работа 6</a></li>
							<li><a href="lb7.php" data-nav="lab"<?= nav_current('lb7.php', $currentPage) ?>>Лабораторная работа 7</a></li>
							<li><a href="lb8.php" data-nav="lab"<?= nav_current('lb8.php', $currentPage) ?>>Лабораторная работа 8</a></li>
						</ul>
					</li>
					<li><a href="class.php" data-nav="class"<?= nav_current('class.php', $currentPage) ?>>Классы и методы</a></li>
					<li class="site-nav__github">
						<a href="https://github.com/nikskul/vstu-cpp-legend-site" target="_blank" rel="noopener noreferrer" aria-label="Исходный код проекта на GitHub" title="GitHub проекта">
							<svg viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg>
							<span class="site-nav__github-label">GitHub</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<main id="content" class="site-content" tabindex="-1">
