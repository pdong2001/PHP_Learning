<?php
require('functions.php');
class WorkWithNumber
{
    public int $n;
    public function __construct(int $n)
    {
        $this->n = $n;
    }
    public function Tong(): int
    {
        $sum = ($this->n * ($this->n - 1)) / 2;
        return $sum;
    }
    public function Tich(): int
    {
        $sum = 1;
        for ($i = 1; $i <= $this->n; $i++) {
            $sum *= $i;
        }
        return $sum;
    }
    public function SoChan(): array
    {
        $rs = [];
        for ($i = 2; $i <= $this->n; $i += 2) {
            array_push($rs, $i);
        }
        return $rs;
    }
    public function ChiaHetCho3(): array
    {
        $rs = [];
        for ($i = 0; $i <= $this->n; $i += 3) {
            array_push($rs, $i);
        }
        return $rs;
    }
    public function TongNT(): int
    {
        $sum = 0;
        for ($i = 0; $i <= $this->n; $i++) {
            if (isPrimeNumber($i))
                $sum += $i;
        }
        return $sum;
    }
    public function SoHoanHao(): array
    {
        $arr = [];
        for ($i=0; $i <= $this->n; $i++) { 
            if (isPerfectNumber($i))
            {
                array_push($arr, $i);
            }
        }
        return $arr;
    }
}
