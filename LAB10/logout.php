<?php
header('HTTP/1.0 401 Unauthorized');
echo 'Logged out. Please <a href="zad1.php">login again</a>.';
exit;
?>