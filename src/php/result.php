<?php session_start() ?>
<html>
<head>
    <title>SPOQ</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

    <?php

    require_once "hit_result.php";
    require_once "validator.php";

    date_default_timezone_set('Europe/Moscow');

    $start = microtime(true);
    $current_time = date("H:i:s");

    $x = NULL;
    $y = NULL;
    $r = NULL;
    $script_time = NULL;
    $result = NULL;

    if (isset($_POST["Xchange"]) && isset($_POST["Ycoord"]) && isset($_POST["Rchange"])) {

        $x = floatval($_POST["Xchange"]);
        $y = floatval($_POST["Ycoord"]);
        $r = floatval($_POST["Rchange"]);

        $allowedValuesOfX = ['-3', '-2', '-1', '0', '1', '2', '3', '4', '5'];
        $allowedValuesOfR = ['1', '1.5', '2', '2.5', '3'];

        $result = "";

        if (in_array(strval($r), $allowedValuesOfR) && in_array(strval($x), $allowedValuesOfX) &&
                is_float($y) && isValid($x, $y, $r)) {
            if (isHit($x, $y, $r)) {
                $result = "HIT!";
            }
            else {
                $result = "MISS!";
            }
        }
        else {
            $result = "incorrect input";
        }

        $script_time = number_format(microtime(true) - $start, 8, ".", "");
        if (!isset($_SESSION["result"])) {
            $_SESSION["result"] = array();
        }
        else {
            array_push($_SESSION["result"], array($x, $y, $r, $result, $script_time));
        }
    }
    ?>
    <table border="1" border-color="black" class="result_table">
        <tr>
            <th>No.</th>
            <th>X</th>
            <th>Y</th>
            <th>R</th>
            <th>result</th>
            <th>working-time</th>
        </tr>
        <?php for ($i = 0; $i < count($_SESSION["result"]); $i++): ?>
            <tr>
                <td id="number"><?php echo $i + 1 ?></td>
                <td><?php echo $_SESSION["result"][$i][0] ?></td>
                <td><?php echo $_SESSION["result"][$i][1] ?></td>
                <td><?php echo $_SESSION["result"][$i][2] ?></td>
                <td><?php echo $_SESSION["result"][$i][3] ?></td>
                <td><?php echo $_SESSION["result"][$i][4] ?> microseconds</td>
            </tr>
        <?php endfor; ?>
    </table>
    <button type="button" onclick="window.location.href='../../index.php'" class="submitbtn resbtn1 hvr-grow">Back</button>
    <form method="post">
        <button type="submit" name="clr" class="submitbtn hvr-grow">Clear History</button>
        <audio id="audio" type="audio/mp3" src="../snd/mission_complete.mp3" loop="loop"></audio>
        <button type="button" onclick="playPause()" id="playpausebtn" class="submitbtn hvr-grow music">&#9658</button>
    </form>

    <?php 
    if (isset($_POST["clr"])) {
        $_SESSION["result"] = array();
    }
    ?>
    <script src="../js/music.js">
    </script>
</html>