<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder kategori dan user
        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
        ]);

        // Ambil 5 user secara acak
        $users = User::inRandomOrder()->limit(5)->get();

        // Ambil semua kategori
        $categories = Category::all();

        // Buat 100 post dengan user dan kategori yang dipilih
        Post::factory(100)
            ->recycle($users) // Gunakan hanya 5 user random
            ->create([
                'category_id' => $categories->random()->id, // Pilih kategori acak
            ]);
    }
}