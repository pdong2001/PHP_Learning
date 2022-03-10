<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    require('./product.class.php');
    $cart = [];
    define('CART', 'CART_DATA');
    session_start();
    if (isset($_SESSION[CART])) {
        $cart = unserialize($_SESSION[CART]);
    }
    if (isset($_POST['checkout']))
    {
        $cart = [];
    }
    if (isset($_POST['d_product_id'])) {
        foreach ($cart as $key => $value) {
            $productId = $_POST['d_product_id'];
            if ($value->id == $productId) {
                if ($value->quantity == 1) unset($cart[$key]);
                else $value->quantity--;
            }
        }
    }
    $_SESSION[CART] = serialize($cart);
    ?>
    <div class="container">

        <h1>Giỏ hàng</h1>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sum = 0;
                foreach ($cart as $item) : $sum += $item->quantity * $item->price;?>
                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->name ?></td>
                        <td><?php echo $item->quantity ?></td>
                        <td><img src='<?php echo $item->imagePath ?>' width="100" height="100" /></td>
                        <td><?php echo number_format($item->price, 0, ',', '.') ?>đ</td>
                        <td><?php echo number_format($item->quantity * $item->price, 0, ',', '.')?>đ</td>
                        <td style="width:15rem;">
                            <form method="post" class="d-inline-table" action="">
                                <input type="hidden" value="<?php echo $item->id ?>" name="d_product_id">
                                <button type="submit" class="btn btn-outline-primary">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                    <td colspan="5">Tổng</td>
                    <td><?php
                        echo number_format($sum, 0, ',', '.')
                    ?>đ</td>
                    <td>
                        <form method="post" class="d-inline-table" action="">
                            <button type="submit" name='checkout' class="btn btn-outline-primary">Thanh toán</button>
                        </form>
                    </td>
            </tfoot>
        </table>
    </div>
    <script defer>
            <?php if (isset($_POST['checkout'])) echo "alert('Đã thanh toán.')"?>
    </script>
</body>

</html>