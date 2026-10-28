<?php
$pageTitle = 'Лабораторная работа 8 — Наследование';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 8</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 08</span>
				<span class="lab-hero__topic">наследование</span>
			</div>
			<h1>Наследование</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Изучить наследование.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>Создадим прототип системы учета книг и их аудио-версий. Создайте класс publication, в котором хранятся название (строка) и цена (типа float) книги. От этого класса наследуются еще два класса: book, который содержит информацию о количестве страниц в книге (типа int), и type, который содержит время записи книги в минутах (тип float). В каждом из этих трех классов должен быть метод getdata(), через который можно получать данные от пользователя с клавиатуры, и putdata(), предназначенный для вывода этих данных. Напишите функцию main() программы для проверки классов book и type. Создайте их объекты в программе и запросите пользователя ввести и вывести данные с использованием методов getdata() и putdata().</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>Начните с классов book, type и publication из упражнения 1. Добавьте базовый класс sales, в котором содержится массив, состоящий из трех значений типа float, куда можно записать общую стоимость проданных книг за последние три месяца. Включите в класс методы getdata() для получения значений стоимости от пользователя и putdata() для вывода этих цифр. Измените классы book и type так, чтобы они стали производными обоих классов: publications и sales. Объекты классов book и type должны вводить и выводить данные о продажах вместе с другими своими данными. Напишите функцию main() для создания объектов классов book и type, чтобы протестировать возможности ввода/вывода данных.</p>
					</div>
				</section>

				<section class="task" id="theory">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Теория</h2>
					</div>
					<div class="task__body">
						<div class="callout callout--link">
							<p>Можно здесь почитать, что как.</p>
							<a class="btn btn--small" href="https://ravesli.com/urok-153-nasledovanie-vvedenie/" target="_blank" rel="noopener">Можно здесь почитать, что как</a>
						</div>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Сначала попробуйте написать программу самостоятельно. Ниже — полные решения с разбором и примерами вывода.</p>
						<?php include 'includes/solutions/lb8.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb7.php">
						<span>Предыдущая</span>
						Лабораторная работа 7
					</a>
					<a href="index.php">
						<span>На главную</span>
						К списку работ
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">publication, book, type</a></li>
						<li><a href="#task-2">Множественное наследование</a></li>
						<li><a href="#theory">Теория</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					Во втором задании вызывайте методы базовых классов явно: <code>publication::getdata()</code> и <code>sales::getdata()</code>.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
