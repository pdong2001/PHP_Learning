<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 7</title>
</head>

<body class='container'>
    <a href="index.php">Trở về</a>
    
    <?php
    require('./functions.php');
    class Cls {
            public int $a;
            public int $b;
            public function __construct(int $a, int $b)
            {
                $this->a = $a;
                $this->b = $b;
            }
            public function UCLN() : int
            {
                $a = $this->a;
                $b = $this->b;
                if ($a == 0 || $b == 0){
                    return $a + $b;
                }
                while ($a != $b){
                    if ($a > $b){
                        $a -= $b; // a = a - b
                    }else{
                        $b -= $a;
                    }
                }
                return $a;
            }
            public function BCNN() : int
            {
                return $this->a*$this->b/$this->UCLN();
            }
        }
    if (isset($_POST['submit'])) 
    {
        $cls = new Cls($_POST['a'],$_POST['b']);
        $rs = 'Ước chung lớn nhất : '.$cls->UCLN();
        $rs .= '<br>Bội chung nhỏ nhất : '.$cls->BCNN();
    }
    ?>
    <form action="" method="post">
        <div class="from-group">
            <label for="n">Nhập A</label>
            <input value="<?php if (isset($cls->a)) echo $cls->a ?>" type="text" name="a" id="a" class="form-control">
        </div>
        <div class="from-group">
            <label for="n">Nhập B</label>
            <input value="<?php if (isset($cls->b)) echo $cls->b ?>" type="text" name="b" id="b" class="form-control">
        </div>
        <input type="submit" class='m-3 btn btn-outline-primary' name="submit" value="Tìm">
    </form>
    <div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>