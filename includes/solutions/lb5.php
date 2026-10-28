<h3>Задание 1. Функция power()</h3>
<p>Значение по умолчанию <code>p = 2</code> позволяет вызывать <code>power(n)</code> и получать квадрат числа. Степень считается циклом, без <code>pow()</code>.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

double power(double n, int p = 2)
{
    double result = 1.0;

    for (int i = 0; i &lt; p; ++i)
        result *= n;

    return result;
}

int main()
{
    double n;
    int p;

    cout &lt;&lt; "Введите n: ";
    cin &gt;&gt; n;

    cout &lt;&lt; "Введите p (отрицательное число — возвести в квадрат): ";
    cin &gt;&gt; p;

    if (p &lt; 0)
        cout &lt;&lt; "Результат: " &lt;&lt; power(n) &lt;&lt; endl;
    else
        cout &lt;&lt; "Результат: " &lt;&lt; power(n, p) &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Введите n: 3
Введите p (отрицательное число — возвести в квадрат): -1
Результат: 9</pre>

<h3>Задание 2. Перегрузка power()</h3>
<p>Перегруженные версии принимают разные типы аргументов и внутри приводят их к <code>double</code>. Компилятор выбирает подходящую функцию по типу аргумента.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

double power(double n, int p = 2)
{
    double result = 1.0;
    for (int i = 0; i &lt; p; ++i)
        result *= n;
    return result;
}

double power(char n, int p = 2)
{
    return power(static_cast&lt;double&gt;(n), p);
}

double power(int n, int p = 2)
{
    return power(static_cast&lt;double&gt;(n), p);
}

double power(long n, int p = 2)
{
    return power(static_cast&lt;double&gt;(n), p);
}

double power(float n, int p = 2)
{
    return power(static_cast&lt;double&gt;(n), p);
}

int main()
{
    cout &lt;&lt; "char:  " &lt;&lt; power('A', 2) &lt;&lt; endl;
    cout &lt;&lt; "int:   " &lt;&lt; power(5, 3) &lt;&lt; endl;
    cout &lt;&lt; "long:  " &lt;&lt; power(4L, 2) &lt;&lt; endl;
    cout &lt;&lt; "float: " &lt;&lt; power(2.5f, 2) &lt;&lt; endl;
    cout &lt;&lt; "double:" &lt;&lt; power(2.5, 3) &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">char:  4225
int:   125
long:  16
float: 6.25
double:15.625</pre>

<h3>Задание 3. Счётчик вызовов</h3>
<p>Глобальная переменная живёт всё время работы программы. Статическая локальная переменная тоже сохраняет значение между вызовами, но не видна снаружи функции.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int globalCalls = 0;

void countWithGlobal()
{
    cout &lt;&lt; "Глобальная: " &lt;&lt; globalCalls++ &lt;&lt; endl;
}

void countWithStatic()
{
    static int calls = 0;
    cout &lt;&lt; "Статическая: " &lt;&lt; calls++ &lt;&lt; endl;
}

int main()
{
    for (int i = 0; i &lt; 10; ++i)
    {
        countWithGlobal();
        countWithStatic();
    }

    return 0;
}</code></pre>
</div>

<pre class="output">Глобальная: 0
Статическая: 0
Глобальная: 1
Статическая: 1
...
Глобальная: 9
Статическая: 9</pre>

<p>Обе функции выводят количество <em>предыдущих</em> вызовов: первый вызов печатает 0. Если нужно печатать номер вызова, замените <code>calls++</code> на <code>++calls</code>.</p>
