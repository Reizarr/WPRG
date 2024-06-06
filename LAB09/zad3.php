<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="zad3.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="GET">
        <label for="toptext"><h1>Oblicz wiek i dni robocze</h1></label>
        <div class="box">
            <label for="toptext"><h2>Oblicz wiek i czas lokalny</h2></label>
            <input type="text" placeholder="Data urodzenia (d-m-Y)" name="dateOfBirthday" id="biginput">
            <select name="timeZone" id="bigselect">
                <option value="Europe/Warsaw">Europe/Warsaw</option>
                <option value="America/NewYork">America/NewYork</option>
                <option value="Asia/Tokyo">Asia/Tokyo</option>
            </select>
            <input type="submit" name="do" value="oblicz wiek i czas" id="bigsubmit">
        </div>
        <div class="box">
            <label for="toptext"><h2>Oblicz dni robocze</h2></label>
            <input type="text" placeholder="Data poczatkowa (d-m-Y)" name="dateOfStart" id="biginput">
            <input type="text" placeholder="Data koncowa (d-m-Y)" name="dateOfEnd" id="biginput">
            <input type="submit" name="do" value="oblicz dni robocze" id="bigsubmit">
        </div>
    </form>
</div>
<div id="output">
    <?php
    if(!empty($_GET['dateOfBirthday']) && isset($_GET['do'])){
        $dob = new DateTime($_GET['dateOfBirthday']);
        $today   = new DateTime('today');
        $year = $dob->diff($today)->y;
        $month = $dob->diff($today)->m;
        $day = $dob->diff($today)->d;
        echo "<p>Twoj wiek: "." ".$year." year"." ",$month." months"." ".$day." days</p>";
    }
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $selectedTimeZone = $_GET['timeZone'];
        if (in_array($selectedTimeZone, timezone_identifiers_list())) {
            date_default_timezone_set($selectedTimeZone);
            $currentDateTime = new DateTime("now", new DateTimeZone($selectedTimeZone));
            echo "Aktualny czas w " . htmlspecialchars($selectedTimeZone) . ": " . $currentDateTime->format("Y-m-d H:i:s") . "\n";
        } else{
            echo "Nieprawdilowa strefa czasowa!\n";
        }
    }
    if(!empty($_GET['dateOfStart']) && !empty($_GET['dateOfEnd'])){
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $dateOfStart = $_GET['dateOfStart'];
            $dateOfEnd = $_GET['dateOfEnd'];
            $startDate = DateTime::createFromFormat('d-m-Y', $dateOfStart);
            $endDate = DateTime::createFromFormat('d-m-Y', $dateOfEnd);
            if ($startDate && $endDate) {
                if ($startDate > $endDate) {
                    echo "Data poczatkowa musi byc wczessniejsza niz data koncowa duh";
                } else {
                    $interval = $startDate->diff($endDate);
                    $totalDays = $interval->days;
                    $workdays = 0;

                    for ($i = 0; $i <= $totalDays; $i++) {
                        $currentDay = (clone $startDate)->modify("+$i days");
                        $dayOfWeek = $currentDay->format('N');
                        if ($dayOfWeek < 6) {
                            $workdays++;
                        }
                    }

                    echo "<p>Laczna liczba dni roboczych: $workdays</p>";
                }
            } else {
                echo "Nieprawidłowy format dat. Użyj formatu d-m-Y.";
            }
        }
    }
    ?>
</div>
</body>
</html>