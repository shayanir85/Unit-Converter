<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit-Converter</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<?php
function convertion()
{
    if (isset($_GET["convert-number"]) && isset($_GET["Unit"]) && isset($_GET["Unit2"])) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $number = $_GET["convert-number"];
            $FirstUnit = $_GET["Unit"];
            $SecendUnit = $_GET["Unit2"];
            if (is_numeric($number)) {
                $result = teranslate($FirstUnit, $SecendUnit, $number);
                return $result;
            } else {
                $result = 'NaN';
                return $result;
            }
        }
    } else {
        return 0;
    }
}
function teranslate($FirstUnit, $SecendUnit, $number)
{
    if ($FirstUnit == $SecendUnit) {
        return 'invalid convertion';
    } elseif ($FirstUnit == 'G') {
        if ($SecendUnit == 'KG') {
            return KG($number);
        }
    } elseif ($FirstUnit == 'KG') {
        if ($SecendUnit == 'G') {
            return G($number);
        }
    } elseif ($FirstUnit == 'C') {
        if ($SecendUnit == 'F') {
            return F($number);
        }
    } elseif ($FirstUnit == 'F') {
        if ($SecendUnit == 'C') {
            return C($number);
        }
    }else{
        return 0;
    }
}
function KG($number)
{
    return $number / 1000;
}
function G($number)
{
    return $number * 1000;
}
function C($number)
{
    return ($number - 32) * 5 / 9;
}
function F($number)
{
    return ($number * 9 / 5) + 32;
}
?>

<body>
    <main class="container">
        <form class="form" action="index.php" method="GET">
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
            <label for="Unit-Select2">Select the secend Unit:</label>
            <select id="Unit-Select2" name="Unit2">
                <option value="G">gram</option>
                <option value="F">farenheit</option>
                <option value="C" selected>celcius</option>
                <option value="KG">kg</option>
            </select>
            <br>
            <button type="submit">Convert</button>
        </form>
        <br>
        <div>
            <?php (convertion() == 0) ? 'invalid convertion' : print "<span> answer =>\n" . convertion() . " </span>"; ?>
        </div>
    </main>
    <script src="js/main.js"></script>
</body>

</html>