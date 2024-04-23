<!DOCTYPE html>
<html lang>
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php
$even = range(2, 20, 2);

echo '<ul>';

foreach ($even as $number) {
    echo '<li>' . $number . '</li>';
}

echo '</ul>';
?>

</body>
</html>
