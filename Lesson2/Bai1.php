<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 1</title>
</head>

<body class='container'>
<a href="index.php">Trở về</a>

<!-- Read file -->
<?php
    if (file_exists('inputBai1.txt')) {
    $fileRead = fopen('inputBai1.txt', 'r');
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
if (isset($_POST['submit'])) {
    $a = $_POST['a'];
    $b = $_POST['b'];

    if ($a == 0) {
        if ($b == 0)
        {
            $rs = 'Phương trình có vô số nghiệm';
        }
        else
        {
            $rs = 'Phương trình vô nghiệm';
        }
    }
    else
    {
        $rs = 'Phương trình có nghiệm x = ' . (-$b/$a);
    }

    $fileWrite = fopen('outputBai1.txt', 'w+');
    if (!$fileWrite) {
        echo "Open file to write error!";
    } else {
        fwrite($fileWrite, $rs);
    }
    fclose($fileWrite);


}
?>
<form action="" method="post">
    <pre class="m-3"><span>1: </span><input name="a" type="number" value="<?php if (isset($a)) echo $a ?>">X + <input
                name="b" value="<?php if (isset($b)) echo $b ?>" type="number"> = 0
    <input type="submit" class='m-3 btn btn-outline-primary' value="Giải PT" name="submit">
</form>
<div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>