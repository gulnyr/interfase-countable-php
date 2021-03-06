<?php

// *************************Изучим интерфейс Countable********************************

// Но прежде всего нужно знать сам счетчик count

// создадим массивы
// массив обозначается квадратными скобками.
// Они значат - ячейка

$hamster[] = '111';
$hamster[] = '222';
$hamster[] = '333';
$hamster[] = '444';
$hamster[] = '555';

// Функция count возвращает числом количество ячеек массива $hamster

echo count($hamster); // Выводит 5 ячеек


?>

    <br><br>

<?php

// Создаем класс myCounter интерфейса Countable

class myCounter implements Countable
{

// Создаем приватные свойства



    private $count = 0;

// Создаем свойство в качестве массива

    private $hamster = [];

// Создаем конструктор

    public function __construct($arr) {

// Свойству $hamster присваиваем $arr
        $this->hamster = $arr;

// Свойству $count присваиваем счетчик
        $this->count = count($arr);
    }

// Создаем метод для отображения счетчика

    public function count () {

// Возвращаем счетчик

        return $this->count;
    }
}

// теперь в этом объекте будет хранится счётчик элементов массива.
// И в случае очередного подсчёта элементов массива, не надо снова вызывать count(),
// а достаточно обратиться к объекту-счётчику

// Массив создаем сначала, потом создаем объект

$arr = [1,2,3,4,5,6,7,8,9,10,11];
$obj = new myCounter($arr);

// Отображаем счетчик

echo 'В массиве ' . $obj->count() . ' элементов';
?><br><?php

// Есть такой вариант вывода в PHP. Об этом узнал недавно.

echo "В массиве {$obj->count()} элементов";

?>

<!--Второй вариант интерфейса-счетчика-->

<?php

//Создаем в интерфейсе Countable класс myCounter2

class myCounter2 implements Countable {
    
    // Зададим приватное свойство $count со значением 0
    
    private $count=0;
    
    // Сделаем метод для выполнения префиксного инкремента и вернем его результат
    
    public function count() {
        return ++$this->count;
    }
}

// Создаем экземпляр класса

$counter = new myCounter2;

// А здесь мы делаем цикл for, с условиями: начинать с нуля, считать до 10.

for($i=0; $i<10; ++$i) {
    
    // А здесь мы отображаем на экране результат
    
    echo "<br><br>Я посчитан " . count($counter) . " раз";
}



/*************************Из форума получился такой ответ, ответ мне очень понравился**************************************

Действительно, можно встретить две формы записи: с инициализацией и без. 
Обычно программисты явно инициализируют нулем, если они не уверены, или не знают, 
или им лень копаться в документации, чтобы изучать внутренности языка и то, 
как под капотом инициализируются переменные.

В данном коде, если убрать присвоение, переменная инициализируется в значение NULL, 
что легко проверить через var_dump(), а также это соответствует документации. 
Получается, что на первой итерации вы инкрементируете NULL - что из этого получится? 
Документация (см. ниже) говорит, что 1. А дальше уже интуитивно понятно.

"Замечание: Операторы инкремента/декремента влияют только на строки и числа. 
Массивы, объекты и ресурсы не трогаются. 
Декремент NULL также не даст никакого эффекта, однако инкремент даст значение 1."
*/

?>


<?php

//*************************Давайте убедимся на практике************************************


class myCounter2 implements Countable {
    
    // специально сделал $count=5
    
    private $count=5;
    public function count() {
        return ++$this->count;
    }
}

$counter = new myCounter2;

/* 
Проверим через var_dump и видим то, что и было задумано, 
object(myCounter2)#1 (1) { ["count":"myCounter2":private]=> int(5) } 
Отсчет начинается с 5, т.к. у нас инкремент ++$this->count 
(сначала увеличивается, становится 6, потом присваивает, ту же 6)
В итоге считает с 6 до 15
А если инкремент $this->count++, то считает с 5 до 14
т.к. сначала присваивает 5, а потом увеличиевает, т.е. так: 5,6,7...14
*/
var_dump($counter);
for($i=0; $i<10; ++$i) {
    echo "<br><br>Я посчитан " . count($counter) . " раз";
}
?>
