<?php
class HePT
{
    public float $a1;
    public float $b1;
    public float $c1;
    public float $a2;
    public float $b2;
    public float $c2;
    public function __construct(float $a1, float $b1, float $c1, float $a2, float $b2, float $c2)
    {
        $this->a1 = $a1;
        $this->b1 = $b1;
        $this->c1 = $c1;
        $this->a2 = $a2;
        $this->b2 = $b2;
        $this->c2 = $c2;
    }
    public function Giai(): string
    {
        $rs = '';
        $D = $this->a1 * $this->b2 - $this->a2 * $this->b1;
        $Dx = $this->c1 * $this->b2 - $this->c2 * $this->b1;
        $Dy = $this->a1 * $this->c2 - $this->a2 * $this->c1;
        if ($D == 0) {
            if ($Dx == 0 && $Dy == 0)
                $rs = "Hệ phương trình vô số nghiệm";
            else
                $rs = "Hệ phương trình vô nghiệm";
        } else {
            $x = $Dx / $D;
            $y = $Dy / $D;
            $rs = "x=" . $x . '<br>y=' . $y;
        }
        return $rs;
    }
}
