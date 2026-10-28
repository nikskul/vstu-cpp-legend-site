<?php
$pageTitle = 'Лабораторная работа 7 — Массивы и строки';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 7</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 07</span>
				<span class="lab-hero__topic">массивы и строки</span>
			</div>
			<h1>Массивы и строки</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Создать массивный .</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="task-1">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Задание 1</h2>
					</div>
					<div class="task__body">
						<p>Напишите функцию reversit(), которая переворачивает строку (массив типа char). Используйте цикл for, который меняет местами первый и последний символы, затем следующие и т. д. до предпоследнего. Строка должна передаваться в функцию reversit() как аргумент. Напишите программу для выполнения функции reversit(). Программа должна принимать строку от пользователя, вызывать функцию reversit(), а затем выводить полученный результат. Используйте метод ввода, который позволяет использовать внутренние пробелы. Протестируйте программу на примере любой фразы-палиндрома.</p>
					</div>
				</section>

				<section class="task" id="task-2">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Задание 2</h2>
					</div>
					<div class="task__body">
						<p>Начните с программы, которая позволяет пользователю вводить целые числа, а затем сохранять их в массиве типа int. Напишите функцию maxint(), которая, обрабатывая элементы массива один за другим, находит наибольший. Функция должна принимать в качестве аргумента адрес массива и количество элементов в нем, а возвращать индекс наибольшего элемента. Программа должна вызвать эту функцию, а затем вывести наибольший элемент и его индекс.</p>
					</div>
				</section>

				<section class="task" id="task-3">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Задание 3</h2>
					</div>
					<div class="task__body">
						<p>Недостатком C++ является отсутствие автоматической проверки индексов массива на соответствие их границам массива (это делает действия с массивами быстрыми, но менее надежными). Мы можем использовать класс для создания надежного массива, который проверяет индексы при любой попытке доступа к массиву.</p>
						<p>Напишите класс, который использует массив типа int фиксированного размера в качестве своей единственной переменной. В классе будет два метода. Первый - принимает индекс и значение типа int как аргументы и вставляет это значение в массив по заданному индексу. Второй - принимает индекс как аргумент и возвращает значение типа int, содержащееся в элементе с этим индексом.</p>
						<p>Оба метода должны проверять индекс аргумента, чтобы быть уверенными, что он не меньше 0 и не больше, чем заданный размер массива.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">safearay sa1; // описываем массив
int temp = 12345; // описываем размер
sa1.putel(7, temp); // помещаем значение temp в массив
temp = sa1.getel(7); // получаем значение из массива</code></pre>
						</div>
					</div>
				</section>

				<section class="task" id="theory">
					<div class="task__head">
						<span class="task__num">04</span>
						<h2>Теория</h2>
					</div>
					<div class="task__body">
						<div class="callout callout--link">
							<p>PDF с теорией по массивам и строкам.</p>
							<a class="btn btn--small" href="includes/theory.pdf" target="_blank" rel="noopener">Теория</a>
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
						<?php include 'includes/solutions/lb7.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="lb6.php">
						<span>Предыдущая</span>
						Лабораторная работа 6
					</a>
					<a href="lb8.php">
						<span>Следующая</span>
						Лабораторная работа 8
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#task-1">reversit()</a></li>
						<li><a href="#task-2">maxint()</a></li>
						<li><a href="#task-3">Безопасный массив</a></li>
						<li><a href="#theory">Теория</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Подсказка</strong>
					В третьем задании имя класса в примере — <code>safearay</code>, но в решении используется корректное <code>safearray</code>.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
