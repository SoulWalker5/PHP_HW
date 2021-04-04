function decimalToBinary(inputDecimal) {
    let inputNum = inputDecimal;
    let outputBinary = "";

    while (inputDecimal != 0) {

        if (inputDecimal % 2 == 0)
            outputBinary += 0;
        else if (inputDecimal % 2)
            outputBinary += 1;
        else
            return 0;

        inputDecimal = (inputDecimal / 2);
    }

    if (inputNum < 0) {
        let length = outputBinary.length;
        for (let i = length; i < 64; i++) {
            outputBinary += 1;
        }
    }

    return ((outputBinary.split('')).reverse()).join('');
}

//Написать функцию которая выполняет преобразование наоборот.
function binaryToDecimal(inputBinary) {
    let array = inputBinary.toString().split(''); //str_split(inputBinary);
    let outputDecimal = 0;
    let count = array.length - 1

    for (let i = 0; i < count; i++) {
        if (array[i] == 1) {
            outputDecimal += 2 ** (count - i);
        }
    }
    return outputDecimal;
}

//Написать функцию которая выводит первые N чисел фибоначчи
function fibonacci(num) {
    let outputNum = "";
    let prevNum = 0;
    let currNum = 1;

    if (num == 0) {
        return prevNum;
    } else if (num == 1) {
        return currNum;
    } else if (num == 2) {
        return "01";
    } else {
        outputNum += prevNum + currNum;

        for (let i = 2; i < num; i++) {
            let nextNum = currNum + prevNum;
            prevNum = currNum;
            currNum = nextNum;
            outputNum = nextNum;
        }
    }

    return outputNum;
}

//Написать функцию, возведения числа N в степень M
function exponentiation(num, exponent) {
    let outputNum = num;
    if (!exponent.numeric) {
        throw new Error("Unknown exponent");
    }
    if (exponent === 0) {
        return 1;
    } else if (exponent < 0) {
        outputNum = 1;

        for (let i = 0; i > exponent; i--) {
            outputNum /= num;
        }
    } else {
        for (let i = 1; i < exponent; i++) {
            outputNum *= num;
        }
    }

    return outputNum;
}

//Написать функцию которая вычисляет входит ли IP-адрес в диапазон
//указанных IP-адресов. Вычислить для версии ipv4.
function isInRange(startIp, endIp, searchedIp) {

    let start = ip2num(startIp);
    let end = ip2num(endIp);
    let searched = ip2num(searchedIp);

    console.log(start);
    console.log(end);
    console.log(searched);

    if (!start || !end || !searched) {
        throw new Error("Argument is not an Ip address ");
    }

    return searched > start && searched < end;

    function ip2num(ip) {
        let re = '^(?!.*\\.$)((1?\\d?\\d|25[0-5]|2[0-4]\\d)(\\.|$)){4}$';
        if(!ip.match(re)){
            return false;
        }

        let ipParts = ip.split('.');
        let res = 0;

        res += parseInt(ipParts[0], 10) << 24;
        res += parseInt(ipParts[1], 10) << 16;
        res += parseInt(ipParts[2], 10) << 8;
        res += parseInt(ipParts[3], 10);

        return res;
    }
}

// Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
function percentage(inputArray) {
    function isPrime(num) {
        for (let i = 2; i < num; i++)
            if (num % i === 0) return false;
        return num > 1;
    }

    let outputArray = {"positive": 0, "negative": 0, "zero": 0, "prime": 0};

    for (let i = 0; i < inputArray.length; i++) {
        if (inputArray[i] == 0) {
            outputArray.zero++;
        } else if (inputArray[i] < 0) {
            outputArray.negative++;
        } else if (inputArray[i] > 0) {
            outputArray.positive++;

            if (isPrime(inputArray[i]))
                outputArray.prime++;
        }
    }

    outputArray.negative *= 100 / inputArray.length;
    outputArray.positive *= 100 / inputArray.length;
    outputArray.zero *= 100 / inputArray.length;
    outputArray.prime *= 100 / inputArray.length;

    return outputArray;
}

// #Отсортировать элементы по возрастанию/убыванию
function orderByAscending(inputArray) {
    let length = inputArray.length - 1;
    for (let i = 0; i < length; i++) {
        for (let j = 0; j < length - i; j++) {
            let nextElement = j + 1;

            if (inputArray[nextElement] < inputArray[j]) {
                let tmp = inputArray[nextElement];
                inputArray[nextElement] = inputArray[j];
                inputArray[j] = tmp;
            }
        }
    }
    return inputArray;
}

// Отсортировать элементы по возрастанию/убыванию
function orderByDescending(inputArray) {
    let length = inputArray.length - 1;
    for (let i = 0; i < length; i++) {
        for (let j = 0; j < length - i; j++) {
            let nextElement = j + 1;

            if (inputArray[nextElement] > inputArray[j]) {
                let tmp = inputArray[nextElement];
                inputArray[nextElement] = inputArray[j];
                inputArray[j] = tmp;
            }
        }
    }
    return inputArray;
}

