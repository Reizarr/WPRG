<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="zad7.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main">
    <form action="#" method="get">
        <input type="text" name="fullname" placeholder="Twoje imie i nazwisko" id="longinput"><br>
        <input type="text" name="email" placeholder="Twoj email" id="longinput"><br>
        <input type="text" name="phone" placeholder="Twoj telefon" id="longinput"><br>
        <select name="topics" id="longselect">
            <option value="Wybierz">Wybierz temat</option>
            <option value="Temat1">Temat 1</option>
            <option value="Temat2">Temat 2</option>
        </select><br>
        <input type="text" name="content" placeholder="Tresc wiadomosci" id="longinput"><br>
        <input type="submit" id="submit" value="OBLICZ" id="submit"><br>
        <input type="checkbox" name="sol" checked /><label for="sol">sol</label>
        <input type="checkbox" name="pieprz"/><label for="pieprz">pieprz</label><br>
        <input type="radio" name="bolonese"/><label for="bolonese">bolonese</label>
        <input type="radio" name="carbonara"/><label for="carbonara">carbonara</label>
    </form>
</div>
<div class="output">
    <?php
    if(!empty($_GET['fullname']) && !empty($_GET['email']) && !empty($_GET['phone']) && !empty($_GET['topics']) && !empty($_GET['content'])) {
        $fullname = $_GET['fullname'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];
        $content = $_GET['content'];
        $selectedOptions = [];
        if (isset($_GET['sol'])) {
            $selectedOptions[] = "Sól";
        }
        if (isset($_GET['pieprz'])) {
            $selectedOptions[] = "Pieprz";
        }
        if (isset($_GET['bolonese'])) {
            $selectedOptions[] = "Sos boloński";
        } else if (isset($_GET['carbonara'])) {
            $selectedOptions[] = "Sos carbonara";
        }
        echo "<ul>";
        echo "<li>Imię i nazwisko: $fullname</li>";
        echo "<li>Email: $email</li>";
        echo "<li>Telefon: $phone</li>";
        echo "<li>Temat: ".$_GET['topics']."</li>";
        echo "<li>Treść wiadomości: $content</li>";
        if (!empty($selectedOptions)) {
            echo "<li>Wybrane opcje:";
            echo "<ul>";
            foreach ($selectedOptions as $option) {
                echo "<li>$option</li>";
            }
            echo "</ul>";
            echo "</li>";
        }
        echo "</ul>";
    }
    ?>
</div>
</body>
</html>