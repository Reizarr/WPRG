<?php
$passwords = ['kapi1' => 'bara1', 'kapi2' => 'bara2', 'kapi3' => 'bara3'];
$username = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

if ((!isset($username) || !isset($password)) || !isset($passwords[$username]) || $password !== $passwords[$username]) {
    header('WWW-Authenticate: Basic realm="zad1"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Unauthorized';
    exit;
} else {
    echo 'Jestes zalogowany jako: ' . $username . '<br>';
    $cookieName = $username . '_accesses';
    if(!isset($_COOKIE[$cookieName])){
        $pageAccess = 1;
    } else {
        $pageAccess = $_COOKIE[$cookieName];
    }

    if(isset($_POST['counter'])) {
        $pageAccess++;
        setcookie($cookieName, $pageAccess, time() + 3600);
    }
}
?>
<html>
<body><br>
<form action="#" method="POST">
    <input type="submit" name="counter" value="Dodaj kapibare"><br>
</form>
<form action="logout.php" method="POST">
    <input type="submit" name="logout" value="Logout"><br>
</form>
<?php
if (isset($pageAccess)) {
    echo "Liczba kapibar: " . $pageAccess;
}
?>
</body>
</html>
