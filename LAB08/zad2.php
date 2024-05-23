<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="zad2.css" type="text/css">
</head>
<body>
<div class="box">
    <form action="#" method="get">
        <h2>Zaawansowana analiza ciągów znaków</h2>
        <label for="wpisztekst">Wpisz tekst:</label><br>
        <input type="text" name="yourstring" id="biginput"><br><br>
        <label for="wybierzoperacje">Wybierz operacje:</label><br>
        <select name="operations" id="bigselect">
            <option value="extraction">Ekstracja slow i ich czestotliwosc wystepowania</option>
            <option value="sortasc">Sortowanie alfabetyczne slow w ciagu rosnaco</option>
            <option value="sorddesc">Sortowanie alfabetyczne slow w ciagu malejaco</option>
        </select><br><br>
        <input type="submit" id="bigsubmit" value="Analizuj">
    </form>
</div>
<div class="output">
    <?php
    if(!empty($_GET['yourstring'])){
        switch ($_GET['operations']) {
            case "extraction":
                $words = explode(' ', $_GET['yourstring']);
                $freq = array();
                foreach ($words as $word) {
                    if (isset($freq[$word])) {
                        $freq[$word]++;
                    }
                    else {
                        $freq[$word] = 1;
                    }
                }
                echo "Wynik: \n";
                echo "<table id='table'>";
                echo "<tr id='toptable'><th id='slowo'>Słowo</th><th id='wystepuje'>Występuje</th></tr>";
                foreach ($freq as $word => $frequency) {
                    echo "<tr><td>$word</td><td>$frequency</td></tr>";
                }
                echo "</table>";
                break;
            case "sortasc":
                $a = explode(' ', $_GET['yourstring']);
                sort($a, SORT_NATURAL);
                echo implode(" ", $a);
                break;
            case "sorddesc":
                $a = explode(' ', $_GET['yourstring']);
                rsort($a, SORT_NATURAL);
                echo implode(" ", $a);
                break;
        }
    }
    ?>
</div>
</body>
</html>