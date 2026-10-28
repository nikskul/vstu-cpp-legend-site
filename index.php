<?php
$pageTitle = 'Главная';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<div class="home-hero">
			<div class="home-hero__content">
				<span class="eyebrow">курс «Объектно-ориентированное программирование»</span>
				<h1>Здесь вы найдёте всё, что вам не поможет.</h1>
				<p class="lead">Просто запомните, главная цель ООП — уничтожить вас морально.</p>
				<div class="home-hero__actions">
					<a class="btn btn--primary" href="lb1.php">К лабораторным</a>
					<a class="btn btn--ghost" href="kursach.php">Курсовой проект</a>
				</div>
			</div>

			<div class="home-hero__terminal" aria-label="Пример кода на C++">
				<div class="terminal__bar">
					<span class="terminal__dot"></span>
					<span class="terminal__dot"></span>
					<span class="terminal__dot"></span>
					<span class="terminal__name">hello.cpp</span>
				</div>
				<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int main()
{
    cout &lt;&lt; "Добро пожаловать в ад!\n";
    return 0;
}</code></pre>
			</div>
		</div>

		<section class="home-section">
			<div class="home-section__head">
				<h2>С чего начать</h2>
				<p>Три дороги в одном направлении — к сессии.</p>
			</div>
			<div class="home-grid">
				<article class="home-card">
					<span class="home-card__num">01 / практика</span>
					<h3>Лабораторные работы</h3>
					<p>Восемь работ: от установки MinGW до наследования. С заданиями, теорией и решениями под спойлером.</p>
					<a class="home-card__link" href="lb1.php">Открыть первую</a>
				</article>
				<article class="home-card">
					<span class="home-card__num">02 / теория</span>
					<h3>Классы и методы</h3>
					<p>Короткий разбор классов, спецификаторов доступа и методов — без академической тоски.</p>
					<a class="home-card__link" href="class.php">Читать разбор</a>
				</article>
				<article class="home-card">
					<span class="home-card__num">03 / сессия</span>
					<h3>Курсовой проект</h3>
					<p>Предметные области, план работы, требования к приложению и оформление по ГОСТ.</p>
					<a class="home-card__link" href="kursach.php">Смотреть задание</a>
				</article>
			</div>
		</section>

		<section class="home-section" id="labs">
			<div class="home-section__head">
				<h2>Лабораторные работы</h2>
				<p>Выбирайте ту, которую ещё не сдали.</p>
			</div>
			<div class="lab-grid">
				<a class="lab-tile" href="lb1.php">
					<span class="lab-tile__num">ЛР 01</span>
					<span class="lab-tile__title">Установка средств разработки</span>
				</a>
				<a class="lab-tile" href="lb2.php">
					<span class="lab-tile__num">ЛР 02</span>
					<span class="lab-tile__title">Линейные вычислительные процессы</span>
				</a>
				<a class="lab-tile" href="lb3.php">
					<span class="lab-tile__num">ЛР 03</span>
					<span class="lab-tile__title">Циклы и ветвления</span>
				</a>
				<a class="lab-tile" href="lb4.php">
					<span class="lab-tile__num">ЛР 04</span>
					<span class="lab-tile__title">Структуры</span>
				</a>
				<a class="lab-tile" href="lb5.php">
					<span class="lab-tile__num">ЛР 05</span>
					<span class="lab-tile__title">Функции C++</span>
				</a>
				<a class="lab-tile" href="lb6.php">
					<span class="lab-tile__num">ЛР 06</span>
					<span class="lab-tile__title">ООП в деле</span>
				</a>
				<a class="lab-tile" href="lb7.php">
					<span class="lab-tile__num">ЛР 07</span>
					<span class="lab-tile__title">Массивы и строки</span>
				</a>
				<a class="lab-tile" href="lb8.php">
					<span class="lab-tile__num">ЛР 08</span>
					<span class="lab-tile__title">Наследование</span>
				</a>
			</div>
		</section>

		<div class="sound-strip">
			<div>
				<span class="eyebrow">саундтрек</span>
				<h2>Halogen — U Got That</h2>
				<p>Видео играет фоном на всех страницах и не сбрасывается при переходах. Звук — только с вашего согласия.</p>
			</div>
			<div class="home-hero__actions">
				<button class="btn" type="button" data-player="open">Открыть плеер</button>
				<button class="btn btn--ghost" type="button" data-player="unmute">Включить звук</button>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
