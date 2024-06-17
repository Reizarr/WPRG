<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="ZAD02.css" rel="stylesheet" type="text/css">
    <title>Manage MySQL Database</title>
</head>
<body>
<div id="box">
    <h2>Manage MySQL Database</h2>
    <label for="AddPerson"><h2>Add Person</h2></label>
    <form action="ZAD02.php" method="POST">
        <input type="text" name="firstName" id="bigInput" placeholder="First Name" required><br>
        <input type="text" name="lastName" id="bigInput" placeholder="Last Name" required><br>
        <input type="email" name="email" id="bigInput" placeholder="Email" required><br>
        <input type="submit" value="Add Person" name="addPerson" id="submitDrop"><br>
    </form>
    Mam dość tych labów 12, nie mogę się połaczyć z bazami danych mimo że się męczę 7 godzin z tym. Nie wiem czy te zadanie jakkolwiek działa więc zostawiam to w takiej formie i ide po lab 13 ostatni.
    <label for="AddCar"><h2>Add Car</h2></label>
    <form action="ZAD02.php" method="POST">
        <input type="text" name="model" id="bigInput" placeholder="Model" required><br>
        <input type="number" name="year" id="bigInput" placeholder="Year" required><br>
        <select name="choosePerson" required>
            <option value="">Select Person</option>
            <?php
            $mysqli = new mysqli('localhost', 'Reizarr', 'QuteRex21*');
            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }
            selectPerson($mysqli);
            ?>
            TEN TEKST SIE JUZ NIE POKAZUJE
        </select><br>
        <input type="submit" value="Add Car" name="addCar" id="submitDrop"><br>
    </form>

    <h2>Persons</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php displayPersons($mysqli); ?>
    </table>

    <h2>Cars</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Year</th>
            <th>Person ID</th>
            <th>Action</th>
        </tr>
        <?php displayCars($mysqli); ?>
    </table>

    <form action="ZAD02.php" method="POST">
        <input type="submit" value="DELETE TABLES" name="dropTable" id="submitDrop"><br>
    </form>
</div>
<?php
function selectPerson($mysqli)
{
    $result = $mysqli->query("SELECT Person_id, Person_firstname, Person_lastname FROM Persons");
    if (!$result) {
        printf("Nie mozna wskazywac palcem na ludzi: %s\n", $mysqli->error);
        return;
    }
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['Person_id'].'">'.$row['Person_firstname'].' '.$row['Person_lastname'].'</option>';
    }
}

function displayPersons($mysqli)
{
    $result = $mysqli->query("SELECT * FROM Persons");
    if (!$result) {
        printf("nie ustawia sie do szeregu, nie dziala: %s\n", $mysqli->error);
        return;
    }
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['Person_id']."</td>";
        echo "<td>".$row['Person_firstname']."</td>";
        echo "<td>".$row['Person_lastname']."</td>";
        echo "<td>".$row['Person_email']."</td>";
        echo '<td><form method="POST" action="ZAD02.php"><input type="hidden" name="personId" value="'.$row['Person_id'].'"><input type="submit" name="deletePerson" value="Delete"><input type="submit" name="editPerson" value="Edit"></form></td>';
        echo "</tr>";
    }
}

function displayCars($mysqli)
{
    $result = $mysqli->query("SELECT * FROM Cars");
    if (!$result) {
        printf("Bledzik kolejny auta cos tam: %s\n", $mysqli->error);
        return;
    }
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['Cars_id']."</td>";
        echo "<td>".$row['Cars_model']."</td>";
        echo "<td>".$row['Cars_year']."</td>";
        echo "<td>".$row['Person_id']."</td>";
        echo '<td><form method="POST" action="ZAD02.php"><input type="hidden" name="carId" value="'.$row['Cars_id'].'"><input type="submit" name="deleteCar" value="Delete"><input type="submit" name="editCar" value="Edit"></form></td>';
        echo "</tr>";
    }
}

mysqli_report(MYSQLI_REPORT_OFF);

$mysqli = new mysqli('szuflandia.pjwstk.edu.pl', 's30293', 'Mak.Dabr', 's30293');
if ($mysqli->connect_errno) {
    printf("nie ma neta: %s\n", $mysqli->connect_error);
    exit();
}

$sql1 = "CREATE TABLE IF NOT EXISTS Persons (
    Person_id INT AUTO_INCREMENT,
    Person_firstname VARCHAR(255) NOT NULL,
    Person_lastname VARCHAR(255) NOT NULL,
    Person_email VARCHAR(255) NOT NULL,
    PRIMARY KEY (Person_id))";
if (!$mysqli->query($sql1)) {
    printf("nie mozna stworzyc ludzi, ups: %s\n", $mysqli->error);
}

$sql2 = "CREATE TABLE IF NOT EXISTS Cars (
    Cars_id INT AUTO_INCREMENT,
    Cars_model VARCHAR(255) NOT NULL,
    Cars_year INT NOT NULL,
    Person_id INT NOT NULL,
    PRIMARY KEY (Cars_id),
    FOREIGN KEY (Person_id) REFERENCES Persons (Person_id))";
if (!$mysqli->query($sql2)) {
    printf("Aut tez nie mozna, ajc: %s\n", $mysqli->error);
}

if (isset($_POST['dropTable'])) {
    if (!$mysqli->query("DROP TABLE IF EXISTS Cars, Persons")) {
        printf("nie mozna dropic: %s\n", $mysqli->error);
    } else {
        printf("jednak mozna dropic!");
    }
}

if (isset($_POST['addPerson'])) {
    $person_firstname = $_POST['firstName'];
    $person_lastname = $_POST['lastName'];
    $person_email = $_POST['email'];
    if (!$mysqli->query("INSERT INTO Persons (Person_firstname, Person_lastname, Person_email) VALUES ('$person_firstname', '$person_lastname', '$person_email')")) {
        printf("ludz niedodany: %s\n", $mysqli->error);
    }
}

if (isset($_POST['addCar'])) {
    $car_model = $_POST['model'];
    $car_year = $_POST['year'];
    $person_id = $_POST['choosePerson'];
    if (!$mysqli->query("INSERT INTO Cars (Cars_model, Cars_year, Person_id) VALUES ('$car_model', '$car_year', '$person_id')")) {
        printf("samohut niekupiony: %s\n", $mysqli->error);
    }
}

if (isset($_POST['deletePerson'])) {
    $person_id = $_POST['personId'];
    if (!$mysqli->query("DELETE FROM Persons WHERE Person_id = $person_id")) {
        printf("zamow hitmana jak chcesz usuwac ludzi: %s\n", $mysqli->error);
    }
}

if (isset($_POST['deleteCar'])) {
    $car_id = $_POST['carId'];
    if (!$mysqli->query("DELETE FROM Cars WHERE Cars_id = $car_id")) {
        printf("bulldozered car: %s\n", $mysqli->error);
    }
}

$mysqli->close();
?>
</body>
</html>
