<html>
<body>
<img src="kapibara.png" width="400px" height="250px">
<?php if (KapibaraJeMarchewke()): ?>
<img src="carrot.jpg" width="300px" height="200px">
<?php endif; ?>
<?php
function KapibaraJeMarchewke()
{
    $eaten = false;
    $random = rand(1, 10);
    if ($random <= 6) {
        $eaten = true;
    }

    return $eaten;
}
?>
</body>
</html>