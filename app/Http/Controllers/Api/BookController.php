<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\CreateBookRequest;
use App\Http\Requests\Api\UpdateBookRequest;

use App\Models\Book;

class BookController extends Controller
{

	public function index(Request $request)
	{
		$user = $request->get('user');

		$books = $user->books;

		return response()->json([
			'success' => true,
			'data' => $books
		]);

	}

	public function show(Book $book)
    {
    	$book->stories;

        return [
            'success' => true,
            'data' => $book
        ];
    }

    public function store(CreateBookRequest $request)
    {
    	$user = $request->get('user');


		$data = $request->only('name', 'author', 'pages', 'started_in', 'description', 'state');
		$data['user_id'] = $user->id;

		$book = Book::create($data);

		return response()->json([
			'success' => true,
			'data' => $book
		]);
    }

    public function update(Book $book, UpdateBookRequest $request)
    {
    	$book->fill($request->only('name', 'author', 'pages', 'description'));

    	$book->save();

    	return response()->json([
			'success' => true,
			'data' => $book
		]);
    }
}
