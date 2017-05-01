<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'story';

	protected $fillable = [
		'date', 'page', 'chapter', 'is_end', 'summary', 'book_id', 
	];

    protected $casts = [
        'date' => 'date',
        'is_end' => 'boolean'
    ];

	// Relationship

	public function book()
	{
		return $this->belongsTo('Booki\Book');
	}
}
