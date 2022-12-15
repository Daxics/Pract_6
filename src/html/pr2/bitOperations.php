<?php
function add($num1, $num2) {
    $res = 0;
    $carry = 0;
    $res = $num1^$num2;
    $carry = ($num1&$num2) << 1;
    while ($carry) {
        $tmp = $res;
        $res = $res^$carry;
        $carry = ($tmp&$carry) << 1;
    }
    return $res;
}

function negtive($n) {
    return add(~$n, 1);
}
function sub($a, $b) {
    // Добавить противоположный номер вычитаемого числа
    return add($a, negtive($b));
}

// Удалить знаковый бит
function getSign($n) {
    return $n >> 31;
} 

// Находим абсолютное значение n
function positive($n) {
    return (getSign($n) & 1) ? ~$n : $n;
}

function multiply($a, $b) {
    // Если двухзначные биты знака несовместимы, результат отрицательный
    $isNegtive = false;
    if(getSign($a) ^ getSign($b))
        $isNegtive = true;
    $a = positive($a);
    $b = positive($b);
    $res = 0;
    while ($b | 0) {
        // Когда соответствующий бит b равен 1, нужно только добавить
        if($b & 1)
            $res = add($res, $a);
        $a = $a << 1; // сдвиг влево
        $b = $b >> 1; // б сдвиг вправо
    }
    return $isNegtive == true ? ~$res : $res;
}
function div($a, $b) {

    $isNegtive = false;
    if (getSign($a) ^ getSign($b))
        $isNegtive = true;

    $a = positive($a);
    $b = positive($b);

    $res = 0;
    while ($a >= $b) {
        $res = add($res, 1);
        $a = sub($a, $b);
    }
    return $isNegtive == true ? negtive($res) : $res;
}

function mod($a, $b) {
    $r = div($a, $b); // truncated division
    return sub($a, multiply($r, $b));
}