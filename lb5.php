<?php
$pageTitle = 'Лабораторная работа 5 — Функции C++';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 5</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 05</span>
				<span class="lab-hero__topic">функции</span>
			</div>
			<h1>Функции С++</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Создать функциональную функцию.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>Возведение числа n в степень p - это умножение числа n на себя p раз. Напишите функцию с именем power(), которая в качестве аргументов принимает значение типа double для n и значение типа int для p и возвращает значение типа double. Для аргугумента, соответствующего степени числа, задайте значение по умолчанию, равное 2, чтобы при отсутствии показателя степени при вызове функции число n возводилось в квадрат. Напишите функцию main(), которая запрашивает у пользователя ввод аргументов для функции power(), и отобразите на экране результат ее работы.</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>Взяв в качестве основы функцию power() из первой задачи, работающую только со значением типа double, создайте перегруженные функции с этим же именем, принимающими в качестве аргумента значения типа char, int, long и float. Напишите программу, вызывающую функцию power() со всеми возможными типами аргументов.</p>
					</div>
				</section>

				<section class="task" id="task-3">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Задание 3</h2>
					</div>
					<div class="task__body">
						<p>Напишите функцию, которая при каждом вызове будет выводить на экран количество раз, которое она вызывалась ранее. Напишите программу, которая будет вызывать данную функцию не менее 10 раз. Попробуйте реализовать данную функцию двумя различными способами: с использованием глобальной переменной и статической локальной переменной для хранения числа вызовов функции.</p>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Сначала попробуйте написать программу самостоятельно. Ниже — полные решения с разбором и примерами вывода.</p>
						<?php include 'includes/solutions/lb5.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb4.php">
						<span>Предыдущая</span>
						Лабораторная работа 4
					</a>
					<a href="lb6.php">
						<span>Следующая</span>
						Лабораторная работа 6
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">power() и аргумент по умолчанию</a></li>
						<li><a href="#task-2">Перегрузка функций</a></li>
						<li><a href="#task-3">Счётчик вызовов</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					В перегрузке важны типы параметров. Функция <code>power(double, int)</code> не должна превращаться в копию всех остальных.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
