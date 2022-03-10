<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 4 - Bài 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require('product.class.php');
    define('INPUT', 'sp.txt');
    $data = [];
    if (file_exists(INPUT)) {
        $fs = fopen(INPUT, 'r');
        if (isset($fs)) {
            $index = 0;
            while (!feof($fs)) {
                $line = fgets($fs);
                if (!empty($line)) {
                    $data[$index++] = Product::parse_str($line);
                }
            }
        }
    }
    $regex = "/";
    if (isset($_REQUEST['search'])) {
        $searchWords = explode(' ', $_REQUEST['search']);
        foreach ($searchWords as $key => $value) {
            $regex .= '(' . $value . ')|';
        }
        $regex = trim($regex, '|') . '/';
        $data = array_filter($data, function ($product) {
            return preg_match($GLOBALS['regex'], serialize($product));
        });
    }
    ?>
    <?php
    $cart = [];
    define('CART', 'CART_DATA');
    session_start();
    if (isset($_SESSION[CART])) {
        $cart = unserialize($_SESSION[CART]);
    }
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        $notExist = true;
        foreach ($cart as $value) {
            if ($value->id == $productId) {
                $value->quantity++;
                $notExist = false;
            }
        }
        if ($notExist) {
            foreach ($data as $value) {
                if ($value->id == $productId) {
                    $sp = clone $value;
                    $sp->quantity = 1;
                    array_push($cart, clone $sp);
                }
            }
        }
    }
    $_SESSION[CART] = serialize($cart);
    ?>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Danh sách sản phẩm</h1>
            <a href="cart.php">Giỏ hàng -></a>
        </div>
        <div class="d-flex flex-row-reverse my-3">
            <form action="" class="d-inline-block">
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Tìm kiếm từ khóa...">
                    <button type="submit" class="btn btn-outline-success">Tìm</button>
                </div>
            </form>
        </div>
        <div class="row">
            <?php foreach ($data as $item) : ?>
                <div class="col-3 my-3 h-100">
                    <div class="flex-grow-1"><img class="w-100 h-100" style="object-fit: cover;" src="<?php echo $item->imagePath ?>" alt="Ảnh sản phẩm"></div>
                    <div class="my-1">
                        <strong><?php echo $item->name ?></strong>
                        <div>
                            <div class="d-flex justify-content-between">
                                <span>Mã : <?php echo $item->id ?></span>
                                <strong class="text-danger">Đơn giá : <?php echo number_format($item->price, 0, ',', '.') ?>đ</strong>
                            </div>
                            <span>Số lượng : <?php echo $item->quantity ?></span>
                        </div>
                        <form method="post" class="d-inline-block" action="">
                            <input type="hidden" value="<?php echo $item->id ?>" name="product_id">
                            <button type="submit" class="btn btn-outline-danger">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="index.php">Trở lại</a>
    </div>
</body>

</html>