<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit-Converter</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $number = $_GET["convert-number"];
    $FirstUnit = $_GET["Unit"];
    if (is_numeric($number)) {
        $result = teranslate($FirstUnit, $number);
        echo $result;
    } else {
        $result = 'NaN';
        echo $result;
    }
}
function teranslate($FirstUnit, $number)
{
    switch ($FirstUnit) {
        case 'G':
            return $number / 1000;
            break;
        case 'C':
            // (°C × 1.8) + 32
            return ($number * 1.8) + 32;
            break;
        case 'F':
            // °C = (68 - 32) × 5/9
            return ($number - 32) * (5 / 9);;
            break;
        case 'KG':
            return $number * 1000;
            break;
        default:
            return 'undenfied value';
            break;
    }
}
?>

<body>
    <main class="container">
        <form class="form" action="index.php" method="get">
            <label for="convertion-number">Convertion Number:</label>
            <input type="text" id="convertion-number" name="convert-number"><br>
            <label for="Unit-Select">Select the first Unit:</label>
            <select id="Unit-Select" name="Unit">
                <option value="G">gram</option>
                <option value="F">farenheit</option>
                <option value="C" selected>celcius</option>
                <option value="KG">kg</option>
            </select>
            <br>
            <!-- <label for="Unit-Select2">Select the secend Unit:</label>
            <select id="Unit-Select2" name="Unit2">
                <option value="G">gram</option>
                <option value="F">farenheit</option>
                <option value="C" selected>celcius</option>
                <option value="KG">kg</option>
            </select> -->
            <br>
            <button type="submit">Convert</button>
        </form>
    </main>
    <script src="js/main.js"></script>
</body>

</html>