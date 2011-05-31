<?php

function valid_factoradic($f)
{
    $valid = strrev(implode('', range(0,9)));
    $max = substr($valid, -strlen($f));

    while (($m = substr($max, -1)) != "") {
        $max = substr($max, 0, -1);
        $d = substr($f, -1);
        $f = substr($f, 0, -1);

        if ($m < $d) {
            return false;
        }
    }

    return ($f <= $max);
}

function fac2ten($x)
{
    $n = 0;
    $f = 1;

    $d = substr($x, -1);
    $x = substr($x, 0, -1);
    while (($d = substr($x, -1)) != "") {
        $x = substr($x, 0, -1);
        $n += $d * $f;
        $f *= $f + 1;
    }

    return $n;
}

function ten2fac_r($n, $f)
{
    if ($n < $f) {
        return array("", $n);
    }

    list($s, $n) = ten2fac_r($n, $f * ($f + 1));

    $d = (int) ($n / $f);
    $n %= $f;
    $s .= $d;

    return array($s, $n);
}

function ten2fac($n)
{
    list($f, $n) = ten2fac_r($n, 1);

    return $f . "0";
}
