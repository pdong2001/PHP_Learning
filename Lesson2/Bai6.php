<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 6</title>
</head>

<body class='container'>
    <a href="index.php">Trở về</a>

    <!-- Read file -->
    <?php
    if (file_exists('inputBai6.txt')) {
        $fileRead = fopen('inputBai6.txt', 'r');
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
    if (isset($_POST['n']) && is_numeric($_POST['n'])) 
    {
        $n = $_POST['n'];
        $rs = 'Các số hoàn hảo trong khoảng từ 1 đến '.$n.' : ';
        for ($i=0; $i <= $n; $i++) { 
            if (isPerfectNumber($i))
            {
                $rs .= $i.', ';
            }
        }
        $rs = trim($rs, ', ');

        $fileWrite = fopen('outputBai6.txt', 'w+');
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
            <input value="<?php if (isset($n)) echo $n ?>" type="text" name="n" id="n" class="form-control">
        </div>
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tìm">
    </form>
    <div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>