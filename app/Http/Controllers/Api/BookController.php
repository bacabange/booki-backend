<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\CreateBookRequest;

use App\Models\Book;

class BookController extends Controller
{
    public function store(CreateBookRequest $request)
    {
    	$book = Book::create($request->only('name', 'author', 'pages', 'started_in', 'description', 'user_id', 'state'));

    	return response()->json([
    		'success' => true,
    		'data' => $book
    	]);
    }
}
