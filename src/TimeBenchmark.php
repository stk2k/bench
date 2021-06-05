<?php
declare(strict_types=1);

namespace stk2k\Bench;

class TimeBenchmark
{
    const DEFAULT_PRECISION    = 4;

    static private $benchmarks;

    /**
     *  start timer
     *
     * @return int    handle of timer
     */
    public static function start() : int
    {
        static $handle = 0;

        $start_time = microtime(true);

        self::$benchmarks[$handle] = $start_time;

        return $handle++;
    }

    /**
     *    stop timer
     *
     * @param int $handle        handle of timer
     * @param int $precision     precision of timer value
     *
     * @return float      now score
     */
    public static function stop(int $handle, int $precision = self::DEFAULT_PRECISION) : float
    {
        $start_time = self::$benchmarks[$handle] ?? null;
        $stop_time = microtime(true);

        self::$benchmarks[$handle] = $stop_time;

        return round( ($stop_time - $start_time) * 1000, $precision );
    }

    /**
     *    score
     *
     * @param int $handle        handle of timer
     * @param int $precision     precision of timer value
     *
     * @return float      now score
     */
    public static function score(int $handle, int $precision = self::DEFAULT_PRECISION ) : float
    {
        $start_time = self::$benchmarks[$handle] ?? null;
        $stop_time = microtime(true);

        return round( ($stop_time - $start_time) * 1000, $precision );
    }

}

