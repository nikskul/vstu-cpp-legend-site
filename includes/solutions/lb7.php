<h3>Задание 1. reversit()</h3>
<p>Функция принимает строку как массив <code>char</code> и меняет символы местами с начала и с конца. <code>cin.getline()</code> позволяет вводить строку с пробелами.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;cstring&gt;

using namespace std;

void reversit(char str[])
{
    int length = strlen(str);

    for (int i = 0; i &lt; length / 2; ++i)
    {
        char temp = str[i];
        str[i] = str[length - 1 - i];
        str[length - 1 - i] = temp;
    }
}

int main()
{
    char text[256];

    cout &lt;&lt; "Введите строку: ";
    cin.getline(text, 256);

    reversit(text);
    cout &lt;&lt; "Результат: " &lt;&lt; text &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Введите строку: А роза упала на лапу Азора
Результат: арозА упал ан алапу азор А</pre>

<p>Для палиндрома результат должен читаться так же, как исходная строка, если не учитывать регистр и пробелы.</p>

<h3>Задание 2. maxint()</h3>
<p>Функция получает адрес массива и количество элементов, проходит по массиву и возвращает индекс максимального элемента.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

int maxint(const int arr[], int count)
{
    int index = 0;

    for (int i = 1; i &lt; count; ++i)
    {
        if (arr[i] &gt; arr[index])
            index = i;
    }

    return index;
}

int main()
{
    const int MAX_SIZE = 100;
    int numbers[MAX_SIZE];
    int count;

    cout &lt;&lt; "Количество чисел: ";
    cin &gt;&gt; count;

    if (count &lt; 1 || count &gt; MAX_SIZE)
    {
        cout &lt;&lt; "Некорректное количество." &lt;&lt; endl;
        return 1;
    }

    cout &lt;&lt; "Введите числа: ";
    for (int i = 0; i &lt; count; ++i)
        cin &gt;&gt; numbers[i];

    int index = maxint(numbers, count);

    cout &lt;&lt; "Максимум: " &lt;&lt; numbers[index]
         &lt;&lt; ", индекс: " &lt;&lt; index &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Количество чисел: 5
Введите числа: 4 17 2 9 17
Максимум: 17, индекс: 1</pre>

<h3>Задание 3. Безопасный массив</h3>
<p>Класс хранит массив фиксированного размера. Оба метода проверяют индекс и не дают выйти за границы. В примере из задания опечатка <code>safearay</code>; в решении используется корректное имя <code>safearray</code>.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;

using namespace std;

class safearray
{
private:
    static const int SIZE = 10;
    int data[SIZE];

public:
    safearray()
    {
        for (int i = 0; i &lt; SIZE; ++i)
            data[i] = 0;
    }

    bool putel(int index, int value)
    {
        if (index &lt; 0 || index &gt;= SIZE)
        {
            cerr &lt;&lt; "Ошибка: индекс " &lt;&lt; index
                 &lt;&lt; " вне диапазона." &lt;&lt; endl;
            return false;
        }

        data[index] = value;
        return true;
    }

    int getel(int index) const
    {
        if (index &lt; 0 || index &gt;= SIZE)
        {
            cerr &lt;&lt; "Ошибка: индекс " &lt;&lt; index
                 &lt;&lt; " вне диапазона." &lt;&lt; endl;
            return 0;
        }

        return data[index];
    }
};

int main()
{
    safearray sa1;
    int temp = 12345;

    sa1.putel(7, temp);
    temp = sa1.getel(7);

    cout &lt;&lt; "temp = " &lt;&lt; temp &lt;&lt; endl;

    sa1.putel(10, 1); // ошибка: индекс 10 вне диапазона

    return 0;
}</code></pre>
</div>

<pre class="output">temp = 12345
Ошибка: индекс 10 вне диапазона.</pre>

<p>Вернуть признак ошибки можно и через <code>bool</code>, но в примере задания <code>getel()</code> возвращает <code>int</code>, поэтому при ошибке возвращается 0 и выводится сообщение в <code>cerr</code>.</p>
