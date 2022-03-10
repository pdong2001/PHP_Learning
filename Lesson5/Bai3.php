<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Bài 3</title>
</head>

<body class='container'>
<a href="index.php">Trở về</a>

<?php
require('HePT.class.php');
if (isset($_POST['submit'])) {
    $a1 = $_POST['a1'];
    $b1 = $_POST['b1'];
    $c1 = $_POST['c1'];
    $a2 = $_POST['a2'];
    $b2 = $_POST['b2'];
    $c2 = $_POST['c2'];
    $hpt = new HePT($a1, $b1, $c1,$a2, $b2, $c2);
    $rs = $hpt->Giai();
}
?>
<form action="" method="post">
    <pre class="m-3"><span>1: </span><input name="a1" type="number" value="<?php if (isset($a1)) echo $a1 ?>">X + <input
                name="b1" value="<?php if (isset($b1)) echo $b1 ?>" type="number">Y = <input
                value="<?php if (isset($c1)) echo $c1 ?>" name="c1" type="number"></pre>
    <pre class="m-3"><span>2: </span><input name="a2" type="number" value="<?php if (isset($a2)) echo $a2 ?>">X + <input
                name="b2" type="number" value="<?php if (isset($b2)) echo $b2 ?>">Y = <input name="c2" type="number"
                                                                                             value="<?php if (isset($c2)) echo $c2 ?>"></pre>
    <input type="submit" class='m-3 btn btn-outline-primary' value="Giải PT" name="submit">
</form>
<div><?php if (isset($rs)) echo 'Kết quả :<br>' . $rs ?></div>
</body>

</html>