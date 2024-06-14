<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="zad5.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container">
    <div class="box">
        <h1>Car Inventory</h1>
        <?php
        include_once('zad5Car.php');
        include_once('zad5NewCar.php');
        include_once('zad5InsuranceCar.php');
        session_start();

        if (!isset($_SESSION['cars'])) {
            $_SESSION['cars'] = array();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $carType = isset($_POST['carType']) ? $_POST['carType'] : '';
            $model = isset($_POST['model']) ? $_POST['model'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : 0;
            $exchangeRate = isset($_POST['exchangeRate']) ? $_POST['exchangeRate'] : 0;
            $alarm = isset($_POST['alarm']);
            $radio = isset($_POST['radio']);
            $climatronic = isset($_POST['climatronic']);
            $firstOwner = isset($_POST['firstOwner']);
            $years = isset($_POST['years']) ? $_POST['years'] : 0;

            $car = null;

            if ($carType == 'Car') {
                $car = new Car($model, $price, $exchangeRate);
            } elseif ($carType == 'NewCar') {
                $car = new NewCar($model, $price, $exchangeRate, $alarm, $radio, $climatronic);
            } elseif ($carType == 'InsuranceCar') {
                $car = new InsuranceCar($model, $price, $exchangeRate, $alarm, $radio, $climatronic, $firstOwner, $years);
            }

            if ($car !== null) {
                $_SESSION['cars'][] = $car;
            }
        }

        function displayCarList($cars) {
            if (empty($cars)) {
                echo '<p>No cars to display.</p>';
                return;
            }

            echo '<table>';
            echo '<thead><tr><th>Model</th><th>Details</th><th>Actions</th></tr></thead>';
            echo '<tbody>';
            foreach ($cars as $index => $car) {
                if ($car !== null) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($car->getModel()) . '</td>';
                    echo '<td>' . htmlspecialchars($car) . '</td>';
                    echo '<td>';
                    echo '<a href="zad5calculate.php?index=' . $index . '">Calculate Price</a> | ';
                    echo '<a href="zad5details.php?index=' . $index . '">Details</a> | ';
                    echo '<a href="zad5edit.php?index=' . $index . '">Edit</a> | ';
                    echo '<a href="zad5delete.php?index=' . $index . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</tbody>';
            echo '</table>';
        }
        ?>

        Total cars: <?php echo count($_SESSION['cars']); ?>
        <form method="post" action="">
            <label for="carType">Select car type:</label><br>
            <select name="carType" id="bigselect">
                <option value="">Select...</option>
                <option value="Car">Car</option>
                <option value="NewCar">NewCar</option>
                <option value="InsuranceCar">InsuranceCar</option>
            </select><br>
            <p>Side note: Jak się chce zmienić car type to trzeba zatwierdzić Add Car i potem się pojawią opcje. Niestety tworzy to dodatkową instację auta ale już mnie głowa boli od zadania to tak zostawię</p>
            <div id="carForm">
                <h3>Add Car</h3>
                <label for="model">Model:</label><br>
                <input type="text" name="model" id="biginput"><br>
                <label for="price">Price (EURO):</label><br>
                <input type="number" name="price" id="biginput"><br>
                <label for="exchangeRate">Exchange Rate (PLN):</label><br>
                <input type="number" step="0.01" name="exchangeRate" id="biginput"><br>

                <?php if (isset($_POST['carType']) && $_POST['carType'] == 'NewCar'): ?>
                    <div id="newCarFields">
                        <label for="alarm">Alarm:</label>
                        <input type="checkbox" name="alarm" id="alarm"><br>
                        <label for="radio">Radio:</label>
                        <input type="checkbox" name="radio" id="radio"><br>
                        <label for="climatronic">Climatronic:</label>
                        <input type="checkbox" name="climatronic" id="climatronic"><br>
                    </div>
                <?php elseif (isset($_POST['carType']) && $_POST['carType'] == 'InsuranceCar'): ?>
                    <div id="insuranceCarFields">
                        <label for="alarm">Alarm:</label><br>
                        <input type="checkbox" name="alarm" id="margcheckbox"><br>
                        <label for="radio">Radio:</label><br>
                        <input type="checkbox" name="radio" id="margcheckbox"><br>
                        <label for="climatronic">Climatronic:</label><br>
                        <input type="checkbox" name="climatronic" id="margcheckbox"><br>
                        <label for="firstOwner">First Owner:</label><br>
                        <input type="checkbox" name="firstOwner" id="margcheckbox"><br>
                        <label for="years">Years:</label><br>
                        <input type="number" name="years" id="biginput"><br>
                    </div>
                <?php endif; ?>

                <input type="submit" value="Add Car" id="bigsubmit">
            </div>
        </form>

        <div class="car-list">
            <h2>Car List</h2>
            <?php
            if (!empty($_SESSION['cars'])) {
                displayCarList($_SESSION['cars']);
            } else {
                echo '<p>No cars added yet.</p>';
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>