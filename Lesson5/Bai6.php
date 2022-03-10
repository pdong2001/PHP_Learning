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

    <?php
    require('./WorkWithNB.class.php');
    if (isset($_POST['n']) && is_numeric($_POST['n'])) 
    {
        $cls = new WorkWithNumber($_POST['n']);
        $arr = $cls->SoHoanHao();
        $rs = 'Các số hoàn hảo trong khoảng từ 1 đến '.$cls->n.' : ';
        foreach ($arr as $key => $value) {
            $rs .= $value.', ';
        }
        $rs = trim($rs, ', ');
    }
    ?>
    <form action="" method="post">
        <div class="from-group">
            <label for="n">Nhập N</label>
            <input value="<?php if (isset($cls->n)) echo $cls->n ?>" type="text" name="n" id="n" class="form-control">
        </div>
        <input type="submit" class='m-3 btn btn-outline-primary' value="Tìm">
    </form>
    <div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>