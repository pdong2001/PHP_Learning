<?php
    class BacNhat {
        public int $a;
        public int $b;
        public function __construct(int $a, int $b)
        {
            $this->a = $a;
            $this->b = $b;
        }
        public function Giai() : string {
            if ($this->a == 0) {
                if ($this->b == 0)
                {
                    return 'Phương trình có vô số nghiệm';
                }
                else
                {
                    return 'Phương trình vô nghiệm';
                }
            }
            else
            {
                return 'Phương trình có nghiệm x = ' . (-$this->b/$this->a);
            }
        }
    }
?>