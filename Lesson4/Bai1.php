<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 4 - Bài 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    class Product
    {
        public string $id = '';
        public string $name = '';

        static function parse_str(string $value) : Product
        {
            $data = explode('#', $value);
            $product = new Product;
            if (isset($data))
            {
                $product->id = $data[0];
                $product->name = $data[1];
            }
            return $product;
        }
        
        public function toTableRow() : string
        {
            return "<tr><td>{$this->id}</td><td>{$this->name}</td></tr>";
        }
    }
    define('INPUT', 'sp.txt');
    $data = [];
    if (file_exists(INPUT))
    {
        $fs = fopen(INPUT, 'r');
        if (isset($fs))
        {
            $index = 0;
            while (!feof($fs)) {
                $line = fgets($fs);
                if (!empty($line))
                {
                    $data[$index++] =  Product::parse_str($line);
                }
            }
        }
    }
    ?>
    <table class="table table-danger table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
            </tr>
        </thead>
        <tbody >
            <?php
            foreach ($data as $item) {
                echo $item->toTableRow();
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Trở lại</a>
</body>

</html>