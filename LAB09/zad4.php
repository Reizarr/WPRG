<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="zad4.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="GET">
        <label for="toptext"><h1>Zarządzanie Opiniami</h1></label>
        <input type="text" placeholder="Wpisz swoją opinię" name="opinion" id="bigtext"><br>
        <input type="submit" name="do" value="Dodaj opinię" id="bigsubmit">
        <div class="box">
            <h2>Opinie:</h2>
            <div id="output">
                <?php
                session_start();
                if (!isset($_SESSION['opinions'])) {
                    $_SESSION['opinions'] = [];
                }
                if (isset($_GET['do'])) {
                    $newOpinion = trim($_GET['opinion']);
                    if ($newOpinion) {
                        $timestamp = date("Y-m-d H:i:s");
                        $_SESSION['opinions'][] = $newOpinion . " - $timestamp";
                    }
                }
                if (isset($_GET['delete'])) {
                    $indexToDelete = $_GET['delete'];
                    if (isset($_SESSION['opinions'][$indexToDelete])) {
                        array_splice($_SESSION['opinions'], $indexToDelete, 1);
                    }
                }
                if (!empty($_SESSION['opinions'])) {
                    foreach ($_SESSION['opinions'] as $index => $opinion) {
                        echo '<p>' . htmlspecialchars($opinion) . ' <a href="?delete=' . $index . '"><div class ="deleteButton">Usuń</div></a></p>';
                    }
                } else {
                    echo '<p>Brak opinii</p>';
                }
                ?>
                <form action="#" method="GET">
                    <button type="submit" name="clear" value="1">Resetuj Wszystko</button>
                </form>
                <?php
                if (isset($_GET['clear'])) {
                    $_SESSION['opinions'] = [];
                    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
                    exit();
                }
                ?>
            </div>
        </div>
    </form>
</div>
</body>
</html>