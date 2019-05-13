<?php

namespace Tests\Feature;

use Tests\TestCase;

class InfrastructureTest extends TestCase 
{
    public function testIfDatabaseIsReacheable()
    {
        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();
            $this->assertTrue(true);
        } catch (Exception $e) {
            $this->assertTrue(false);
        }
    }
}