<html>
    <head>
        <title>SPOQ</title>
        <link rel="stylesheet" type="text/css" href="src/styles/styles.css">
    </head>
    <body>
        <table width="100%" border="1" cellspacing="0" frame="above">
            <th colspan="100%"><h1>Erik Romaikin P32091-1414</h1></th>
            <tr>
                <td width="50%" id="choice">
                    <form method="post" onsubmit="return isvalid()" name="form" action="src/php/result.php">
                    <h4>X-coordinate</h4>
                        <?php 
                            for ($i = -3; $i <= 5; $i++):
                        ?>
                        <input type="radio" name="Xchange" value=<?php echo $i ?> required>
                        <label><?php echo $i ?></label>
                        <?php endfor; ?>
                    <h4>Y-coordinate</h4>
                        <input type="text" id="y_coord" name="Ycoord" placeholder="value (-5...3)">
                    <h4>R-value</h4>
                        <?php 
                            for ($i = 1; $i <= 3; $i += 0.5):
                        ?>
                        <input type="radio" name="Rchange" value=<?php echo $i ?> required>
                        <label><?php echo $i ?></label>
                        <?php endfor; ?>
                        <br>
                        <button type="submit" class="submitbtn hvr-grow">SUBMIT</button>
                    </form>
                </td>
                <td width="50%" class="table-alignment">
                    <img src="src/img/graph.jpeg" alt="Here might be your image" id="graph">
                </td>
            </tr>
        </table>
        <script src="src/js/validation.js"></script>
    </body>
</html>