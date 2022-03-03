<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 3 - Bài 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    define('INPUT', 'inputBai4.txt');
    define('OUTPUT', 'outputBai4.txt');
    if (file_exists(INPUT)) {
        $fileRead = fopen(INPUT, 'r');
        if (!$fileRead) {
            echo "Open file to read error!";
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
                $item = trim($item);
                if (preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $item)) {
                    fwrite($fs, $item . PHP_EOL);
                }
            }
        }
    } else {
        echo 'File not found!';
    }
    ?>
    <a href="index.php">Trở lại</a>
</body>

</html>