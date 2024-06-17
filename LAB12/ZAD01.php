<html>
<head>
    <meta charset="utf-8"/>
    <link href="ZAD01.css" rel="stylesheet" type="text/css">
    <title>Creating MySQL Table</title>
</head>
<body>
<div id="box">
    <h2>Manage MySQL Table</h2>
    <form action="#" method="GET">
    <input type="submit" value="Delete Table" name="dropTable" id="submitDrop"><br>
        <a href="ZAD01.php">Wróć</a>
    </form>
</div>
<?php
mysqli_report(MYSQLI_REPORT_OFF);

$dbhost = 'szuflandia.pjwstk.edu.pl';
$dbuser = 's30293';
$dbpass = 'Mak.Dabr';
$dbname = 's30293';
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($mysqli->connect_errno) {
    printf(
        "Connect failed: %s<br />", $mysqli->connect_error);
    exit();
}
printf('Connected successfully.<br />');
$sql = "CREATE TABLE Student( " .
    "StudentID INT PRIMARY KEY, " .
    "Firstname VARCHAR(255)NOT NULL, " .
    "Secondname VARCHAR(255) NOT NULL, " .
    "Salary INT NOT NULL, " .
    "DateOfBirth DATE) ";
if ($mysqli->query($sql)) {
    printf("Table Student created successfully.<br />");
}
//if
//($mysqli->errno) {
//    if ($mysqli->query("DROP TABLE Student")) {
//        printf("Table Student dropped succesfully");
//    } else {
//        printf("Could not create table: %s<br />", $mysqli->error);
//    }
//}
if (isset($_GET['dropTable'])) {
    if ($mysqli->query("DROP TABLE Student")) {
        printf("Brawo, wywaliles cala Tabele, jupi!");
    } else {
        printf("Cos nie pyklo ;/ %s<br />", $mysqli->error);
    }
}
$mysqli->close();
?>
</body>
</html>