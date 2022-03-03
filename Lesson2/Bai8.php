<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 8</title>
</head>

<body class='container'>
    <a href="index.php">Trở về</a>

    <!-- Read file -->
    <?php
    if (file_exists('inputBai8.txt')) {
        $fileRead = fopen('inputBai8.txt', 'r');
        if (!$fileRead) {
            echo "Open file to read error!";
        } else {
            $data = [];
            $index = 0;
            while (!feof($fileRead)) {
                $line = fgets($fileRead);
                if (!empty($line))
                {
                    $data[$index++] = explode( ' ', $line);
                }
            }
            fclose($fileRead);


            foreach ($data[0] as $key => $number) {
                if ($key == 0) {
                    $a = $number;
                } elseif ($key == 1) {
                    $b = $number;
                }
            }
        }
    }
    ?>

    <?php
    function GiaiThua($n)
    {
        if ($n == 0) return 1;
        return $n * GiaiThua($n - 1);
    }
    function ToHop($n, $k)
    {
        return GiaiThua($n)/(GiaiThua($k)*GiaiThua($n - $k));
    }
    if (isset($_POST['submit'])) 
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $rs = 'Tổ hợp chập '.$b.' của '.$a.' phần tử : '.ToHop($a, $b);

        $fileWrite = fopen('outputBai8.txt', 'w+');
        if (!$fileWrite) {
            echo "Open file to write error!";
        }
        else
        {
            fwrite($fileWrite, $rs);
        }
        fclose($fileWrite);
    }
    ?>
    <form action="" method="post">
        <div class="from-group">
            <label for="n">Nhập N</label>
            <input value="<?php if (isset($a)) echo $a ?>" type="text" name="a" id="a" class="form-control">
        </div>
        <div class="from-group">
            <label for="n">Nhập K</label>
            <input value="<?php if (isset($b)) echo $b ?>" type="text" name="b" id="b" class="form-control">
        </div>
        <input type="submit" class='m-3 btn btn-outline-primary' name="submit" value="Tính">
    </form>
    <div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>