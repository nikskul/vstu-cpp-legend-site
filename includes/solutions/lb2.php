<h3>Задание 1. Число в обратном порядке</h3>
<p>Четырёхзначное число раскладывается на цифры через деление и остаток. Затем цифры выводятся в обратном порядке.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int main()
{
    int number;

    cout &lt;&lt; "Введите четырехзначное число: ";
    cin &gt;&gt; number;

    int d1 = number / 1000;
    int d2 = number / 100 % 10;
    int d3 = number / 10 % 10;
    int d4 = number % 10;

    cout &lt;&lt; "В обратном порядке: "
         &lt;&lt; d4 &lt;&lt; d3 &lt;&lt; d2 &lt;&lt; d1 &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Введите четырехзначное число: 7824
В обратном порядке: 4287</pre>

<h3>Задание 2. Депозит</h3>
<p>Ставка 6,6% годовых переводится в месячную: <code>6.6 / 100 / 12</code>. Прибыль за месяц считается от суммы депозита, прибыль за весь срок — как месячная прибыль, умноженная на количество месяцев.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;iomanip&gt;

using namespace std;

int main()
{
    double deposit;
    int months;

    const double annualRate = 6.6;
    const double monthlyRate = annualRate / 100.0 / 12.0;

    cout &lt;&lt; "Сумма депозита, руб.: ";
    cin &gt;&gt; deposit;

    cout &lt;&lt; "Количество месяцев: ";
    cin &gt;&gt; months;

    double monthlyProfit = deposit * monthlyRate;
    double totalProfit = monthlyProfit * months;
    double totalSum = deposit + totalProfit;

    cout &lt;&lt; fixed &lt;&lt; setprecision(2);
    cout &lt;&lt; "Прибыль в месяц: " &lt;&lt; monthlyProfit &lt;&lt; " руб." &lt;&lt; endl;
    cout &lt;&lt; "Прибыль за весь срок: " &lt;&lt; totalProfit &lt;&lt; " руб." &lt;&lt; endl;
    cout &lt;&lt; "Сумма к выплате: " &lt;&lt; totalSum &lt;&lt; " руб." &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Сумма депозита, руб.: 100000
Количество месяцев: 12
Прибыль в месяц: 550.00 руб.
Прибыль за весь срок: 6600.00 руб.
Сумма к выплате: 106600.00 руб.</pre>

<p>В этой работе используется простая ставка: прибыль каждого месяца считается от первоначальной суммы. Сложный процент — уже в лабораторной работе 3.</p>
