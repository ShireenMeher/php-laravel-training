<?php

namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class getAllUsers extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_getUsers()
    {
        //$this->assertTrue(true);

        $response = $this->json('GET', '/api/users');

        $response
            ->assertStatus(200);
    }
}
