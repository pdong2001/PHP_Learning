<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học PHP</title>
</head>

<body>
    <a href="../index.php">Trở về</a>
    <?php
    function printTriangle($size)
    {
        print('<pre><h3>Hình tam giác</h3><br>');
        for ($i = 0; $i < $size; $i++) {
            print('*' . str_repeat($i < $size - 1 ? ' ' : '*', $i));
            if ($i > 0) {
                print('*');
            }
            print('<br>');
        }
        print('</pre>');
    }
    function printCircle($radius)
    {
        print('<pre><h3>Hình tròn</h3><br>');
        for ($i = 0; $i <= 2 * $radius; $i++) {
            for ($j = 0; $j <= 2 * $radius; $j++) {
                $distance = sqrt(($i - $radius) *
                    ($i - $radius) +
                    ($j - $radius) *
                    ($j - $radius));

                if (
                    $distance > $radius - 0.5 &&
                    $distance < $radius + 0.5
                )
                    echo "*";

                else
                    echo " ";
            }
            echo "<br>";
        }
        print('</pre>');
    }
    function printRectangle($l, $b)
    {
        print('<pre><h3>Hình chữ nhật</h3><br>');
        for ($i = 1; $i <= $l; $i++) {
            for ($j = 1; $j <= $b; $j++)
                if (
                    $i == 1 || $i == $l ||
                    $j == 1 || $j == $b
                )
                    echo "*";

                else
                    echo " ";
            echo "<br>";
        }
        print('</pre>');
    }
    function printTrapzium($size, $l)
    {
        print('<pre><h3>Hình thang</h3><br>');
        for ($i = 0; $i < $size; $i++) {
            print str_repeat(' ', $size - 1 - $i) . str_repeat('*', $i * 2 + $l);
            print '<br>';
        }
        print('</pre>');
    }
    
    function printHeart($size)
    {
        print('<pre><h3>Hình trái tim</h3><br>');
        for (
            $a = floor($size / 2);
            $a <= $size;
            $a = $a + 2
        ) {

            // FOR SPACE BEFORE PEAK-1 : PART 1
            for (
                $b = 1;
                $b < $size - $a;
                $b = $b + 2
            )
                printf(" ");

            // FOR PRINTING PEAK-1 : PART 2
            for ($b = 1; $b <= $a; $b++)
                printf("*");

            // FOR SPACE B/W PEAK-1 AND PEAK-2 : PART 3
            for ($b = 1; $b <= $size - $a; $b++)
                printf(" ");

            // FOR PRINTING PEAK-2 : PART 4
            for ($b = 1; $b <= $a - 1; $b++)
                printf("*");

            printf("\n");
        }

        // FOR THE BASE OF HEART ie.
        // THE INVERTED TRIANGLE
        for ($a = $size; $a >= 0; $a--) {

            // FOR SPACE BEFORE THE
            // INVERTED TRIANGLE : PART 5
            for ($b = $a; $b < $size; $b++)
                printf(" ");

            // FOR PRINTING THE BASE
            // OF TRIANGLE : PART 6
            for ($b = 1; $b <= (($a * 2) - 1); $b++)
                printf("*");

            printf("<br>");
        }
        print('</pre>');
    }
    printRectangle(5, 15);
    printTriangle(15);
    printCircle(10);
    printTrapzium(8, 15);
    printTrapzium(10, 1);
    printHeart(10)
    ?>

</body>

</html>