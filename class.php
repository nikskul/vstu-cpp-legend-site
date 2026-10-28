<?php include 'header.php' ?>
<section class="page">
    <article>
      <h1>Как разобраться с классами и методами. ООП</h1>
      <p>До этого момента все мы привыкли писать программы при помощи функций. Стандартный процедурный метод написания программ. Но в ООП вместо функций используют методы, являющиеся частью класса.</p>
      <h2>Класс</h2>
      <p>Класс можно рассматривать как некий паттерн(шаблон), на оснве которого создаются объекты. Любой класс состоит из набора полей различных типов данных, и функций, которые в ООП называют метод класса.
      По сути класс это ваш собственный тип данных с функциями внутри.<br>
      Для задания класса используется ключевое слово class.</p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
class Tree {
  // поля и методы класса
};
        </code></pre>
      </div>
      <h2>Структура класса</h2>
      <p>Классы имеют особенность - спецификаторы доступа: public, private, protected. <br> <br>
        <li>public: делает члены открытыми;</li>  <br>
        <li>private: делает члены закрытыми;</li>  <br>
        <li>protected: открывает доступ к членам только для дружественных и дочерних классов.</li> <br></p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
class Tree {
  int m_treeAge // По умолчанию члены класса закрыты
private: // Ко всему, что написано ниже имеет доступ только другие члены этого класса
  int m_numOfLeafs; // Поле класса
public: // Ко всему, что написано ниже можно получить доступ из любой точки программы
  // Здесь обычно пишут методы
protected: // Ко всему, что написано имеют доступ только дружественные и дочерние классы
};
        </code></pre>
      </div>
      <h2>Методы</h2>
      <p>Методы работают и определяются как обычные функции, при помощи них осуществляют взаимодействие с членами класса.</p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
class Tree {
private:
  int m_numOfLeafs = 100;
public:
  void getNumOfLeafs() // Метод, который выводит на экран значение поля m_numOfLeafs
  {
    cout << "Количество листьев: " << m_numOfLeafs;
  };
};

int main()
{
  Tree tree1; // Создаем объект tree1
  tree1.getNumOfLeafs(); // Вызываем метод getNumOfLeafs()
  return 0;
};
        </code></pre>
      </div>
      <p>В результате в консоль выведется 100. Если попробовать вывести значениене не через метод, a как с обычной структурой то получим ошибку, т.к. поле записано в спецификатор private</p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
int main()
{
  Tree tree1; // Создаем объект tree1
  cout << tree1.m_numOfLeafs; // Ошибка нет доступа к полю
  return 0;
};
        </code></pre>
      </div>
      <p>Но если переместить поле в public, то все работает без проблем. Пробемы начнутся потом, если вы будете так делать. Это как глобальные переменные, оно того не стоит.</p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
class Tree {
public:
  int m_numOfLeafs = 100; // Теперь это поле доступно во всей пограмме
};

int main()
{
  Tree tree1; // Создаем объект tree1
  cout << tree1.m_numOfLeafs; // Выводит 100
  return 0;
};
        </code></pre>
      </div>
      <h2>Методы и параметры</h2>
      <p>В методы как и в функции можно передавать параметры. Такими параметрами могут выступать и объекты классов.</p>
      <div class="script">
        <div class="script-article"><span>C++</span></div>
        <pre><code data-language="c">
class Tree {
private:
  int m_numOfLeafs = 100;
public:
  addLeafs (Tree obj1, Tree obj2) // Метод складывающий поля объектов
  {
    m_numOfLeafs = obj1.m_numOfLeafs + obj2.m_numOfLeafs; // Для данного объекта поле m_numOfLeafs будет равно
                                                          // сумме полей m_numOfLeafs obj1 и obj2
  };
  void getNumOfLeafs() // Метод, который выводит на экран значение поля m_numOfLeafs
  {
    cout << "Количество листьев: " << m_numOfLeafs;
  };
};

int main()
{
  Tree tree1, tree2, tree3; // Создаем объекты
  tree3.getNumOfLeafs(); // Сейчас поле m_numOfLeafs для tree3 равно 100.
  tree3.addLeafs(tree1, tree2); // Вызываем метод addLeafs(), который изменяет поле m_numOfLeafs
  tree3.getNumOfLeafs(); // Выводит 200, это значение поля m_numOfLeafs, т.к. мы изменили его при помощи метода addLeafs()
  return 0;
};
        </code></pre>
      </div>
</section>
<footer>

</footer>
</body>
<script src="js/rainbow-custom.min.js"></script>
<script src="js/c.js"></script>
</html>
