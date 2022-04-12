<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clearing the book table of any data
        Book::truncate();

        // Using the Faker module to create a fake book name automatically
        $faker = \Faker\Factory::create();

        // generate some book data using faker module
            for ($i = 0; $i < 10; $i++) {
                Book::create([
                    'name' => $faker->name,
                    'status'=>1
                ]);
            }
    }
}
