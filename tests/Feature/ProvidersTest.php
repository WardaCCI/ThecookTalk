<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProvidersTest extends TestCase
{
    public function test_app_provider_is_registered()
    {
        $this->assertTrue(app()->bound('App\Providers\AppServiceProvider'));
    }
}