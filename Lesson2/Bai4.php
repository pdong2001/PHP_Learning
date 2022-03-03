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

    <!-- Read file -->
    <?php
    if (file_exists('inputBai4.txt')) {
        $fileRead = fopen('inputBai4.txt', 'r');
        if (!$fileRead) {
            echo "Open file to read error!";
        } else {
            while (!feof($fileRead)) {
                $line = fgets($fileRead);
                if (!empty($line)) {
                    $n = explode(' ', $line)[0];
                }
            }
            fclose($fileRead);
        }
    }
    ?>

    <?php
    function isPrimeNumber($n) {
        // so nguyen n < 2 khong phai la so nguyen to
        if ($n < 2) {
            return false;
        }
        // check so nguyen to khi n >= 2
        $squareRoot = sqrt ( $n );
        for($i = 2; $i <= $squareRoot; $i ++) {
            if ($n % $i == 0) {
                return false;
            }
        }
        return true;
    }
    if (isset($_POST['n']) && is_numeric($_POST['n'])) 
    {
        $n = $_POST['n'];
        if (isset($_POST['1']))
        {
            $sum = ($n * ($n - 1))/2;
            $rs = 'Tổng các số tự nhiên nằm trong khoảng từ 1 đến '.$n.' = '.$sum;
        }
        if (isset($_POST['2']))
        {
            $sum = 1;
            for ($i=1; $i <= $n; $i++) { 
                $sum *= $i;
            }
            $rs = 'Tích các số tự nhiên nằm trong khoảng từ 1 đến '.$n.' = '.$sum;
        }
        if (isset($_POST['3']))
        {
            $rs = 'Các số chẵn từ 1 đến '.$n.' = ';
            for ($i=2; $i <= $n; $i += 2) {
                $rs .= $i.', ';
            }
        }
        if (isset($_POST['4']))
        {
            $rs = 'Các số tự nhiên chia hết cho 3 nằm trong khoảng từ 1 đến '.$n.' = ';
            for ($i=0; $i <= $n; $i += 3) { 
                $rs .= $i.', ';
            }
        }
        if (isset($_POST['5']))
        {
            $rs = 'Tổng các số nguyên tố nằm trong khoảng từ 1 đến '.$n.' = ';
            for ($i=0; $i <= $n; $i++) {
                if (isPrimeNumber($i)) 
                $rs .= $i .', ';
            }
        }
        if (isset($rs)) $rs = trim($rs, ', ');

        $fileWrite = fopen('outputBai4.txt', 'w+');
        if (!$fileWrite) {
            echo "Open file to write error!";
        }
        else
        {
            fwrite($fileWrite, $rs);
        }
        fclose($fileWrite);
    }
//    if (!is_numeric($_POST['n']))
//    {
//        $rs = 'Hãy nhập một số tự nhiên!';
//    }
    ?>
    <form action="" method="post">
        <div class="from-group">
            <label for="n">Nhập N</label>
            <input value="<?php if (isset($n)) echo $n ?>" type="text" name="n" id="n" class="form-control">
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