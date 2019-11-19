<?php
namespace Stk2k\Bench;

use Stk2k\Util\Enum\EnumMemoryUnit;
use Stk2k\Util\MemoryUtil;

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
     *  start timer
     *
     */
    public static function start()
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
     * @param integer $handle        handle of benchmark
     * @param integer $unit          unit of memory usage
     * @param integer $precision     precision of memory usage
     *
     * @return array      now scores
     */
    public static function score( $handle, $unit = EnumMemoryUnit::UNIT_MB, $precision = self::DEFAULT_PRECISION  )
    {
        $start = isset(self::$benchmarks[$handle]) ? self::$benchmarks[$handle] : NULL;

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

