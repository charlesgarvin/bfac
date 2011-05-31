<?php

require __DIR__ . '/bfac.php';

$expected = array(0, 10, 100, 110, 200, 210, 1000, 1010, 1100, 1110, 1200, 
    1210, 2000, 2010, 2100, 2110, 2200, 2210, 3000, 3010, 3100, 3110, 3200, 
    3210);

echo 'ten2fac', PHP_EOL;
foreach ($expected as $ten => $fac) {
    $given = ten2fac($ten);

    if ($fac != $given) {
        echo "Failed: {$ten} => {$fac} returned {$given}", PHP_EOL;
    }
}

echo 'fac2ten', PHP_EOL;
foreach ($expected as $ten => $fac) {
    $given = fac2ten($fac);

    if ($ten != $given) {
        echo "Failed: {$ten} => {$fac} returned {$given}", PHP_EOL;
    }
}

echo 'valid_factoradic', PHP_EOL;
foreach ($expected as $ten => $fac) {
    if( !valid_factoradic($fac)) {
        echo "Failed: {$fac} returned false", PHP_EOL;
    }

    $fac += 1;
    if(valid_factoradic($fac)) {
        echo "Failed: {$fac} returned true", PHP_EOL;
    }

    $fac += 19;
    if(valid_factoradic($fac)) {
        echo "Failed: {$fac} returned true", PHP_EOL;
    }
}
