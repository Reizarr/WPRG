<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link href="zad11.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>
    <table>
        <tr>
            <th>Celsius</th>
            <th>Fahrenheit</th>
            <th>|</th>
            <th>Fahrenheit</th>
            <th>Celsius</th>
        </tr>
        <?php
        for($i = 0; $i <= 40; $i++){
            echo "<tr>";
            for($j = 40; $j >= 0; $j--){
                echo "<td>" . $j . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

<?php
//    for($i = 40; $i >= 0; $i--){
//        echo "<td>" . $i * 9/5 + 32 . "</td>";
//    }
//    ?>
<?php
//    $i = 120;
//    while ($i >= 0) {
//        echo "<td>" . $i . "</td>";
//        $i -= 10;
//    }
//    ?>
<?php
//    $i = 120;
//    while ($i >= 0) {
//        echo "<td>" . (($i-32)*5)/9 . "</td>>";
//        $i -= 10;
//    }
//    ?>
</div>
</body>
</html>
