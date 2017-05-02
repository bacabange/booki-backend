<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Book;

class BookTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create_book()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    	// $user = $this->defaultUser();
        /*$user = factory('App\Models\User')->create();
        $token_jwt = \JWTAuth::fromUser($user);

    	$data = [
    		'name' => '100 años de soledad',
	    	'author' => 'Gabriel Garcia Marquez',
	    	'pages' => 345,
	    	'started_in' => '2016-12-01',
	    	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eligendi tenetur, dolore explicabo reiciendis sapiente! Voluptatem rem assumenda obcaecati, veritatis tempore, dolorum sapiente cumque rerum nesciunt maiores dignissimos nulla voluptatum.',
	    	'state' => 'in_process'
    	];

    	$response = $this->post('api/v1/books', $data, [
            'Accept' => 'application/json',
            'HTTP_Authorization' => 'Bearer '.$token_jwt
        ]);

        // var_dump($response);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertDatabaseHas('book', [
            'name' => $data['name'],
	    	'author' => $data['author'],
	    	'pages' => $data['pages'],
	    	'started_in' => $data['started_in'],
	    	'description' => $data['description'],
	    	'state' => $data['state']
        ]);*/
    }

    /*public function test_create_book_invalid()
    {
    	$user = $this->defaultUser();
        $token_jwt = \JWTAuth::fromUser($user);

    	$data = [
    		'name' => '',
	    	'author' => 'Gabriel Garcia Marquez',
	    	'pages' => 'good',
	    	'started_in' => '',
	    	'description' => '',
	    	'state' => 'in_process'
    	];

    	$response = $this->post('api/v1/books?token=' . $token_jwt, $data, ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }*/

    /*public function test_list_book()
    {
        $user = $this->defaultUser();

        $books = factory(Book::class, 20)->create(['user_id' => $user->id]);

        $data = [
            'token' => $user->token_jwt
        ];

        $response = $this->get('api/v1/books', $data, ['Accept' => 'application/json']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);
    }*/
}
