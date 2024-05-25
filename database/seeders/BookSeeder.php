<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i=0; $i < 21; $i++) { 
            Book::create([
                "title"             => $faker->sentence(),
                "author"            => $faker->name(),
                "publisher"         => $faker->name(),
                "published_date"    => Carbon::now(),
                "stock"             => $faker->randomNumber(2)
            ]);
        }
    }
}
