<?php
#Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.
//echo decimalToBinary(34);
function decimalToBinary(int $inputDecimal): string
{
    $outputBinary = "";
    while ($inputDecimal != 0) {

        if ($inputDecimal % 2 == 0)
            $outputBinary .= 0;
        elseif ($inputDecimal % 2)
            $outputBinary .= 1;
        else
            return 0;

        $inputDecimal = round($inputDecimal / 2, $precision = 0, $mode = PHP_ROUND_HALF_DOWN);
    }

    return strrev($outputBinary);
}


#Написать функцию которая выполняет преобразование наоборот.
//echo binaryToDecimal(10010);
function binaryToDecimal(int $inputBinary): int
{
    $array = str_split($inputBinary);
    $outputDecimal = 0;

    for ($i = 0, $count = count(@$array) - 1; $i < $count; $i++) {
        if ($array[$i] == 1) {
            $outputDecimal += 2 ** ($count - $i);
        }
    }
    return $outputDecimal;
}


#Написать функцию которая выводит первые N чисел фибоначчи
//echo fibonacci(8);
function fibonacci(int $num): string
{
    $outputNum = "";
    $prevNum = 0;
    $currNum = 1;

    if ($num == 0) {
        return 0;
    } elseif ($num == 1) {
        return 0;
    } elseif ($num == 2) {
        return "01";
    } else {
        $outputNum .= $prevNum . $currNum;

        for ($i = 2; $i < $num; $i++) {
            $nextNum = $currNum + $prevNum;
            $prevNum = $currNum;
            $currNum = $nextNum;
            $outputNum .= $nextNum;
        }
    }

    return $outputNum;
}


#Написать функцию, возведения числа N в степень M
//echo exponentiation(2,4);
function exponentiation(int $num, $exponent): int
{
    if (!is_int($exponent)) {
        return $num;
    }

    $outputNum = $num;

    for ($i = 1; $i < $exponent; $i++) {
        $outputNum *= $num;
    }

    return $outputNum;
}


#Написать функцию которая вычисляет входит ли IP-адрес в диапазон
# указанных IP-адресов. Вычислить для версии ipv4.
//echo isInRange("0.0.0.0", "255.255.255.255", "255.255.0.1");
function isInRange($startIp, $endIp, $searchedIp): bool
{
    $start = ip2long($startIp);
    $end = ip2long($endIp);
    $searched = ip2long($searchedIp);

    if (empty($startIp) || empty($endIp) || empty($searched)) {
        echo "<p>Invalid IP, please try again</p>";
        return 0;
    }

    return $searched > $start && $searched < $end;
}


#Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
//foreach (percentage([0, -1, 2, 4]) as $index => $item) {
//    echo "<p>$index => $item</p>";
//};
function percentage(array $inputArray): array
{
    $outputArray = ["positive" => 0, "negative" => 0, "zero" => 0, "prime" => 0];

    for ($i = 0; $i < count($inputArray); $i++) {
        if ($inputArray[$i] == 0) {
            $outputArray["zero"]++;
        } elseif ($inputArray[$i] < 0) {
            $outputArray["negative"]++;
        } elseif ($inputArray[$i] > 0) {
            $outputArray["positive"]++;

            if (gmp_prob_prime($inputArray[$i]) == 2)
                $outputArray["prime"]++;
        }
    }

    $outputArray["negative"] *= 100 / count($inputArray);
    $outputArray["positive"] *= 100 / count($inputArray);
    $outputArray["zero"] *= 100 / count($inputArray);
    $outputArray["prime"] *= 100 / count($inputArray);

    return $outputArray;
}


#Отсортировать элементы по возрастанию/убыванию
//print_r(orderByAscending([5,7,8,2,4,5,8,3,21]));
function orderByAscending(array $inputArray): array
{
    $length = count($inputArray) - 1;
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i; $j++) {
            $nextElement = $j + 1;

            if ($inputArray[$nextElement] < $inputArray[$j]) {
                $tmp = $inputArray[$nextElement];
                $inputArray[$nextElement] = $inputArray[$j];
                $inputArray[$j] = $tmp;
            }
        }
    }
    return $inputArray;
}


