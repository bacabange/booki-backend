<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Story;

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
		return $this->belongsTo(User::class);
	}

	public function stories()
	{
		return $this->hasMany(Story::class);
	}
}
