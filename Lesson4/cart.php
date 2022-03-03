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
    class Product
    {
        public string $id = '';
        public string $name = '';
        public int $quantity = 1;
        public string $imagePath = '';
        static function parse_str(string $value): Product
        {
            $data = explode('#', $value);
            $product = new Product;
            if (isset($data)) {
                $product->id = $data[0];
                $product->name = $data[1];
                $product->quantity = isset($data[2]) ? $data[2] : 0;
                $product->imagePath = isset($data[3]) ? $data[3] : '';
            }
            return $product;
        }
        public function toTableRow(bool $addBtn = true): string
        {
            return "<td>{$this->id}</td><td>{$this->name}</td><td>{$this->quantity}</td><td><img width='100' height='100' src={$this->imagePath}/></td>" . '<td style="width:15rem;"><form method="post" class="d-inline-table" action=""><input type="hidden" value="' . $this->id . '" name="' . ($addBtn ? 'product_id' : 'd_product_id') . '"><button type="submit" class="btn btn-outline-primary">' . ($addBtn ? "Thêm vào giỏ hàng" : "Xóa khỏi giỏ hàng") . '</button></form></td>';
        }
    }
    $cart = [];
    define('CART', 'CART_DATA');
    session_start();
    if (isset($_SESSION[CART])) {
        $cart = unserialize($_SESSION[CART]);
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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cart as $item) : ?>
                    <tr>
                        <td><?php echo $item->id ?></td>
                        <td><?php echo $item->name ?></td>
                        <td><?php echo $item->quantity ?></td>
                        <td><img src='<?php echo $item->imagePath ?>' width="100" height="100" /></td>
                        <td style="width:15rem;">
                            <form method="post" class="d-inline-table" action="">
                                <input type="hidden" value="<?php echo $item->id ?>" name="d_product_id">
                                <button type="submit" class="btn btn-outline-primary">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>