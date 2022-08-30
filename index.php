<?php

/*
 * Написать функцию сортировки простого численного массива, не используя стандартные функции сортировки.
 * В качестве аргументов передавать сам массив и тип сортировки ASC/DESC.
 */


function blob(array $array, bool $isASC = true): array
{
    $sortedArray = $array;
    for ($i = 1; $i <= sizeof($sortedArray); $i++) {
        for ($k = 0; $k <= (sizeof($sortedArray) - 1 - $i); $k++) {
            if ($sortedArray[$k] > $sortedArray[$k + 1]) {
                $buffer = $sortedArray[$k + 1];
                $sortedArray[$k + 1] = $sortedArray[$k];
                $sortedArray[$k] = $buffer;
            }
        }
    }

    if (!$isASC) {
        $buffer = [];
        for ($i = 1; $i <= sizeof($sortedArray); $i++) {
            $buffer[] = $sortedArray[sizeof($sortedArray) - $i];
        }
        $sortedArray = $buffer;
    }
    return $sortedArray;
}

$array1 = [1, 2, 10, 3, 15, 48, 100, 92, 7, 10];
$array2 = [23, 32, 44, 55, 0, 18];

echo "ARRAYS" . PHP_EOL;
echo json_encode($array1) . PHP_EOL;//return [1,2,3,7,10,10,15,48,92,100]
echo json_encode($array2) . PHP_EOL;//return [0,18,23,32,44,55]


echo PHP_EOL . "ASC" . PHP_EOL;
echo json_encode(blob($array1)) . PHP_EOL;//return [1,2,3,7,10,10,15,48,92,100]
echo json_encode(blob($array2)) . PHP_EOL;//return [0,18,23,32,44,55]

echo PHP_EOL . "DESC" . PHP_EOL;
echo json_encode(blob($array1, false)) . PHP_EOL;//return [100,92,48,15,10,10,7,3,2,1]
echo json_encode(blob($array2, false)) . PHP_EOL;//return [55,44,32,23,18,0]


