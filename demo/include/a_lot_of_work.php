<?php
echo 'wait start' . PHP_EOL;
$total = 10;
foreach(range(1, $total) as $time){
    echo $time . '/' . $total . PHP_EOL;
    $data = '';
    foreach(range(1, 10000) as $pos){
        $data .= chr(65 + rand(0,25));
    }
    echo 'data:' . $data . PHP_EOL;
    sleep(1);
}
echo 'wait end' . PHP_EOL;