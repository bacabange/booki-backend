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
    	$user = $this->defaultUser();

    	// $books = factory(Book::class, 20)->create(['user_id' => $user->id]);

    	$data = [
    		'name' => '100 años de soledad',
	    	'author' => 'Gabriel Garcia Marquez',
	    	'pages' => 345,
	    	'started_in' => '2016-12-01',
	    	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui eligendi tenetur, dolore explicabo reiciendis sapiente! Voluptatem rem assumenda obcaecati, veritatis tempore, dolorum sapiente cumque rerum nesciunt maiores dignissimos nulla voluptatum.',
	    	'user_id' => $user->id,
	    	'state' => 'in_process'
    	];

    	$response = $this->post('api/v1/books', $data, ['Accept' => 'application/json']);

        $response->assertStatus(200);

        $this->assertDatabaseHas('book', [
            'name' => $data['name'],
	    	'author' => $data['author'],
	    	'pages' => $data['pages'],
	    	'started_in' => $data['started_in'],
	    	'description' => $data['description'],
	    	'user_id' => $data['user_id'],
	    	'state' => $data['state']
        ]);
    }

    public function test_create_book_invalid()
    {
    	$user = $this->defaultUser();

    	$data = [
    		'name' => '',
	    	'author' => 'Gabriel Garcia Marquez',
	    	'pages' => 'good',
	    	'started_in' => '',
	    	'description' => '',
	    	'user_id' => $user->id,
	    	'state' => 'in_process'
    	];

    	$response = $this->post('api/v1/books', $data, ['Accept' => 'application/json']);

        $response->assertStatus(422);
    }
}
