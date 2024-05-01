<html>
<h1>Results!</h1>
<form action="index.php" method="post">
    <input type="text" name="firstname"><br>
    <input type="text" name="surname"><br>
    <input type="submit" value="wyslij">
</form>
<?php
echo '<h2>' . $_POST["firstname"] . '</h2>';
echo $_POST['surname'];
?>
</html>