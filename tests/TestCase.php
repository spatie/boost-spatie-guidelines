<?php

namespace Spatie\BoostSpatieGuidelines\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\BoostSpatieGuidelines\BoostSpatieGuidelinesServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            BoostSpatieGuidelinesServiceProvider::class,
        ];
    }
}
