<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Traits\FetchHttp as Fetch;
use App\Models\User;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $url = 'http://188.166.177.87/ignapi/';

    /**
     * Fetching a User API Resource
     * @test
     * @return void
     */
    public function it_can_fetch_user_and_get_the_result()
    {
        $response = Fetch::get($this->url);
        $response = json_decode($response);

        $this->assertNotEmpty($response);
    }

    /**
     * Fetching a User from server then store the response
     * @test
     * @return void
     */
    public function it_can_fetch_resource_and_store_the_response()
    {
        $response = Fetch::get($this->url);
        $response = json_decode($response, TRUE);

        $newEntry = [];
        foreach ($response as $key => $value) {
            $user = User::where('email', $value['email'])->first();
            if (empty($user)) {
                $value['need_pickup'] = (int) $value['need_pickup'];
                $newUser = User::create($value);
                array_push($newEntry, $newUser->toArray());
            }
        }

        $this->assertDatabaseHas('users', $newEntry[0]);
    }
}
