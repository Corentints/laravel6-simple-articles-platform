<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function actingAsAdmin() {
        $user = factory('App\User')->create(['is_admin' => true]);
        $this->actingAs($user);
        return $user;
    }
}
