<?php
declare(strict_types=1);
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function operationNumber(array &$items, array &$operations): int {
    operation_print($items);

    echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = +trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('clear');

            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }
    return $operationNumber;
    }

function operation_add(array &$items)  {
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function operation_delete(array &$items)  {
    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
            $itemName = trim(fgets(STDIN));

            if (in_array($itemName, $items, true) !== false) {
                while (($key = array_search($itemName, $items, true)) !== false) {
                    unset($items[$key]);
                }
            }
}

function operation_print(array &$items)  {
    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $items) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

do {
    $operationNumber = operationNumber($items, $operations);

    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;

    switch ($operationNumber) {
        case OPERATION_ADD:
            operation_add($items);
            break;

        case OPERATION_DELETE:
            operation_delete($items);
            break;

        case OPERATION_PRINT:
            operation_print($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);


echo 'Программа завершена' . PHP_EOL;