<?php include 'header.php' ?>
	<section class="page">
			<article>
				<h1>Установка Средств разработки.</h1>
				<p>Цель работы: Овладеть навыками установки инструментов для разработки приложений на языке программирования C++, знакомство со средой разработки Atom.</p>
				<h2>Установка MinGW</h2>
				<p>Чтобы установить MinGW, необходимо перейти на официальный сайт продукта, расположенный по адресу: <a href="http://www.mingw.org/">MinGW</a>. Затем во вкладке Download скачать необходимый пакет установки, актуальный на моё время пакет: mingw-get-setup.exe (Date: 2017-09-06, Size: 91.00 KB). После инсталляции пакета, в открывшемся окне менеджера установки необходимо выбрать следующие компоненты: mingw-developer-tool-kit, mingw32-base-bin, mingw32-gcc-g++-bin, msys-base-bin. Во вкладке «Installasion» выбрать «Apply Changes». После этого MinGW с компилятором g++ будут установлены. Далее необходимо добавить путь «C:\MinGW\bin» (Система – Дополнительные параметры системы – Переменные среды – Path – «Изменить»). Проверить правильность установки MinGW и его компонентов можно черед консоль Windows командой: g++ --version (рисунок 1).</p>
				<div class="image">
					<img src="img/1.png" alt="MinGW">
					<p>Рисунок 1 – Результат при корректной установке MinGW.</p>
				</div>
				<h2>Установка Atom</h2>
				<p>Чтобы установить Atom, необходимо перейти на официальный сайт продукта, расположенный по адресу <a href="https://atom.io/">Atom</a>. После загрузки установочного пакета и его инсталляции ПО уже готово для использования, но все же требует небольшой до настройки. Необходимо открыть вкладку «Install Package» и найти gcc-compiler. После установки, можно писать код программы. Создать новый файл можно сочетанием клавиш «Ctr+N». Нажатие клавиши «F5», запускает компилятор кода (рисунок 2).</p>
				<div class="image">
					<img src="img/2.png" alt="MinGW">
					<p>Рисунок 2 – Результат работы программы.</p>
				</div>
			</article>
			<div class="script">
				<div class="script-article"><span>C++</span></div>
				<pre><code data-language="c">
#include iostream
using namespace std;
int main()
{
  cout << "Hello World!" << endl;
  system("pause");
  return 0;
}
				</code></pre>
			</div>
	</section>
	<footer>

	</footer>
</body>
<script src="js/rainbow-custom.min.js"></script>
<script src="js/c.js"></script>
</html>
