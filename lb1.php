<?php
$pageTitle = 'Лабораторная работа 1 — Установка средств разработки';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<a href="index.php#labs">Лабораторные</a>
			<span>/</span>
			<span>Работа 1</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">ЛР 01</span>
				<span class="lab-hero__topic">инструменты</span>
			</div>
			<h1>Установка Средств разработки.</h1>
			<p class="lab-hero__goal"><span>Цель работы:</span> Овладеть навыками установки инструментов для разработки приложений на языке программирования C++, знакомство со средой разработки Atom.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article">
				<section class="task" id="mingw">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Установка MinGW</h2>
					</div>
					<div class="task__body">
						<p>Чтобы установить MinGW, необходимо перейти на официальный сайт продукта, расположенный по адресу: <a href="http://www.mingw.org/" target="_blank" rel="noopener">MinGW</a>. Затем во вкладке Download скачать необходимый пакет установки, актуальный на моё время пакет: mingw-get-setup.exe (Date: 2017-09-06, Size: 91.00 KB). После инсталляции пакета, в открывшемся окне менеджера установки необходимо выбрать следующие компоненты: mingw-developer-tool-kit, mingw32-base-bin, mingw32-gcc-g++-bin, msys-base-bin. Во вкладке «Installasion» выбрать «Apply Changes». После этого MinGW с компилятором g++ будут установлены. Далее необходимо добавить путь «C:\MinGW\bin» (Система – Дополнительные параметры системы – Переменные среды – Path – «Изменить»). Проверить правильность установки MinGW и его компонентов можно черед консоль Windows командой: g++ --version (рисунок 1).</p>

						<figure class="figure">
							<img src="img/1.png" alt="Результат проверки версии g++ в консоли Windows">
							<figcaption>Рисунок 1 – Результат при корректной установке MinGW.</figcaption>
						</figure>
					</div>
				</section>

				<section class="task" id="atom">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Установка Atom</h2>
					</div>
					<div class="task__body">
						<p>Чтобы установить Atom, необходимо перейти на официальный сайт продукта, расположенный по адресу <a href="https://atom.io/" target="_blank" rel="noopener">Atom</a>. После загрузки установочного пакета и его инсталляции ПО уже готово для использования, но все же требует небольшой до настройки. Необходимо открыть вкладку «Install Package» и найти gcc-compiler. После установки, можно писать код программы. Создать новый файл можно сочетанием клавиш «Ctr+N». Нажатие клавиши «F5», запускает компилятор кода (рисунок 2).</p>

						<figure class="figure">
							<img src="img/2.png" alt="Результат работы программы в Atom">
							<figcaption>Рисунок 2 – Результат работы программы.</figcaption>
						</figure>
					</div>
				</section>

				<section class="task" id="hello">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Первая программа</h2>
					</div>
					<div class="task__body">
						<p>После установки MinGW и Atom можно проверить сборку первой программы.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;cstdlib&gt;
using namespace std;
int main()
{
  cout &lt;&lt; "Hello World!" &lt;&lt; endl;
  system("pause");
  return 0;
}</code></pre>
						</div>
					</div>
				</section>

				<details class="solution">
					<summary>
						<span class="solution__summary-main">Показать решение</span>
						<span class="solution__summary-note">только если совсем не хочется ставить всё самому</span>
					</summary>
					<div class="solution__body">
						<p class="solution__warning">Решение — это чек-лист и готовая первая программа. Установку MinGW и Atom всё равно придётся выполнить на своём компьютере: без компилятора код не запустится.</p>
						<?php include 'includes/solutions/lb1.php'; ?>
					</div>
				</details>

				<nav class="lab-pager" aria-label="Навигация по лабораторным">
					<a href="index.php">
						<span>Назад</span>
						Главная
					</a>
					<a href="lb2.php">
						<span>Следующая</span>
						Лабораторная работа 2
					</a>
				</nav>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#mingw">Установка MinGW</a></li>
						<li><a href="#atom">Установка Atom</a></li>
						<li><a href="#hello">Первая программа</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Совет</strong>
					Если <code>g++ --version</code> не находится, проверьте, что путь <code>C:\MinGW\bin</code> добавлен в <code>Path</code>, и перезапустите консоль.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
