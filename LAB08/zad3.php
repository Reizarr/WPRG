<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="zad3.css" type="text/css">
</head>
<body>
<div class="box">
    <form action="#" method="post">
        <h1>Analyser and Transformer of Text with Regex in PHP</h1>
        <label for="enterText">Enter text:</label><br>
        <input type="text" name="yourString" id="biginput" required><br><br>
        <label for="enterRegex">Enter Regex Pattern:</label><br>
        <input type="text" name="yourRegex" id="biginput" required><br><br>
        <label for="chooseOperation">Choose Operation:</label><br>
        <select name="operations" id="bigselect" required>
            <option value="match">Find Matches</option>
            <option value="matchPositions">Find Matches with Positions</option>
            <option value="replace">Replace</option>
            <option value="validate">Validate</option>
        </select><br><br>
        <?php
        if (isset($_POST['operations']) && $_POST['operations'] == 'replace') {
            echo '<label for="replacedText">Replacement text:</label><br>';
            echo '<input type="text" name="replacedText" id="biginput" required><br><br>';
        }
        ?>
        <input type="submit" id="bigsubmit" value="Execute">
    </form>
    <div class="output">
        <b>Result:</b><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = $_POST["yourString"];
            $pattern = $_POST["yourRegex"];
            $operation = $_POST["operations"];

            switch ($operation) {
                case "match":
                    preg_match_all($pattern, $text, $matches);
                    if (!empty($matches[0])) {
                        echo "Matches found: " . implode(", ", $matches[0]);
                    } else {
                        echo "No matches found.";
                    }
                    break;
                case "matchPositions":
                    preg_match_all($pattern, $text, $matches, PREG_OFFSET_CAPTURE);
                    if (!empty($matches[0])) {
                        foreach ($matches[0] as $match) {
                            echo "Match found at position " . $match[1] . ": " . $match[0] . "<br>";
                        }
                    } else {
                        echo "No matches found.";
                    }
                    break;
                case "replace":
                    $replacement = $_POST["replacedText"];
                    $result = preg_replace($pattern, $replacement, $text);
                    echo "Resulting text: " . htmlspecialchars($result);
                    break;
                case "validate":
                    if (preg_match($pattern, $text)) {
                        echo "The text matches the pattern.";
                    } else {
                        echo "The text does not match the pattern.";
                    }
                    break;
            }
        }
        ?>
    </div>
</div>
</body>
</html>