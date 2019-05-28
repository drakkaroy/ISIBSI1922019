<?php

    $op = $_POST["op"];
    $val1 = $_POST["value1"];
    $val2 = $_POST["value2"];

    $result = 0;

    switch($op) {
        case "suma":
            $result = $val1 + $val2;
            break;
        case "resta":
            $result = $val1 - $val2;
            break;
        case "multiplicacion":
            $result = $val1 * $val2;
            break;
        case "division":
            $result = $val1 / $val2;
            break;
        default:
            $result = "hello";
    }

    echo $result;


?>