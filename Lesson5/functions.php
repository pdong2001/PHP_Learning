<?php
function isPrimeNumber($n)
{
    // so nguyen n < 2 khong phai la so nguyen to
    if ($n < 2) {
        return false;
    }
    // check so nguyen to khi n >= 2
    $squareRoot = sqrt($n);
    for ($i = 2; $i <= $squareRoot; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
function fibonaci($n) {
    if($n == 0 || $n == 1) return 1;
    global $count;
    $count++;
    return fibonaci($n - 1) + fibonaci($n - 2);
}
function isPerfectNumber($n)
{
    $sum = 0;
    for ($i=1; $i < $n; $i++) {
        for ($j=1; $j < $i; $j++) { 
            if ($n % $j == 0)
            {
                $sum += $j;
            }
        }
    }
    return $sum <= $n;
}
function UCLN($a,$b) : int
{
    return  ($b ==0 ? $a : ucln($b,$a%$b));
}
function BCNN($a,$b) : int
{
    return $a*$b/UCLN($a,$b);
}