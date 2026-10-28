<?php
$pageTitle = 'Лабораторная работа 6 — ООП в деле';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 6</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 06</span>
				<span class="lab-hero__topic">классы</span>
			</div>
			<h1>ООП в деле</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Научиться создавать классы.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>Создайте класс​ Int, имитирующий стандартный тип​ int. Единственное​ поле этого класса должно иметь тип​ int. Создайте методы, которые будут​ устанавливать значение поля,​ равным нулю, инициализировать его целым​ значением, выводить значение поля на экран и складывать два значения типа​ Int.</p>
						<p>Напишите программу, в которой будут созданы три объекта класса​ Int,​ два из которых будут инициализированы. Сложите два инициализированных объекта, присвойте​ результат третьему, а затем отобразите результат​ на экране.</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>Создайте класс с именем​ time, содержащий три поля типа​ int, предназначенные для хранения часов, минут и секунд. Один из конструкторов класса должен​ инициализировать поля нулевыми значениями, а другой конструктор -​ заданным набором значений. Создайте метод класса, который​ будет выводить значения полей на​ экран в формате чч:мм:сс, и метод,​ складывающий значения двух объектов типа​ time, передаваемых в качестве аргументов.</p>
						<p>В функции​ main()​ следует создать два инициализированных объекта​ и один неинициализированный объект. Затем​ сложите два инициализированных значения, а результат присвойте третьему объекту и выведите его значение на экран.</p>
					</div>
				</section>

				<section class="task" id="task-3">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Задание 3</h2>
					</div>
					<div class="task__body">
						<p>Создайте класс​ employee. Класс должен​ включать поле типа​ int​ для хранения номера сотрудника и поле типа​ float​ для хранения​ величины его оклада. Методы класса должны позволять​ пользователю вводить и отображать данные класса. Напишите функцию​ main(), которая запросит​ пользователя ввести данные для трех сотрудников и выведет полученную информацию на экран.</p>
					</div>
				</section>

				<section class="task" id="theory">
					<div class="task__head">
						<span class="task__num">04</span>
						<h2>Теория на YouTube ;)</h2>
					</div>
					<div class="task__body">
						<div class="callout callout--link">
							<p>Если хочется сначала посмотреть объяснение, а потом страдать — вот ссылка.</p>
							<a class="btn btn--small" href="https://vk.com/doc268909357_548774817?hash=9128737e8de9635417&dl=020eec2435ac3a0e77" target="_blank" rel="noopener">Ну или тут</a>
						</div>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется решать самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Сначала попробуйте написать классы самостоятельно. Ниже — полные решения с разбором и примерами вывода.</p>
						<?php include 'includes/solutions/lb6.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb5.php">
						<span>Предыдущая</span>
						Лабораторная работа 5
					</a>
					<a href="lb7.php">
						<span>Следующая</span>
						Лабораторная работа 7
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">Класс Int</a></li>
						<li><a href="#task-2">Класс time</a></li>
						<li><a href="#task-3">Класс employee</a></li>
						<li><a href="#theory">Теория</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					Начните с полей и конструкторов, а методы добавляйте по одному. Так проще ловить ошибки.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
