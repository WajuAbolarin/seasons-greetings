<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createMessageFromUrl($data)
    {
        if(is_object($data)){
            return $this->post('/messages', $data->toArray());
        }
        return $this->post('/messages', $data);
    }

    protected function signIn()
    {
        return $this->actingAs(factory(User::class)->create());
    }
}
