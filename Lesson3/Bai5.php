<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 3 - Bài 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="container-fluid">
    <h1>Buổi 3 - Bài số 5</h1>
    <?php
    class Student
    {
        public $name = '';
        public $birth = '';
        public $phone = '';
        public function toRow()
        {
            echo "<tr><td>{$this->name}</td><td>{$this->birth}</td><td>{$this->phone}</td></tr>";
        }
    }
    define('INPUT', 'inputBai5.txt');
    define('OUTPUT', 'outputBai5.txt');
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
            $studentList = [];
            $index = 1;
            foreach ($data as $item) {
                $item = trim($item);
                $student = new Student;
                $match = '';
                if (preg_match('/(((3[0|1])|([0|1|2][1-9]))\/(0?[1-9]|(1[0-2]))\/(19|20)([0-9]{2}))/', $item, $match)) {
                    $student->birth = $match[0];
                }
                if (preg_match('/(\s|^)((\+\d{2})|0)\d{9}/', $item, $match) && !preg_match('/[a-zA-Z_@.\/#&-)]{11}/', $item)) {
                    $student->phone = $match[0];
                }
                if (preg_match('/(\s|^)([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)/', $item, $match)) {
                    $student->name = $match[0];
                }
                $studentList[$index++] = $student;
            }
        }
    } else {
        echo 'File not found!';
    }
    ?>
    <table class="table table-danger table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nam</th>
                <th scope="col">Birth</th>
                <th scope="col">Phone number</th>
            </tr>
        </thead>
        <tbody >
            <?php
            foreach ($studentList as $item) {
                $item->toRow();
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Trở lại</a>
</body>

</html>