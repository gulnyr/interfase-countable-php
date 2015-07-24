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


<?php
class myCounter2 implements Countable {
    private $count=0;
    public function count() {
        return ++$this->count;
    }
}

$counter = new myCounter2;

for($i=0; $i<10; ++$i) {
    echo "<br><br>Я посчитан " . count($counter) . " раз";
}
?>