<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 4 - Bài 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    class Product
    {
        public string $id = '';
        public string $name = '';
        public int $quantity = 1;

        static function parse_str(string $value): Product
        {
            $data = explode('#', $value);
            $product = new Product;
            if (isset($data)) {
                $product->id = $data[0];
                $product->name = $data[1];
            }
            return $product;
        }

        public function toTableRow(bool $addBtn = true): string
        {
            return "<td>{$this->id}</td><td>{$this->name}</td>".($addBtn?('<td style="width:15rem;"><form method="post" class="d-inline-table" action=""><input type="hidden" value="'.$this->id.'" name="product_id"><button type="submit" class="btn btn-outline-primary">Thêm vào giỏ hàng</button></form></td>'):"<td>".$this->quantity."</td>");
        }
    }
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
    ?>
    <?php
        $cart = [];
        define('CART', 'CART_DATA');
        session_start();
        if (isset($_SESSION[CART]))
        {
            $cart = unserialize($_SESSION[CART]);
        }
        if (isset($_POST['product_id']))
        {
            $productId = $_POST['product_id'];
            $notExist = true;
            foreach ($cart as $value)
            {
                if ($value->id == $productId)
                {
                    $value->quantity++;
                    $notExist = false;
                }
            }
            if ($notExist)
            {
                foreach ($data as $value) {
                    if ($value->id == $productId)
                    {
                        array_push($cart, $value);
                    }
                }
            }
        }
        $_SESSION[CART] = serialize($cart);
    ?>
    <h3>Danh sách sản phẩm</h3>
    <table class="table table-danger table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $item) {
                echo '<tr>'.$item->toTableRow().'</tr>';
            }
            ?>
        </tbody>
    </table>
    <h3>Giỏ hàng</h3>
    <table class="table table-danger table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cart as $item) {
                echo '<tr>'.$item->toTableRow(false).'</tr>';
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Trở lại</a>
</body>

</html>