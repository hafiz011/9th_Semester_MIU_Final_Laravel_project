<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'First Post',
            'description' => 'This is the first post.',
            'author' => 'John Doe',
            'location' => 'USA',
            'email' => 'john@example.com',
            'phone' => '123-456-7890',
            'image' => 'https://example.com/first-image.jpg',
        ]);

        Post::create([
            'title' => 'Second Post',
            'description' => 'This is the second post.',
            'author' => 'Jane Smith',
            'location' => 'UK',
            'email' => 'jane@example.com',
            'phone' => '987-654-3210',
            'image' => 'https://example.com/second-image.jpg',
        ]);
    }
}
