<html>
<body>
<form action="zad3.2.php" method="POST">
    <h1>Preferencje wyswietlania strony: </h1>
    <label for="bgcolor">Kolor tla:</label>
    <select name="bgcolor" id="bgcolor">
        <option value="white">white</option>
        <option value="lightblue">lightblue</option>
        <option value="lightgreen">lightgreen</option>
        <option value="lightyellow">lightyellow</option>
    </select><br><br>

    <label for="textcolor">Kolor tekstu:</label>
    <select name="textcolor" id="textcolor">
        <option value="black">black</option>
        <option value="blue">blue</option>
        <option value="green">green</option>
        <option value="red">red</option>
    </select><br><br>
    <input type="submit" value="Zapisz ustawienia">
</form>
</body>
</html>