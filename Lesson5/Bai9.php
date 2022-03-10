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
    if (file_exists('inputBai9.txt')) {
        $fileRead = fopen('inputBai9.txt', 'r');
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
    if (isset($_POST['n']) && is_numeric($_POST['n'])) 
    {
        $h = $_POST['n'];
        $x = 0;
        $output = 0;
        $rs = '';
        for($i = 1;$i<= $h; $i++){
            for($j = 0; $j<= 2*$h; $j++){
                $x = $j-$h;
                if($x < 0){
                    $x *= -1;
                }
                $output = $i - $x;
 
                if($output > 0){
                    $rs .= $output;
                } else{
                    $rs .= " ";
                }
            }
            $rs .= '<br>';
        }

        $fileWrite = fopen('outputBai9.txt', 'w+');
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
    <pre><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></pre>
</body>

</html>