<?php
use PHPUnit\Framework\TestCase;
use Stk2k\Bench\MemoryBenchmark;

class MemoryBenchmarkTest extends TestCase
{
    public function testStart()
    {
        $this->assertEquals(0, MemoryBenchmark::start());
        $this->assertEquals(1, MemoryBenchmark::start());
        $this->assertEquals(2, MemoryBenchmark::start());
    }
    public function testStop()
    {
        try{
            $bench = MemoryBenchmark::start();
    
            $scores = MemoryBenchmark::score($bench);
            var_dump($scores);
    
            $this->assertInternalType('array', $scores);
            $this->assertEquals(['alloc','alloc_real','peak','peak_real'], array_keys($scores));
        }
        catch(\Throwable $e){
            $this->fail();
        }
    }
    
    
}