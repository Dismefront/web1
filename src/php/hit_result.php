<?php

function isHit($x, $y, $r)
{
    return isRectangle($x, $y, $r) || isTriangle($x, $y, $r) || isSector($x, $y, $r);
}

function isTriangle($x, $y, $r)
{
    return ($y <= $x / 2 + $r / 2) && ($x <= 0) && ($y >= 0);
}

function isRectangle($x, $y, $r)
{
    return ($x >= 0) && ($x <= $r) && ($y <= 0) && ($y >= -$r / 2);
}

function isSector($x, $y, $r)
{
    return ($x >= 0) && ($y <= 0) && ($x * $x + $y * $y <= $r*$r);
}