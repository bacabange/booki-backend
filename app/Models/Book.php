<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

	protected $fillable = [
		'name', 'author', 'pages', 'started_in', 'description', 'user_id', 'state',
	];

    protected $hidden = ['created_at', 'updated_at'];

	// Relationship

	public function user()
	{
		return $this->belongsTo(App\Models\User::class);
	}

	public function stories()
	{
		return $this->hasMany(App\Models\Story::class);
	}
}
