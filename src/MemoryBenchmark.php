<?php
declare(strict_types=1);

namespace stk2k\Bench;

use stk2k\Util\Enum\EnumMemoryUnit;
use stk2k\Util\MemoryUtil;

/**
* Benchmark class Of Memory Usage
*
* PHP version 5
*
* @package    class.debug
* @author     CharcoalPHP Development Team
* @copyright  2008 stk2k, sazysoft
*/

class MemoryBenchmark
{
    const DEFAULT_PRECISION    = 4;

    static private $benchmarks;

    /**
     * Start timer
     *
     * @return int    handle of timer
     */
    public static function start() : int
    {
        static $handle = 0;

        self::$benchmarks[$handle] = [
            'alloc' => memory_get_usage(false),
            'alloc_real' => memory_get_usage(true),
            'peak' => memory_get_peak_usage(false),
            'peak_real' => memory_get_peak_usage(true),
        ];

        return $handle++;
    }

    /**
     *    score
     *
     * @param int $handle        handle of benchmark
     * @param int $unit          unit of memory usage
     * @param int $precision     precision of memory usage
     *
     * @return array      now scores
     */
    public static function score(int $handle, int $unit = EnumMemoryUnit::UNIT_MB, int $precision = self::DEFAULT_PRECISION) : array
    {
        $start = self::$benchmarks[$handle] ?? null;

        $alloc      = memory_get_usage(false) - $start['alloc'];
        $alloc_real = memory_get_usage(true) - $start['alloc_real'];
        $peak       = memory_get_peak_usage(false) - $start['peak'];
        $peak_real  = memory_get_peak_usage(true) - $start['peak_real'];
    
        $alloc      = MemoryUtil::convertSize( $alloc, $unit, $precision );
        $alloc_real = MemoryUtil::convertSize( $alloc_real, $unit, $precision );
        $peak       = MemoryUtil::convertSize( $peak, $unit, $precision );
        $peak_real  = MemoryUtil::convertSize( $peak_real, $unit, $precision );

        return [
            'alloc'      => $alloc,
            'alloc_real' => $alloc_real,
            'peak'       => $peak,
            'peak_real'  => $peak_real,
        ];
    }

}

