<?php
declare(strict_types=1);

function libraryOne($classname) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $classname).'.php';
    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('libraryOne');

$student = new object\human\Student('John', 'Doe');
$student->study();

$tv = new object\tech\TV('Samsung', 50);
$tv->evaluateCost();

$car = new object\tech\transport\Car('BMW', 1000);
$car->driveMile();
echo $car->mileage;

























// function workingMonth( $workMonth, $workYear ) {
//     $dt = DateTime::createFromFormat('j-m-Y', "1-{$workMonth}-{$workYear}");
//     $counterWeekand = 0;
//     $isWork = true;
//     echo "\033[34m{$dt->format("F Y\n\n")}\033[0m";
//     while ($dt->format("m") == $workMonth) {
//         if ($dt->format("N") == 6 || $dt->format("N") == 7) {
//             echo "\033[31m{$dt->format("j l\n")}\033[0m";
//             $isWork = true;
//             $dt->modify('+1day');
//             continue;
//         } else if ($isWork) {
//             echo "\033[32m{$dt->format("j l\n")}\033[0m";
//             $dt->modify('+1day');
//             $isWork = false;
//             $counterWeekand = 0;
//             continue;
//         } else if (!$isWork && $counterWeekand <2) {
//         echo "\033[31m{$dt->format("j l\n")}\033[0m";
//         $dt->modify('+1day');
//         $counterWeekand +=1;
//         } else {    
//             $counterWeekand = 0;
//             $isWork = true;
//         }
//     }
// }

// workingMonth(2,2015);














// <?php
// echo "Введите, Фамилию\n";
// $name = mb_convert_case(trim(fgets(STDIN)), mode: MB_CASE_TITLE, encoding: "UTF-8");
// echo "Введите, Имя\n";
// $lastName = mb_convert_case(trim(fgets(STDIN)), mode: MB_CASE_TITLE, encoding: "UTF-8");
// echo "Введите, Отчество\n";
// $patronymic = mb_convert_case(trim(fgets(STDIN)), mode: MB_CASE_TITLE, encoding: "UTF-8");


// $fullName = $lastName . ' ' . $name . ' ' . $patronymic;
// $fio = iconv_substr ($name, 0 , 1 , "UTF-8" ) . iconv_substr ($lastName, 0 , 1 , "UTF-8" ) 
//   . iconv_substr ($patronymic, 0 , 1 , "UTF-8" );

// $surnameAndInitials = $lastName . ' ' . iconv_substr ($name, 0 , 1 , "UTF-8" ) . '.' . iconv_substr ($patronymic, 0 , 1 , "UTF-8" );

// echo "Полное имя: '$fullName'\n";
// echo "Фамилия и инициалы: '$surnameAndInitials'\n";
// echo "Аббревиатура: '$fio'\n";














// <?php
// declare(strict_types=1);
// const OPERATION_EXIT = 0;
// const OPERATION_ADD = 1;
// const OPERATION_DELETE = 2;
// const OPERATION_PRINT = 3;

// $operations = [
//     OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
//     OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
//     OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
//     OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
// ];

// $items = [];

// function operationNumber(array &$items, array &$operations): int {
//     operation_print($items);

//     echo 'Выберите операцию для выполнения: ' . PHP_EOL;
//         // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
//         echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
//         $operationNumber = +trim(fgets(STDIN));

//         if (!array_key_exists($operationNumber, $operations)) {
//             system('clear');

//             echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
//         }
//     return $operationNumber;
//     }

// function operation_add(array &$items)  {
//     echo "Введение название товара для добавления в список: \n> ";
//     $itemName = trim(fgets(STDIN));
//     $items[] = $itemName;
// }

// function operation_delete(array &$items)  {
//     echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
//             $itemName = trim(fgets(STDIN));

//             if (in_array($itemName, $items, true) !== false) {
//                 while (($key = array_search($itemName, $items, true)) !== false) {
//                     unset($items[$key]);
//                 }
//             }
// }

// function operation_print(array &$items)  {
//     if (count($items)) {
//         echo 'Ваш список покупок: ' . PHP_EOL;
//         echo implode("\n", $items) . "\n";
//     } else {
//         echo 'Ваш список покупок пуст.' . PHP_EOL;
//     }
// }

// do {
//     $operationNumber = operationNumber($items, $operations);

//     echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

//     switch ($operationNumber) {
//         case OPERATION_ADD:
//             operation_add($items);
//             break;

//         case OPERATION_DELETE:
//             operation_delete($items);
//             break;

//         case OPERATION_PRINT:
//             operation_print($items);
//             break;
//     }

//     echo "\n ----- \n";
// } while ($operationNumber > 0);


// echo 'Программа завершена' . PHP_EOL;
