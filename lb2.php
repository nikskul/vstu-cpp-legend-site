<?php
$pageTitle = 'Лабораторная работа 2 — Линейные вычислительные процессы';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 2</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 02</span>
				<span class="lab-hero__topic">линейные алгоритмы</span>
			</div>
			<h1>Любите C++ таким, какой он есть.</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Изучение принципов алгоритмизации линейных вычислительных процессов. Исследование структуры программ, типов данных. Получение навыков отладки программ.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<blockquote class="callout">
					<p>Узрите великую мощь С++, здесь нет места ##### как в С. Дойдем до Python вообще дзен познаем.</p>
				</blockquote>

				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>С клавиатуры вводится произвольное целое четырехзначное число (например – 7824. Необходимо вывести на экран числа из которых оно состоит в обратном порядке (в примере – 4287).</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>С клавиатуры вводится сумма депозита и количество месяцев хранения денег в банке. Необходимо провести расчет и показать на экран прибыль с депозита в месяц, за весь срок депозита, и общую сумму к выплате в конце срока. Валюта – Российский рубль. Процентная ставка – 6,6% годовых.</p>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Сначала попробуйте написать программу самостоятельно. Ниже — полные решения с разбором и примерами вывода.</p>
						<?php include 'includes/solutions/lb2.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb1.php">
						<span>Предыдущая</span>
						Лабораторная работа 1
					</a>
					<a href="lb3.php">
						<span>Следующая</span>
						Лабораторная работа 3
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">Задание 1</a></li>
						<li><a href="#task-2">Задание 2</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					Для задания 2 используйте месячную ставку: 6,6% / 12. Прибыль за месяц считается от суммы депозита.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
