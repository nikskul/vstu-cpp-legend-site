<?php
$pageTitle = 'Лабораторная работа 3 — Циклы и ветвления';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 3</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 03</span>
				<span class="lab-hero__topic">циклы и switch</span>
			</div>
			<h1>Циклы ваше все. While (live = true) {you.prepareToDie}</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Освоить работу с операторами циклов и ветвлений на языке программирования C++. Написать программы с использованием операторов for и switch.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>Найти конечное значение суммы, положенной на депозит под сложный процент (хз, как ещё сформулировать).</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>Создать калькулятор, выполняющий с двумя числами простые арифметические операции: сумма, разность, умножение, деление. Для создания меню использовать оператор switch().</p>
					</div>
				</section>

				<section class="task" id="task-3">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Задание 3</h2>
					</div>
					<div class="task__body">
						<p>Реализовать программу выводящую на экран пирамиду их символов x, по типу:</p>
						<pre class="ascii">        X
      XXX
    XXXXX
  XXXXXXX
XXXXXXXXX</pre>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Сначала попробуйте написать программу самостоятельно. Ниже — полные решения с разбором и примерами вывода.</p>
						<?php include 'includes/solutions/lb3.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb2.php">
						<span>Предыдущая</span>
						Лабораторная работа 2
					</a>
					<a href="lb4.php">
						<span>Следующая</span>
						Лабораторная работа 4
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">Сложный процент</a></li>
						<li><a href="#task-2">Калькулятор</a></li>
						<li><a href="#task-3">Пирамида</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					Для пирамиды внешний цикл отвечает за строки, два внутренних — за пробелы и символы X.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
