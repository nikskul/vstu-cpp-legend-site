<h3>Задание 1. Сложный процент</h3>
<p>В отличие от простого процента, здесь прибыль каждого месяца прибавляется к сумме вклада. Формула: <code>S = P * (1 + r/12)^n</code>, где <code>P</code> — начальная сумма, <code>r</code> — годовая ставка, <code>n</code> — число месяцев.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;cmath&gt;
#include &lt;iomanip&gt;

using namespace std;

int main()
{
    double startSum, annualRate;
    int months;

    cout &lt;&lt; "Начальная сумма: ";
    cin &gt;&gt; startSum;

    cout &lt;&lt; "Годовая ставка, %: ";
    cin &gt;&gt; annualRate;

    cout &lt;&lt; "Срок, месяцев: ";
    cin &gt;&gt; months;

    double monthlyRate = annualRate / 100.0 / 12.0;
    double finalSum = startSum * pow(1.0 + monthlyRate, months);

    cout &lt;&lt; fixed &lt;&lt; setprecision(2);
    cout &lt;&lt; "Конечная сумма: " &lt;&lt; finalSum &lt;&lt; " руб." &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Начальная сумма: 100000
Годовая ставка, %: 6.6
Срок, месяцев: 12
Конечная сумма: 106800.75 руб.</pre>

<h3>Задание 2. Калькулятор на switch</h3>
<p>Оператор <code>switch</code> выбирает действие по символу операции. Деление на ноль обрабатывается отдельно.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int main()
{
    double a, b;
    char operation;

    cout &lt;&lt; "Введите выражение (например, 12.5 + 3): ";
    cin &gt;&gt; a &gt;&gt; operation &gt;&gt; b;

    switch (operation)
    {
    case '+':
        cout &lt;&lt; "Результат: " &lt;&lt; a + b &lt;&lt; endl;
        break;
    case '-':
        cout &lt;&lt; "Результат: " &lt;&lt; a - b &lt;&lt; endl;
        break;
    case '*':
        cout &lt;&lt; "Результат: " &lt;&lt; a * b &lt;&lt; endl;
        break;
    case '/':
        if (b == 0)
            cout &lt;&lt; "На ноль делить нельзя." &lt;&lt; endl;
        else
            cout &lt;&lt; "Результат: " &lt;&lt; a / b &lt;&lt; endl;
        break;
    default:
        cout &lt;&lt; "Неизвестная операция." &lt;&lt; endl;
    }

    return 0;
}</code></pre>
</div>

<pre class="output">Введите выражение (например, 12.5 + 3): 12.5 + 3
Результат: 15.5</pre>

<h3>Задание 3. Пирамида из X</h3>
<p>Внешний цикл идёт по строкам. Первый внутренний цикл печатает пробелы, второй — символы <code>X</code>.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int main()
{
    const int rows = 5;

    for (int i = 1; i &lt;= rows; ++i)
    {
        for (int j = 0; j &lt; rows - i; ++j)
            cout &lt;&lt; "  ";

        for (int j = 0; j &lt; 2 * i - 1; ++j)
            cout &lt;&lt; "X";

        cout &lt;&lt; endl;
    }

    return 0;
}</code></pre>
</div>

<pre class="output">        X
      XXX
    XXXXX
  XXXXXXX
XXXXXXXXX</pre>
