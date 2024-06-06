<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="zad1.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="POST">
        <label for="toptext"><h1>Wprowadz nazwe pliku lub katalogu</h1></label>
        <div class="box">
            <input type="text" name="givenFile" placeholder="Podaj nazwe pliku" id="biginput">
            <input type="submit" value="Wyslij" id="bigsubmit">
        </div>
    </form>
</div>
<div class="output">
<label for="output"><h2>Wyniki:</h2></label>
    <?php
        if(!empty($_POST['givenFile'])){
            if (!(file_exists($_POST['givenFile']))) {
                exit("Nie ma takiego pliku lub katalogu");
            }
            else {
                $size = filesize($_POST['givenFile']);
                $byteType = array("bajtow", "kilobajtow", "megabajtow", "gigabajtow");

                foreach ($byteType as $type) {
                    echo "Rozmiar: " . $size . " " . $type . "<br>";
                    $size = $size / 1024;
                }
            }
        }
    ?>
</div>
</body>
</html>