<h3>Задание 1. publication, book и type</h3>
<p>Базовый класс <code>publication</code> хранит название и цену. Классы <code>book</code> и <code>type</code> наследуют его и добавляют свои поля. Методы <code>getdata()</code> и <code>putdata()</code> объявлены виртуальными, чтобы производные классы могли их дополнить.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;string&gt;

using namespace std;

class publication
{
protected:
    string title;
    float price;

public:
    virtual void getdata()
    {
        cout &lt;&lt; "Название: ";
        cin &gt;&gt; ws;
        getline(cin, title);

        cout &lt;&lt; "Цена: ";
        cin &gt;&gt; price;
    }

    virtual void putdata() const
    {
        cout &lt;&lt; "Название: " &lt;&lt; title
             &lt;&lt; ", цена: " &lt;&lt; price &lt;&lt; " руб." &lt;&lt; endl;
    }

    virtual ~publication() {}
};

class book : public publication
{
private:
    int pages;

public:
    void getdata() override
    {
        publication::getdata();

        cout &lt;&lt; "Количество страниц: ";
        cin &gt;&gt; pages;
    }

    void putdata() const override
    {
        publication::putdata();
        cout &lt;&lt; "Страниц: " &lt;&lt; pages &lt;&lt; endl;
    }
};

class type : public publication
{
private:
    float minutes;

public:
    void getdata() override
    {
        publication::getdata();

        cout &lt;&lt; "Время записи, минут: ";
        cin &gt;&gt; minutes;
    }

    void putdata() const override
    {
        publication::putdata();
        cout &lt;&lt; "Время записи: " &lt;&lt; minutes &lt;&lt; " мин." &lt;&lt; endl;
    }
};

int main()
{
    book paperBook;
    type audioBook;

    cout &lt;&lt; "--- Книга ---" &lt;&lt; endl;
    paperBook.getdata();

    cout &lt;&lt; "--- Аудиокнига ---" &lt;&lt; endl;
    audioBook.getdata();

    cout &lt;&lt; "\n--- Результат ---" &lt;&lt; endl;
    paperBook.putdata();
    audioBook.putdata();

    return 0;
}</code></pre>
</div>

<pre class="output">--- Книга ---
Название: Мастер и Маргарита
Цена: 850
Количество страниц: 480
--- Аудиокнига ---
Название: Мастер и Маргарита
Цена: 399
Время записи, минут: 720

--- Результат ---
Название: Мастер и Маргарита, цена: 850 руб.
Страниц: 480
Название: Мастер и Маргарита, цена: 399 руб.
Время записи: 720 мин.</pre>

<h3>Задание 2. Множественное наследование с sales</h3>
<p>Класс <code>sales</code> хранит продажи за три месяца. Классы <code>book</code> и <code>type</code> наследуют и <code>publication</code>, и <code>sales</code>. В переопределённых методах явно вызываются методы обоих базовых классов.</p>

<div class="script">
	<div class="script-article"><span>C++</span></div>
	<pre><code data-language="c">#include &lt;iostream&gt;
#include &lt;string&gt;

using namespace std;

class publication
{
protected:
    string title;
    float price;

public:
    virtual void getdata()
    {
        cout &lt;&lt; "Название: ";
        cin &gt;&gt; ws;
        getline(cin, title);

        cout &lt;&lt; "Цена: ";
        cin &gt;&gt; price;
    }

    virtual void putdata() const
    {
        cout &lt;&lt; "Название: " &lt;&lt; title
             &lt;&lt; ", цена: " &lt;&lt; price &lt;&lt; " руб." &lt;&lt; endl;
    }

    virtual ~publication() {}
};

class sales
{
protected:
    float sold[3];

public:
    virtual void getdata()
    {
        for (int i = 0; i &lt; 3; ++i)
        {
            cout &lt;&lt; "Продажи за месяц " &lt;&lt; i + 1 &lt;&lt; ": ";
            cin &gt;&gt; sold[i];
        }
    }

    virtual void putdata() const
    {
        cout &lt;&lt; "Продажи за 3 месяца: ";
        for (int i = 0; i &lt; 3; ++i)
            cout &lt;&lt; sold[i] &lt;&lt; (i &lt; 2 ? " / " : "");
        cout &lt;&lt; endl;
    }

    virtual ~sales() {}
};

class book : public publication, public sales
{
private:
    int pages;

public:
    void getdata() override
    {
        publication::getdata();
        sales::getdata();

        cout &lt;&lt; "Количество страниц: ";
        cin &gt;&gt; pages;
    }

    void putdata() const override
    {
        publication::putdata();
        sales::putdata();
        cout &lt;&lt; "Страниц: " &lt;&lt; pages &lt;&lt; endl;
    }
};

class type : public publication, public sales
{
private:
    float minutes;

public:
    void getdata() override
    {
        publication::getdata();
        sales::getdata();

        cout &lt;&lt; "Время записи, минут: ";
        cin &gt;&gt; minutes;
    }

    void putdata() const override
    {
        publication::putdata();
        sales::putdata();
        cout &lt;&lt; "Время записи: " &lt;&lt; minutes &lt;&lt; " мин." &lt;&lt; endl;
    }
};

int main()
{
    book paperBook;
    type audioBook;

    cout &lt;&lt; "--- Книга ---" &lt;&lt; endl;
    paperBook.getdata();

    cout &lt;&lt; "--- Аудиокнига ---" &lt;&lt; endl;
    audioBook.getdata();

    cout &lt;&lt; "\n--- Результат ---" &lt;&lt; endl;
    paperBook.putdata();
    audioBook.putdata();

    return 0;
}</code></pre>
</div>

<pre class="output">--- Книга ---
Название: Мастер и Маргарита
Цена: 850
Продажи за месяц 1: 120
Продажи за месяц 2: 95
Продажи за месяц 3: 140
Количество страниц: 480
--- Аудиокнига ---
Название: Мастер и Маргарита
Цена: 399
Продажи за месяц 1: 80
Продажи за месяц 2: 110
Продажи за месяц 3: 90
Время записи, минут: 720

--- Результат ---
Название: Мастер и Маргарита, цена: 850 руб.
Продажи за 3 месяца: 120 / 95 / 140
Страниц: 480
Название: Мастер и Маргарита, цена: 399 руб.
Продажи за 3 месяца: 80 / 110 / 90
Время записи: 720 мин.</pre>

<p>В задании базовый класс назван <code>publications</code>, но в коде используется <code>publication</code> — так же, как в первом задании. Если преподаватель требует точное имя, переименуйте класс и все обращения к нему.</p>
