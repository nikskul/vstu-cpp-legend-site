<h3>Типовое решение: массив структур</h3>
<p>Ниже — пример программы, которая хранит книги в массиве структур, вводит данные с клавиатуры, выводит их и находит самую старую книгу. Такой каркас подходит для большинства заданий по теме <code>struct</code>.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;string&gt;
#include &lt;limits&gt;

using namespace std;

struct Book
{
    string title;
    string author;
    int year;
    float price;
};

int main()
{
    const int N = 3;
    Book books[N];

    for (int i = 0; i &lt; N; ++i)
    {
        cout &lt;&lt; "Книга " &lt;&lt; i + 1 &lt;&lt; endl;

        cout &lt;&lt; "Название: ";
        getline(cin, books[i].title);

        cout &lt;&lt; "Автор: ";
        getline(cin, books[i].author);

        cout &lt;&lt; "Год: ";
        cin &gt;&gt; books[i].year;

        cout &lt;&lt; "Цена: ";
        cin &gt;&gt; books[i].price;

        cin.ignore(numeric_limits&lt;streamsize&gt;::max(), '\n');
    }

    int oldest = 0;
    for (int i = 1; i &lt; N; ++i)
    {
        if (books[i].year &lt; books[oldest].year)
            oldest = i;
    }

    cout &lt;&lt; "\nСамая старая книга:\n";
    cout &lt;&lt; books[oldest].title &lt;&lt; ", "
         &lt;&lt; books[oldest].author &lt;&lt; ", "
         &lt;&lt; books[oldest].year &lt;&lt; ", "
         &lt;&lt; books[oldest].price &lt;&lt; " руб." &lt;&lt; endl;

    return 0;
}</code></pre>
</div>

<pre class="output">Книга 1
Название: Мастер и Маргарита
Автор: Булгаков
Год: 1967
Цена: 850
Книга 2
Название: Война и мир
Автор: Толстой
Год: 1869
Цена: 1200
Книга 3
Название: Преступление и наказание
Автор: Достоевский
Год: 1866
Цена: 700

Самая старая книга:
Преступление и наказание, Достоевский, 1866, 700 руб.</pre>

<p>Если в задании нужно хранить другой набор полей — замените поля структуры и запросы ввода. Главный принцип остаётся тем же: одна структура описывает один объект, массив хранит несколько объектов.</p>
