<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="zad1.css" type="text/css">
</head>
<body>
<div class="box">
    <form action="#" method="get">
    <label for="wpisztekst">Wpisz tekst:</label><br>
    <input type="text" name="yourstring" id="biginput"><br><br>
    <label for="wybierzoperacje">Wybierz operacje:</label><br>
    <select name="operations" id="bigselect">
        <option value="reverse">Odwroc string</option>
        <option value="toupper">Zamien litery na wielkie</option>
        <option value="tolower">Zamien litery na male</option>
        <option value="countletters">Policz ilosc znakow</option>
        <option value="trimsymbols">Usun biale znaki z poczatku i konca</option>
    </select><br><br>
        <input type="submit" id="bigsubmit" value="Wykonaj">
    </form>
</div>
<div class="output">
    <?php
    $a = "kapibara";
    if(!empty($_GET['yourstring'])){
        switch ($_GET['operations']) {
            case "reverse":
                $a = strrev($_GET['yourstring']);
                break;
            case "toupper":
                $a = strtoupper($_GET['yourstring']);
                break;
            case "tolower":
                $a = strtolower($_GET['yourstring']);
                break;
            case "countletters":
                $a = strlen($_GET['yourstring']);
                break;
            case "trimsymbols":
                $a = trim($_GET['yourstring']);
                break;
        }
    }

    echo "Wynik: " . $a;
    ?>
</div>
</body>
</html>