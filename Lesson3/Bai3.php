<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Buổi 3 - Bài 3</title>
</head>
<body>
    <?php
        define('INPUT', 'inputBai3.txt');
        define('OUTPUT', 'outputBai3.txt');
        if (file_exists(INPUT)) {
            $fileRead = fopen(INPUT, 'r');
            if (!$fileRead) {
                echo "Open file to read error!";
            } else {
                $data = [];
                $index = 0;
                while (!feof($fileRead)) {
                    $line = fgets($fileRead);
                    if (!empty($line))
                    {
                        $data[$index++] = $line;
                    }
                }
                fclose($fileRead);
                $fs = fopen(OUTPUT, 'w+');
                foreach ($data as $item) {
                    $item = trim($item);
                    if (preg_match('/^((\+\d{2})|0)\d{9}/', $item) && !preg_match('/[a-zA-Z_@.\/#&-)]{11}/', $item))
                    {
                        fwrite($fs, $item.PHP_EOL);
                    }
                }
            }
        }
        else
        {
            echo 'File not found!';
        }
    ?>
    <a href="index.php">Trở lại</a>
</body>
</html>