<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(User::class, 20)->create();
        factory(Book::class, 20)->create();
        
    }
}
