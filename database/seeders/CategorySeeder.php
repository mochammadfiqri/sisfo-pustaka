<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Action and adventure', 'Alternate history', 'Anthology', 'Chick lit', 'Childrens', 'Classic', 'Comic book',
            'Crime', 'Drama', 'Fairytale', 'Fantasy', 'Graphic novel', 'Historical fiction', 'Horror', 'Mystery', 'Romance',
            'Satire', 'Science fiction', 'Short story', 'Thriller', 'Western', 'Art/architecture', 'Biography', 'Business/economics',
            'Crafts/hobbies', 'Cookbook', 'Diary', 'Dictionary', 'Encyclopedia', 'Guide', 'Health/fitness', 'History', 'Humor', 'Journal',
            'Math', 'Philosophy', 'Religion, spirituality, and new age', 'Textbook', 'Review', 'Science', 'Sports and leisure', 'Travel',
        ];

        foreach ($data as $value) {
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
