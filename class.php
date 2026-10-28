<?php
$pageTitle = 'Классы и методы';
include 'header.php';
?>
<section class="page">
	<div class="shell">
		<nav class="breadcrumbs" aria-label="Хлебные крошки">
			<a href="index.php">Главная</a>
			<span>/</span>
			<span>Классы и методы</span>
		</nav>

		<header class="lab-hero">
			<div class="lab-hero__meta">
				<span class="lab-hero__num">Теория</span>
				<span class="lab-hero__topic">ООП</span>
			</div>
			<h1>Как разобраться с классами и методами. ООП</h1>
			<p class="lab-hero__goal">До этого момента все мы привыкли писать программы при помощи функций. Стандартный процедурный метод написания программ. Но в ООП вместо функций используют методы, являющиеся частью класса.</p>
		</header>

		<div class="lab-layout">
			<article class="lab-article prose">
				<section class="task" id="class">
					<div class="task__head">
						<span class="task__num">01</span>
						<h2>Класс</h2>
					</div>
					<div class="task__body">
						<p>Класс можно рассматривать как некий паттерн(шаблон), на оснве которого создаются объекты. Любой класс состоит из набора полей различных типов данных, и функций, которые в ООП называют метод класса. По сути класс это ваш собственный тип данных с функциями внутри.</p>
						<p>Для задания класса используется ключевое слово class.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">class Tree {
  // поля и методы класса
};</code></pre>
						</div>
					</div>
				</section>

				<section class="task" id="structure">
					<div class="task__head">
						<span class="task__num">02</span>
						<h2>Структура класса</h2>
					</div>
					<div class="task__body">
						<p>Классы имеют особенность - спецификаторы доступа: public, private, protected.</p>
						<ul class="spec-list">
							<li><strong>public:</strong> делает члены открытыми;</li>
							<li><strong>private:</strong> делает члены закрытыми;</li>
							<li><strong>protected:</strong> открывает доступ к членам только для дружественных и дочерних классов.</li>
						</ul>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">class Tree {
  int m_treeAge; // По умолчанию члены класса закрыты
private: // Ко всему, что написано ниже имеет доступ только другие члены этого класса
  int m_numOfLeafs; // Поле класса
public: // Ко всему, что написано ниже можно получить доступ из любой точки программы
  // Здесь обычно пишут методы
protected: // Ко всему, что написано имеют доступ только дружественные и дочерние классы
};</code></pre>
						</div>
					</div>
				</section>

				<section class="task" id="methods">
					<div class="task__head">
						<span class="task__num">03</span>
						<h2>Методы</h2>
					</div>
					<div class="task__body">
						<p>Методы работают и определяются как обычные функции, при помощи них осуществляют взаимодействие с членами класса.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">class Tree {
private:
  int m_numOfLeafs = 100;
public:
  void getNumOfLeafs() // Метод, который выводит на экран значение поля m_numOfLeafs
  {
    cout &lt;&lt; "Количество листьев: " &lt;&lt; m_numOfLeafs;
  };
};

int main()
{
  Tree tree1; // Создаем объект tree1
  tree1.getNumOfLeafs(); // Вызываем метод getNumOfLeafs()
  return 0;
};</code></pre>
						</div>
						<p>В результате в консоль выведется 100. Если попробовать вывести значениене не через метод, a как с обычной структурой то получим ошибку, т.к. поле записано в спецификатор private</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">int main()
{
  Tree tree1; // Создаем объект tree1
  cout &lt;&lt; tree1.m_numOfLeafs; // Ошибка нет доступа к полю
  return 0;
};</code></pre>
						</div>
						<p>Но если переместить поле в public, то все работает без проблем. Пробемы начнутся потом, если вы будете так делать. Это как глобальные переменные, оно того не стоит.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">class Tree {
public:
  int m_numOfLeafs = 100; // Теперь это поле доступно во всей пограмме
};

int main()
{
  Tree tree1; // Создаем объект tree1
  cout &lt;&lt; tree1.m_numOfLeafs; // Выводит 100
  return 0;
};</code></pre>
						</div>
					</div>
				</section>

				<section class="task" id="parameters">
					<div class="task__head">
						<span class="task__num">04</span>
						<h2>Методы и параметры</h2>
					</div>
					<div class="task__body">
						<p>В методы как и в функции можно передавать параметры. Такими параметрами могут выступать и объекты классов.</p>
						<div class="script">
							<div class="script-article"><span>C++</span></div>
							<pre><code data-language="c">class Tree {
private:
  int m_numOfLeafs = 100;
public:
  void addLeafs(Tree obj1, Tree obj2) // Метод складывающий поля объектов
  {
    m_numOfLeafs = obj1.m_numOfLeafs + obj2.m_numOfLeafs; // Для данного объекта поле m_numOfLeafs будет равно
                                                          // сумме полей m_numOfLeafs obj1 и obj2
  };
  void getNumOfLeafs() // Метод, который выводит на экран значение поля m_numOfLeafs
  {
    cout &lt;&lt; "Количество листьев: " &lt;&lt; m_numOfLeafs;
  };
};

int main()
{
  Tree tree1, tree2, tree3; // Создаем объекты
  tree3.getNumOfLeafs(); // Сейчас поле m_numOfLeafs для tree3 равно 100.
  tree3.addLeafs(tree1, tree2); // Вызываем метод addLeafs(), который изменяет поле m_numOfLeafs
  tree3.getNumOfLeafs(); // Выводит 200, это значение поля m_numOfLeafs, т.к. мы изменили его при помощи метода addLeafs()
  return 0;
};</code></pre>
						</div>
					</div>
				</section>
			</article>

			<aside class="lab-aside" aria-label="Содержание страницы">
				<div class="toc">
					<p class="toc__title">На этой странице</p>
					<ol>
						<li><a href="#class">Класс</a></li>
						<li><a href="#structure">Структура класса</a></li>
						<li><a href="#methods">Методы</a></li>
						<li><a href="#parameters">Методы и параметры</a></li>
					</ol>
				</div>
				<div class="aside-note">
					<strong>Коротко</strong>
					Класс — шаблон, объект — экземпляр, метод — функция внутри класса, поле — переменная внутри класса.
				</div>
			</aside>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>
