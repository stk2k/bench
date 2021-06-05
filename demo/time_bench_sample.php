<?php
declare(strict_types=1);

require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';
require_once 'include/autoload.php';

use stk2k\Bench\TimeBenchmark;

$handle = TimeBenchmark::start();

require_once __DIR__ . '/include/a_lot_of_work.php';

$score = TimeBenchmark::score($handle);
echo 'score: ' . $score . ' msec';