// Транспонировать матрицу
function transposeMatrix(inputArray) {
    let outputArray = [];
    let length = inputArray.length;
    let countI = inputArray[0].length;

    for (let i = 0; i < length; i++) {
        outputArray.push([]);
    }

    for (let i = 0; i < countI; i++) {
        for (let j = 0; j < length; j++) {
            if (!inputArray[j][i]) {
                outputArray[i][j] = 0;
            } else {
                outputArray[j].push(inputArray[j][i]);
            }
        }
    }
    return outputArray;
}

// Умножить две матрицы
function multiplyMatrix(matrix1, matrix2) {
    let matrix2Length = matrix2.length;
    let outputMatrix = [];

    if (matrix1[0].length != matrix2Length) {
        throw new Error('Incompatible matrix');
    }

    for (let i = 0, matrix1Length = matrix1.length; i < matrix1Length; i++) {
        outputMatrix[i] = [];
        for (let j = 0; j < matrix2[i].length; j++) {
            let sum = 0;
            for (let k = 0; k < matrix2Length; k++) {
                sum += matrix1[i][k] * matrix2[k][j];
            }
            outputMatrix[i].push(sum);

        }
    }

    return outputMatrix;
}

// Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
function deleteRows(inputArray) {
    for (let i = 0; i < inputArray.length; i++) {
        let sumOfRow = 0;
        let haveZero = false;
        let columnLength = inputArray[i].length;

        for (let j = 0; j < columnLength; j++) {
            sumOfRow += inputArray[i][j];

            if (inputArray[i][j] == 0) {
                haveZero = true;
            }
        }

        if (sumOfRow > 0 && haveZero) {
            for (let k = 0; k < columnLength; k++) {
                inputArray[k].splice(i, 1);
            }
        }
    }

    return inputArray;
}

// Аналогично для столбцов.
function deleteColumns(inputArray) {
    let length = inputArray.length;
    for (let i = 0; i < length; i++) {
        let sumOfColumns = 0;
        let haveZero = false;
        let columnLength = inputArray[i].length;

        for (let j = 0; j < columnLength; j++) {
            sumOfColumns += inputArray[j][i];

            if (inputArray[i][j] == 0) {
                haveZero = true;
            }
        }

        if (sumOfColumns > 0 && haveZero)
            for (let k = 0; k < columnLength; k++) {
                inputArray[k].splice(i, 1);
            }
    }

    return inputArray;
}

// Написать функцию которая по параметрам принимает число
// из десятичной системы счисления и преобразовывает в двоичную.(Рекурсия)
function decimalToBinaryRecursion(inputDecimal, outputString = " ") {
    if (inputDecimal == 0) {
        return ((outputString.split('')).reverse()).join('');
    } else if (inputDecimal % 2 == 0)
        outputString += 0;
    else if (inputDecimal % 2)
        outputString += 1;

    inputDecimal = Math.floor(inputDecimal / 2);

    return decimalToBinaryRecursion(inputDecimal, outputString);
}

// #Написать функцию которая выполняет преобразование наоборот.(Рекурсия)
function binaryToDecimalRecursion(inputBinary, marker = 0, outputNumber = 0) {
    let array = inputBinary.toString().split('');

    if (array.length - 1 == marker) {
        return outputNumber;
    }

    if (array[marker] == 1) {
        outputNumber += 2 ** ((array.length - 1) - marker);
    }
    marker++;

    return binaryToDecimalRecursion(inputBinary, marker, outputNumber);
}

// #Написать функцию которая выводит первые N чисел фибоначчи (Рекурсия)
function fibonacciRecursion(num, marker = 2, prevNum = 0, currNum = 1, outputNum = "") {
    let nextNum = currNum + prevNum;

    if (marker == num) {
        return outputNum;
    }
    if (prevNum == 0) {
        outputNum += prevNum + currNum;
    }

    marker++;
    prevNum = currNum;
    currNum = nextNum;
    outputNum = nextNum;

    return fibonacciRecursion(num, marker, prevNum, currNum, outputNum);
}

// let fibrec = fibonacciRecursion(8);
// console.log(fibrec);

// Написать функцию, возведения числа N в степень M (Рекурсия)
function exponentiationRecursion(num, exponent) {
    if (exponent == 0) {
        return 1;
    }

    if (exponent > 0) {
        return num * exponentiationRecursion(num, exponent - 1);
    }
}

// Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел(Рекурсия)
function percentageRecursion(inputArray, marker = 0, outputArray = {}) {
    function isPrime(num) {
        for (let i = 2; i < num; i++)
            if (num % i === 0) return false;
        return num > 1;
    }

    if (Object.keys(outputArray).length === 0) {
        outputArray = {"positive": 0, "negative": 0, "zero": 0, "prime": 0};
    }

    if (inputArray.length == marker) {
        outputArray.negative *= 100 / inputArray.length;
        outputArray.positive *= 100 / inputArray.length;
        outputArray.zero *= 100 / inputArray.length;
        outputArray.prime *= 100 / inputArray.length;

        return outputArray;
    }

    if (inputArray[marker] == 0) {
        outputArray.zero++;
    } else if (inputArray[marker] < 0) {
        outputArray.negative++;
    } else if (inputArray[marker] > 0) {
        outputArray.positive++;

        if (isPrime(inputArray[marker]))
            outputArray.prime++;
    }

    marker++;

    return percentageRecursion(inputArray, marker, outputArray);
}

// Отсортировать элементы по возрастанию/убыванию
function orderByAscendingRecursion(inputArray, marker = 0) {
    let length = inputArray.length - 1;

    if (length == marker) {
        return inputArray;
    }

    for (let i = 0; i < length - marker; i++) {
        let nextElement = i + 1;

        if (inputArray[nextElement] < inputArray[i]) {
            let tmp = inputArray[nextElement];
            inputArray[nextElement] = inputArray[i];
            inputArray[i] = tmp;
        }
    }

    marker++;

    return orderByAscendingRecursion(inputArray, marker);
}

// #Отсортировать элементы по возрастанию/убыванию
function orderByDescendingRecursion(inputArray, marker = 0) {
    let length = inputArray.length - 1;

    if (length == marker) {
        return inputArray;
    }

    for (let i = 0; i < length - marker; i++) {
        let nextElement = i + 1;

        if (inputArray[nextElement] > inputArray[i]) {
            let tmp = inputArray[nextElement];
            inputArray[nextElement] = inputArray[i];
            inputArray[i] = tmp;
        }
    }

    marker++;
    return orderByDescendingRecursion(inputArray, marker);
}

// #Транспонировать матрицу
function transposeMatrixRecursion(inputArray, outputArray = [], marker = 0) {
    let length = inputArray.length;

    if (marker == inputArray[0].length) {
        return outputArray;
    }

    for (let j = 0; j < length; j++) {
        if (marker == 0) {
            outputArray.push([]);
        }
        if (!inputArray[j][marker]) {
            outputArray[marker][j] = 0;
        } else {
            outputArray[j].push(inputArray[j][marker]);
        }
    }
    marker++;

    return transposeMatrixRecursion(inputArray, outputArray, marker);
}

// Умножить две матрицы
function multiplyMatrixRecursion(matrix1, matrix2, marker = 0, outputMatrix = []) {
    let matrix2Length = matrix2.length;

    if (marker == matrix1.length) {
        return outputMatrix;
    }

    if (matrix1[0].length != matrix2Length) {
        throw new Error('Incompatible matrix');
    }

    outputMatrix[marker] = [];

    for (let j = 0, c = matrix2[marker].length; j < c; j++) {
        let sum = 0;
        for (let k = 0; k < matrix2Length; k++) {
            sum += matrix1[marker][k] * matrix2[k][j];
        }
        outputMatrix[marker].push(sum);
    }
    marker++;

    return multiplyMatrixRecursion(matrix1, matrix2, marker, outputMatrix);
}

// Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент.
function deleteRowsRecursion(inputArray, marker = 0) {

    let sumOfRow = 0;
    let haveZero = false;
    let columnLength = inputArray[marker].length;

    if (marker == inputArray.length) {
        return inputArray;
    }

    // let sumOfRow = array_sum(inputArray[marker]);

    if (sumOfRow > 0 && haveZero) {
        for (let k = 0; k < columnLength; k++) {
            inputArray[k].splice(marker, 1);
        }
    }

    marker++;
    return deleteRowsRecursion(inputArray, marker);
}

// Аналогично для столбцов.
function deleteColumnsRecursion(inputArray, marker = 0) {
    if (marker == inputArray.length) {
        return inputArray;
    }
    let sumOfColumns = 0;
    let haveZero = false;
    let columnLength = inputArray[marker].length;

    for (let j = 0, count2 = inputArray[marker].length; j < count2; j++) {
        sumOfColumns += inputArray[j][marker];

        if (inputArray[marker][j] == 0) {
            haveZero = true;
        }
    }

    if (sumOfColumns > 0 && haveZero)
        for (let k = 0; k < columnLength; k++) {
            inputArray[k].splice(marker, 1);
        }
    marker++;

    return deleteColumnsRecursion(inputArray, marker);
}

// Написать рекурсивную функцию которая будет обходить и выводить
// все значения любого массива и любого уровня вложенности
function arrayWalkRecursion(inputArray) {
    for (let item of inputArray) {
        if (Array.isArray(item)) {
            arrayWalkRecursion(item);
        } else {
            console.log(item);
        }
    }
}
