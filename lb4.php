<?php
$pageTitle = 'Лабораторная работа 4 — Структуры';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 4</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 04</span>
				<span class="lab-hero__topic">struct</span>
			</div>
			<h1>Добро пожаловать в структуру.</h1>
			<p class="lab-hero__goal">Изучение принципов построения программ. Исследование типа данных struct. Получение навыков отладки программ.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание</h2>
					</div>
					<div class="task__body">
						<p>Оригинальное задание находится по внешней ссылке.</p>
						<div class="callout callout--link">
							<p>Файл с заданием на Google Drive.</p>
							<a class="btn btn--small" href="https://drive.google.com/file/d/1lKw7WfM6gbyIssbjIno6MhhwONB6Tofn/view" target="_blank" rel="noopener">Ссыль</a>
						</div>
						<p>Если ссылка недоступна, ниже есть типовое решение по теме «структуры»: массив структур, ввод данных, вывод и поиск нужного элемента.</p>
					</div>
				</section>

				<details class="solution" id="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Точная формулировка задания была по внешней ссылке. Ниже — типовое решение по теме лабораторной, а не попытка угадать конкретные пункты из файла.</p>
						<?php include 'includes/solutions/lb4.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb3.php">
						<span>Предыдущая</span>
						Лабораторная работа 3
					</a>
					<a href="lb5.php">
						<span>Следующая</span>
						Лабораторная работа 5
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">Задание</a></li>
						<li><a href="#solution">Решение</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Важно</strong>
					Ссылка на Google Drive может быть недоступна. В этом случае ориентируйтесь на типовое решение и цель работы.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
