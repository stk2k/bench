<?php
namespace Stk2k\Bench;

class TimeBenchmark
{
    const DEFAULT_PRECISION    = 4;

    static private $benchmarks;

    /**
     *  start timer
     *
     * @return integer    handle of timer
     */
    public static function start()
    {
        static $handle = 0;

        $start_time = microtime(true);

        self::$benchmarks[$handle] = $start_time;

        return $handle++;
    }

    /**
     *    stop timer
     *
     * @param integer $handle        handle of timer
     * @param integer $precision     precision of timer value
     *
     * @return integer      now score
     */
    public static function stop( $handle, $precision = self::DEFAULT_PRECISION )
    {
        $start_time = isset(self::$benchmarks[$handle]) ? self::$benchmarks[$handle] : NULL;
        $stop_time = microtime(true);

        self::$benchmarks[$handle] = $stop_time;

        return round( ($stop_time - $start_time) * 1000, $precision );
    }

    /**
     *    score
     *
     * @param integer $handle        handle of timer
     * @param integer $precision     precision of timer value
     *
     * @return integer      now score
     */
    public static function score( $handle, $precision = self::DEFAULT_PRECISION )
    {
        $start_time = isset(self::$benchmarks[$handle]) ? self::$benchmarks[$handle] : NULL;
        $stop_time = microtime(true);

        return round( ($stop_time - $start_time) * 1000, $precision );
    }

}

