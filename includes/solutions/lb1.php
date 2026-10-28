<h3>Чек-лист установки</h3>
<ol>
	<li>Скачать и установить MinGW с официального сайта.</li>
	<li>В MinGW Installation Manager выбрать компоненты <code>mingw-developer-tool-kit</code>, <code>mingw32-base-bin</code>, <code>mingw32-gcc-g++-bin</code>, <code>msys-base-bin</code> и применить изменения.</li>
	<li>Добавить <code>C:\MinGW\bin</code> в переменную среды <code>Path</code>.</li>
	<li>Открыть новую консоль и проверить команду <code>g++ --version</code>.</li>
	<li>Установить Atom и пакет <code>gcc-compiler</code>.</li>
	<li>Создать файл <code>hello.cpp</code>, вставить код ниже и нажать <code>F5</code>.</li>
</ol>

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

<h3>Что должно вывестись</h3>
<pre class="output">Hello World!
Для продолжения нажмите любую клавишу . . .</pre>

<p>Если компилятор не найден, проверьте <code>Path</code> и перезапустите консоль или Atom. Настройка среды — единственная часть этой работы, которую нельзя пропустить.</p>
