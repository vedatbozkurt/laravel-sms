<?php

namespace Vedatbozkurt\Sms\Tests;

use Orchestra\Testbench\TestCase;
use Vedatbozkurt\Sms\SmsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [SmsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
