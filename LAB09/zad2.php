<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link href="zad2.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="POST">
        <label for="toptext"><h1>Licznik odwiedzin witryny</h1></label>
        <div class="box">
            <Label for="licznik">
                   <?php
                   $filename = "licznik.txt";
                   if(file_exists($filename)){
                       $fp = fopen($filename, 'r+');
                       if ($fp) {
                           $count = fread($fp, filesize($filename));
                           ++$count;
                           fseek($fp, 0);
                           fwrite($fp, $count);
                           fclose($fp);
                           echo "Odwiedzin: " . $count;
                       }
                       else {
                           echo "Nie udalo sie odczytac pliku";
                       }
                   }
                   else {
                       $fp = fopen($filename, 'w');
                       if ($fp) {
                           fwrite($fp, "1");
                           fclose($fp);
                           echo "Odwiedzin: 1";
                       }
                       else {
                           echo "Blad tworzenia pliku";
                       }
                   }

                   ?>
            </Label>
        </div>
        <input type="submit" class="button" name="reset" value="Resetuj licznik" id="bigsubmit">
        <?php
        if(isset($_POST['reset'])){
            $fp = fopen($filename, 'w');
            if ($fp) {
                fwrite($fp, "0");
                fclose($fp);
                header("location:zad2.php");
            }
        }
        ?>
    </form>
</div>

</body>
</html>