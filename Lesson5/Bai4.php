<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 4</title>
</head>

<body class='container'>
    <a href="index.php">Trở về</a>
    <?php

    if (isset($_POST['n']) && is_numeric($_POST['n'])) 
    {
        require('./WorkWithNB.class.php');
        $n = $_POST['n'];
        $cls = new WorkWithNumber($n);
        unset($n);
        if (isset($_POST['1']))
        {
            $rs = 'Tổng các số tự nhiên nằm trong khoảng từ 1 đến '.$cls->n.' = '.$cls->Tong();
        }
        if (isset($_POST['2']))
        {
            $rs = 'Tích các số tự nhiên nằm trong khoảng từ 1 đến '.$cls->n.' = '.$cls->Tich();
        }
        if (isset($_POST['3']))
        {
            $rs = 'Các số chẵn từ 1 đến '.$cls->n.' = ';
            $arr = $cls->SoChan();
            foreach ($arr as $key => $value) {
                $rs .= $value.', ';
            }
        }
        if (isset($_POST['4']))
        {
            $rs = 'Các số tự nhiên chia hết cho 3 nằm trong khoảng từ 1 đến '.$cls->n.' = ';
            $arr = $cls->ChiaHetCho3();
            foreach ($arr as $key => $value) {
                $rs .= $value.', ';
            }
        }
        if (isset($_POST['5']))
        {
            $rs = 'Tổng các số nguyên tố nằm trong khoảng từ 1 đến '.$cls->n.' = '.$cls->TongNT();
        }
        if (isset($rs)) $rs = trim($rs, ', ');
    }
//    if (!is_numeric($_POST['n']))
//    {
//        $rs = 'Hãy nhập một số tự nhiên!';
//    }
    ?>
    <form action="" method="post">
        <div class="from-group">
            <label for="n">Nhập N</label>
            <input value="<?php if (isset($cls)) echo $cls->n ?>" type="text" name="n" id="n" class="form-control">
        </div>
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tính tổng" name="1">
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tính tích" name="2">
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tìm số chẵn" name="3">
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tìm số chia hết cho 3" name="4">
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tìm số nguyên tố" name="5">
    </form>
    <div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>