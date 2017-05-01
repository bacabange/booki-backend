<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\User;

class AuthenticationTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_register_user()
    {

        $data = [
            'first_name' => 'Stiven',
            'last_name' => 'Castillo',
            'email' => 'stivencastillo.90@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
        ];

        $response = $this->post('api/v1/register', $data, ['Accept' => 'application/json']);

        $response->assertStatus(200);

        $this->assertDatabaseHas('user', [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }

    public function test_register_user_invalid()
    {

        $data = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $response = $this->post('api/v1/register', $data, ['Accept' => 'application/json']);

        $response->assertStatus(422);

    }

    public function test_login_user()
    {
        $data = [
            'email' => 'stivencastillo.90@gmail.com',
            'password' => '123456',
        ];

    	$user = factory(User::class)->create($data);

        $response = $this->post('api/v1/login', $data, ['Accept' => 'application/json']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

    }

    public function test_login_user_invalid()
    {
        $data = [
            'email' => 'usermane',
            'password' => '',
        ];

        $response = $this->post('api/v1/login', $data, ['Accept' => 'application/json']);

        $response->assertStatus(422);

    }
}
