<?php

const Y_MIN = -5, Y_MAX = 3;
const X_MIN = -3, X_MAX = 5;
const R_MIN = 1, R_MAX = 3;

function isValid($x, $y, $r) {
    if (!is_float($x) || !is_float($y) || !is_float($r)) {
        return false;
    }

    if ($y < Y_MIN || $y > Y_MAX) {
        return false;
    }

    if ($x < X_MIN || $x > X_MAX) {
        return false;
    }

    if ($r < R_MIN || $y > R_MAX) {
        return false;
    }

    return true;
}