<?php


namespace Tests\Unit;

use App\Models\Users;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class deleteUserByNameTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_deleteUserByName()
    {
        Users::create(['name'=>'shireen', 'phoneNo'=>'5555565555', 'email' =>'shireen@gmail.com']);
        $response = $this->json('DELETE', '/api/users/byName/shireen');

        $response
            ->assertStatus(202);
    }

    public function test_deleteUserByNameError()
    {
        $response = $this->json('DELETE', '/api/users/byName/shireen');

        $response
            ->assertStatus(404);
    }
}
