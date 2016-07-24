<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {

            $body = '';
            foreach ($faker->paragraphs(3, false) as $paragraph) {
                $body .= "$paragraph<br>";
            }

            $title = $faker->unique()->catchPhrase;
            $slug = str_replace(' ', '-', $title);

            DB::table('posts')->insert([
                'title' => $title,
                'subtitle' => $faker->catchPhrase,
                'body' => $body,
                'slug' => $slug,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}