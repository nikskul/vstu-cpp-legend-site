<h3>Задание 1. Класс Int</h3>
<p>Класс хранит одно поле <code>int</code>. Конструктор инициализирует его, методы меняют значение, выводят его и складывают два объекта.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

class Int
{
private:
    int value;

public:
    Int(int v = 0) : value(v) {}

    void setZero()
    {
        value = 0;
    }

    void setValue(int v)
    {
        value = v;
    }

    void print() const
    {
        cout &lt;&lt; value &lt;&lt; endl;
    }

    Int add(const Int&amp; other) const
    {
        return Int(value + other.value);
    }
};

int main()
{
    Int a(10);
    Int b(32);
    Int c;

    c = a.add(b);
    c.print();

    return 0;
}</code></pre>
</div>

<pre class="output">42</pre>

<h3>Задание 2. Класс time</h3>
<p>Конструктор без параметров обнуляет время, второй конструктор принимает часы, минуты и секунды. Метод <code>add()</code> переводит оба времени в секунды, складывает и нормализует результат.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;cstdio&gt;

using namespace std;

class Time
{
private:
    int hours;
    int minutes;
    int seconds;

public:
    Time() : hours(0), minutes(0), seconds(0) {}

    Time(int h, int m, int s) : hours(h), minutes(m), seconds(s) {}

    void print() const
    {
        printf("%02d:%02d:%02d\n", hours, minutes, seconds);
    }

    Time add(const Time&amp; a, const Time&amp; b) const
    {
        int total = a.hours * 3600 + a.minutes * 60 + a.seconds
                  + b.hours * 3600 + b.minutes * 60 + b.seconds;

        return Time((total / 3600) % 24,
                    (total / 60) % 60,
                    total % 60);
    }
};

int main()
{
    Time t1(2, 45, 30);
    Time t2(1, 20, 45);
    Time t3;

    t3 = t1.add(t1, t2);
    t3.print();

    return 0;
}</code></pre>
</div>

<pre class="output">04:06:15</pre>

<h3>Задание 3. Класс employee</h3>
<p>Методы <code>getdata()</code> и <code>putdata()</code> инкапсулируют ввод и вывод. Массив из трёх объектов хранит данные сотрудников.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

class employee
{
private:
    int number;
    float salary;

public:
    void getdata()
    {
        cout &lt;&lt; "Номер сотрудника: ";
        cin &gt;&gt; number;

        cout &lt;&lt; "Оклад: ";
        cin &gt;&gt; salary;
    }

    void putdata() const
    {
        cout &lt;&lt; "Сотрудник " &lt;&lt; number
             &lt;&lt; ", оклад: " &lt;&lt; salary &lt;&lt; " руб." &lt;&lt; endl;
    }
};

int main()
{
    employee staff[3];

    for (int i = 0; i &lt; 3; ++i)
    {
        cout &lt;&lt; "Сотрудник " &lt;&lt; i + 1 &lt;&lt; endl;
        staff[i].getdata();
    }

    cout &lt;&lt; "\nСписок сотрудников:\n";
    for (int i = 0; i &lt; 3; ++i)
        staff[i].putdata();

    return 0;
}</code></pre>
</div>

<pre class="output">Сотрудник 1
Номер сотрудника: 101
Оклад: 45000
Сотрудник 2
Номер сотрудника: 102
Оклад: 52000
Сотрудник 3
Номер сотрудника: 103
Оклад: 61000

Список сотрудников:
Сотрудник 101, оклад: 45000 руб.
Сотрудник 102, оклад: 52000 руб.
Сотрудник 103, оклад: 61000 руб.</pre>

<p>В задании 2 класс называется <code>time</code>, но в решении он назван <code>Time</code>: имя <code>time</code> конфликтует с функцией <code>time()</code> из стандартной библиотеки C. Если преподаватель требует именно <code>time</code>, поместите класс в отдельное пространство имён или используйте <code>Time</code> — логика от этого не меняется.</p>