#Отсортировать элементы по возрастанию/убыванию
//print_r(orderByDescending([5,7,8,2,4,5,8,3,21]));
function orderByDescending(array $inputArray): array
{
    $length = count($inputArray) - 1;
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i; $j++) {
            $nextElement = $j + 1;

            if ($inputArray[$nextElement] > $inputArray[$j]) {
                $tmp = $inputArray[$nextElement];
                $inputArray[$nextElement] = $inputArray[$j];
                $inputArray[$j] = $tmp;
            }
        }
    }
    return $inputArray;
}


#Транспонировать матрицу
//foreach (transposeMatrix([["gh", null, 3, 4], [5, 6, 7, 8]]) as $index => $item) {
//    foreach ($item as $value) {
//        echo "<p>$value</p>";
//    }
//};
function transposeMatrix(array $inputArray): array
{
    $outputArray = [];

    for ($i = 0, $countI = count($inputArray[0]); $i < $countI; $i++) {
        for ($j = 0; $j < count($inputArray); $j++) {
            if (is_null($inputArray[$j][$i])) {
                $outputArray[$i][$j] = 0;
            } else {
                $outputArray[$i][$j] = $inputArray[$j][$i];
            }
        }
    }
    return $outputArray;
}


#Умножить две матрицы
//$matrix1 = [[2, 3, 4], [1, 0, 1]];
//$matrix2 = [[1, 0], [2, 3], [4, 1]];
//
//foreach (multiplyMatrix($matrix1, $matrix2) as $key => $item) {
//    foreach ($item as $val) {
//        echo "<p>$val</p>";
//    }
//};
function multiplyMatrix(array $matrix1, array $matrix2): array
{
    $matrix2Length = count($matrix2);
    $outputMatrix = array();

    if (count($matrix1[0]) != $matrix2Length) {
        echo "<p>Incompatible matrix</p>";
        return [];
    }

    for ($i = 0, $matrix1Length = count($matrix1); $i < $matrix1Length; $i++) {
        for ($j = 0, $c = count($matrix2[$i]); $j < $c; $j++) {
            for ($k = 0; $k < $matrix2Length; $k++) {
                $outputMatrix[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
            }
        }
    }

    return ($outputMatrix);
}


#Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
//print_r(deleteRows([[0, 1, 2,], [-1, -2, 4], [1, -2, 4]]));
function deleteRows(array $inputArray): array
{
    for ($i = 0; $i < count($inputArray); $i++) {
        $sumOfRow = array_sum($inputArray[$i]);

        if ($sumOfRow > 0 && is_int(array_search(0, $inputArray[$i]))) {
            array_splice($inputArray, $i, 1);
        }
    }

    return $inputArray;
}


#Аналогично для столбцов.
//foreach (deleteColumns([[0, 1, 2,], [-1, -2, 4], [2, -2, 4]]) as $index => $item) {
//    foreach ($item as $value) {
//        echo $value;
//    }
//}
//print_r(deleteColumns([[0, 1, 2,], [-1, -2, 4], [2, -2, 4]]));
function deleteColumns(array $inputArray): array
{
    for ($i = 0, $count = count($inputArray); $i < $count; $i++) {
        $sumOfColumns = 0;
        $haveZero = false;

        for ($j = 0, $count2 = count($inputArray[$i]); $j < $count2; $j++) {
            $sumOfColumns += $inputArray[$j][$i];

            if ($inputArray[$i][$j] == 0) {
                $haveZero = true;
            }
        }

        if ($sumOfColumns > 0 && $haveZero)
            for ($k = 0; $k < $count; $k++) {
                unset($inputArray[$k][$i]);
                $inputArray[$k] = array_values($inputArray[$k]);
            }
    }

    $inputArray = array_values($inputArray);

    return $inputArray;
}


#Написать функцию которая по параметрам принимает число
#из десятичной системы счисления и преобразовывает в двоичную.(Рекурсия)
//echo decimalToBinaryRecursion(18);
function decimalToBinaryRecursion(int $inputDecimal, $outputString = ""): string
{
    if ($inputDecimal == 0) {
        return strrev($outputString);
    } elseif ($inputDecimal % 2 == 0)
        $outputString .= 0;
    elseif ($inputDecimal % 2)
        $outputString .= 1;

    $inputDecimal = round($inputDecimal / 2, $precision = 0, $mode = PHP_ROUND_HALF_DOWN);

    return decimalToBinaryRecursion($inputDecimal, $outputString);
}


#Написать функцию которая выполняет преобразование наоборот.(Рекурсия)
//echo binaryToDecimalRecursion(10010);
function binaryToDecimalRecursion(int $inputBinary, $marker = 0, $outputNumber = 0): int
{
    $array = str_split($inputBinary);

    if (count($array) - 1 == $marker) {
        return $outputNumber;
    }

    if ($array[$marker] == 1) {
        $outputNumber += 2 ** ((count($array) - 1) - $marker);
    }
    $marker++;

    return binaryToDecimalRecursion($inputBinary, $marker, $outputNumber);
}


#Написать функцию которая выводит первые N чисел фибоначчи (Рекурсия)
//echo fibonacciRecursion(8);
function fibonacciRecursion(int $num, $prevNum = 0, $currNum = 1, $outputNum = ""): string
{
    $nextNum = $currNum + $prevNum;

    if ($currNum > $num) {
        return $outputNum;
    }
    if ($prevNum == 0) {
        $outputNum .= $prevNum . $currNum;
    }

    $prevNum = $currNum;
    $currNum = $nextNum;
    $outputNum .= $nextNum;

    return fibonacciRecursion($num, $prevNum, $currNum, $outputNum);
}


#Написать функцию, возведения числа N в степень M (Рекурсия)
//echo exponentiationRecursion(2,8);
function exponentiationRecursion($num, $exponent)
{
    if ($exponent == 0) {
        return 1;
    }

    if ($exponent > 0) {
        return $num * exponentiationRecursion($num, $exponent - 1);
    }
}


#Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел(Рекурсия)
//print_r(percentageRecursion([0, -1, 2, 4]));
function percentageRecursion(array $inputArray, $marker = 0, array $outputArray = []): array
{
    if (empty($outputArray)) {
        $outputArray = ["positive" => 0, "negative" => 0, "zero" => 0, "prime" => 0];
    }

    if (count($inputArray) == $marker) {
        $outputArray["negative"] *= 100 / count($inputArray);
        $outputArray["positive"] *= 100 / count($inputArray);
        $outputArray["zero"] *= 100 / count($inputArray);
        $outputArray["prime"] *= 100 / count($inputArray);

        return $outputArray;
    }

    if ($inputArray[$marker] == 0) {
        $outputArray["zero"]++;
    } elseif ($inputArray[$marker] < 0) {
        $outputArray["negative"]++;
    } elseif ($inputArray[$marker] > 0) {
        $outputArray["positive"]++;

        if (gmp_prob_prime($inputArray[$marker]) == 2)
            $outputArray["prime"]++;
    }

    $marker++;
    return percentageRecursion($inputArray, $marker, $outputArray);
}


#Отсортировать элементы по возрастанию/убыванию
//print_r(orderByAscendingRecursion([5,7,8,2,4,5,8,3,21]));
function orderByAscendingRecursion(array $inputArray, $marker = 0): array
{
    $length = count($inputArray) - 1;

    if ($length == $marker) {
        return $inputArray;
    }

    for ($i = 0; $i < $length - $marker; $i++) {
        $nextElement = $i + 1;

        if ($inputArray[$nextElement] < $inputArray[$i]) {
            $tmp = $inputArray[$nextElement];
            $inputArray[$nextElement] = $inputArray[$i];
            $inputArray[$i] = $tmp;
        }
    }

    $marker++;
    return orderByAscendingRecursion($inputArray, $marker);
}


#Отсортировать элементы по возрастанию/убыванию
//print_r(orderByDescendingRecursion([5,7,8,2,4,5,8,3,21]));
function orderByDescendingRecursion(array $inputArray, $marker = 0): array
{
    $length = count($inputArray) - 1;

    if ($length == $marker) {
        return $inputArray;
    }

    for ($i = 0; $i < $length - $marker; $i++) {
        $nextElement = $i + 1;

        if ($inputArray[$nextElement] > $inputArray[$i]) {
            $tmp = $inputArray[$nextElement];
            $inputArray[$nextElement] = $inputArray[$i];
            $inputArray[$i] = $tmp;
        }
    }

    $marker++;
    return orderByDescendingRecursion($inputArray, $marker);
}


#Транспонировать матрицу
//foreach (transposeMatrixRecursion([["gh", null, 3, 4], [5, 6, 7, 8]]) as $index => $item) {
//    foreach ($item as $value) {
//        echo "<p>$value</p>";
//    }
//};
function transposeMatrixRecursion(array $inputArray, $outputArray = [], $marker = 0): array
{
    if ($marker == count($inputArray[0])) {
        return $outputArray;
    }

    for ($j = 0; $j < count($inputArray); $j++) {
        if (is_null($inputArray[$j][$marker])) {
            $outputArray[$marker][$j] = 0;
        } else {
            $outputArray[$marker][$j] = $inputArray[$j][$marker];
        }
    }
    $marker++;

    return transposeMatrixRecursion($inputArray, $outputArray, $marker);
}


#Умножить две матрицы
//$matrix1 = [[2, 3, 4], [1, 0, 1]];
//$matrix2 = [[1, 0], [2, 3], [4, 1]];
//foreach (multiplyMatrixRecursion($matrix1, $matrix2) as $key => $item) {
//    foreach ($item as $val) {
//        echo "<p>$val</p>";
//    }
//};
function multiplyMatrixRecursion(array $matrix1, array $matrix2, int $marker = 0, $outputMatrix = []): array
{
    $matrix2Length = count($matrix2);

    if ($marker == count($matrix1)) {
        return $outputMatrix;
    }

    if (count($matrix1[0]) != $matrix2Length) {
        echo "<p>Incompatible matrix</p>";
        return [];
    }

    for ($j = 0, $c = count($matrix2[$marker]); $j < $c; $j++) {
        for ($k = 0; $k < $matrix2Length; $k++) {
            $outputMatrix[$marker][$j] += $matrix1[$marker][$k] * $matrix2[$k][$j];
        }
    }
    $marker++;

    return multiplyMatrixRecursion($matrix1, $matrix2, $marker, $outputMatrix);
}


#Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
//print_r(deleteRowsRecursion([[0, 1, 2,], [-1, -2, 4], [1, -2, 4]]));
function deleteRowsRecursion(array $inputArray, $marker = 0): array
{
    if ($marker == count($inputArray)) {
        return $inputArray;
    }

    $sumOfRow = array_sum($inputArray[$marker]);

    if ($sumOfRow > 0 && is_int(array_search(0, $inputArray[$marker]))) {
        array_splice($inputArray, $marker, 1);
    }

    $marker++;
    return deleteRowsRecursion($inputArray, $marker);
}


#Аналогично для столбцов.
//print_r(deleteColumnsRecursion([[0, 1, 2,], [-1, -2, 4], [2, -2, 4]]));
function deleteColumnsRecursion(array $inputArray, $marker = 0): array
{
    if ($marker == count($inputArray)) {
        return $inputArray;
    }
    $sumOfColumns = 0;
    $haveZero = false;

    for ($j = 0, $count2 = count($inputArray[$marker]); $j < $count2; $j++) {
        $sumOfColumns += $inputArray[$j][$marker];

        if ($inputArray[$marker][$j] == 0) {
            $haveZero = true;
        }
    }

    if ($sumOfColumns > 0 && $haveZero) {
        for ($k = 0; $k < count($inputArray); $k++) {
            unset($inputArray[$k][$marker]);
            $array[$k] = array_values($inputArray[$k]);
        }
        $marker--;
    }
    $marker++;

    return deleteColumnsRecursion($inputArray, $marker);
}


#Написать рекурсивную функцию которая будет обходить и выводить
# все значения любого массива и любого уровня вложенности
//arrayWalkRecursion([[2,[0,1],3,4],[[8,9],5,6,7]]);
function arrayWalkRecursion(array $inputArray)
{
    foreach ($inputArray as $item) {
        if (is_array($item)) {
            arrayWalkRecursion($item);
        } else {
            echo "<p>$item</p>";
        }
    }
}
