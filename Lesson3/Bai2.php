<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-16">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 3 - Bài 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    define('INPUT', 'inputBai2.txt');
    define('OUTPUT', 'outputBai2.md');
    if (file_exists(INPUT)) {
        $fileRead = fopen(INPUT, 'r');
        if (!$fileRead) {
            echo "Can't open file!";
        } else {
            $data = [];
            $index = 0;
            while (!feof($fileRead)) {
                $line = fgets($fileRead);
                if (!empty($line)) {
                    $data[$index++] = $line;
                }
            }
            fclose($fileRead);
            $fs = fopen(OUTPUT, 'w+');
            foreach ($data as $item) {
                $item = preg_replace('/[.,;!@#$%^&*\(\)]/', ' ', $item);
                $item = preg_replace('/\s+/', ' ', $item);
                $standardized = ucwords(strtolower(trim($item, " \t\n\r\0\x0B.,;")));
                echo $standardized.'<br>';
                fwrite($fs, $standardized . PHP_EOL);
            }
        }
    } else {
        echo 'File not found!';
    }
    ?>
    <a class="d-block" href="<?php echo OUTPUT ?>">File kết quả</a>
    <a class="d-block" href="index.php">Trở lại</a>
</body>

</html>