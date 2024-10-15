<?php

namespace Database\Seeders;

use App\Models\Rating;
use App\Models\RatingItem;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Database\Factories\TopicFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
        ]);
        User::factory(20)->create();

        Topic::factory()->create([
            'name' => 'Film',
            'description' => 'Topik ini tentang film',
            'image' => 'https://via.assets.so/img.jpg?w=600&h=400&t=Film',
        ]);
        Topic::factory()->create([
            'name' => 'Buku',
            'description' => 'Topik ini tentang buku',
            'image' => 'https://via.assets.so/img.jpg?w=600&h=400&t=Buku',
        ]);
        Topic::factory()->create([
            'name' => 'Makanan',
            'description' => 'Topik ini tentang makanan',
            'image' => 'https://via.assets.so/img.jpg?w=600&h=400&t=Makanan',
        ]);

        Rating::factory(10)
            ->has(Tag::factory()->count(3))
            ->has(RatingItem::factory()->count(5))
            ->create();

        $users = User::select('id')->get();
        foreach (Rating::all() as $rating) {
            for ($i = 1; $i <= 3; $i++) {
                $rating->likes()->attach($users->random());
            }
        }
    }
}
