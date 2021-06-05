<?php
declare(strict_types=1);

require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require_once 'include/autoload.php';

use stk2k\Bench\MemoryBenchmark;

$handle = MemoryBenchmark::start();

require_once __DIR__ . '/include/a_lot_of_work.php';

$score = MemoryBenchmark::score($handle);
$score = array_map(function($v){ return $v . 'MB'; }, $score);
echo 'score: ' . print_r($score, true);

