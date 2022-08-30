<?php

/*
 * Написать функцию сортировки простого численного массива, не используя стандартные функции сортировки.
 * В качестве аргументов передавать сам массив и тип сортировки ASC/DESC.
 */


function advancedBlob(array &$arrayToSort, bool $isASC = true): bool
{
    foreach ($arrayToSort as $v) {
        if (!is_numeric($v)) {
            return false;
        }
    }

    for ($i = 1; $i <= sizeof($arrayToSort); $i++) {
        for ($k = 0; $k <= (sizeof($arrayToSort) - 1 - $i); $k++) {
            if ($arrayToSort[$k] > $arrayToSort[$k + 1]) {
                list($arrayToSort[$k],$arrayToSort[$k + 1])=[$arrayToSort[$k + 1],$arrayToSort[$k]];
            }
        }
    }

    if (!$isASC) {
        $arrayToSort=    array_reverse($arrayToSort);
    }

    return true;
}


$array1 = [1, 2, 10, 3, 15, 48, 100, 92, 7, 10];
$array2 = [23, 32, 44, 55, 0, 18];
$array3 = ["ss", 32, 44, 55, 0, 18];

echo "ARRAYS" . PHP_EOL;
echo json_encode($array1) . PHP_EOL;
echo json_encode($array2) . PHP_EOL;
echo json_encode($array3) . PHP_EOL;

echo PHP_EOL . "ASC" . PHP_EOL;

echo (advancedBlob($array1) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array1) . PHP_EOL;

echo (advancedBlob($array2) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array2) . PHP_EOL;

echo (advancedBlob($array3) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array3) . PHP_EOL;


$array1 = [1, 2, 10, 3, 15, 48, 100, 92, 7, 10];
$array2 = [23, 32, 44, 55, 0, 18];
$array3 = ["ss", 32, 44, 55, 0, 18];

echo PHP_EOL . "DESC" . PHP_EOL;

echo (advancedBlob($array1,false) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array1) . PHP_EOL;//return [1,2,3,7,10,10,15,48,92,100]

echo (advancedBlob($array2,false) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array2) . PHP_EOL;

echo (advancedBlob($array3,false) ? 'could convert' : 'could not convert!').' ';
echo json_encode($array3) . PHP_EOL;




