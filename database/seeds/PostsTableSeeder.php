<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Category;
use App\User;

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

        foreach (range(1, 20) as $index) {

            $body = '';
            foreach ($faker->paragraphs(3, false) as $paragraph) {
                $body .= "$paragraph<br>";
            }

            $title = $faker->unique()->catchPhrase;
            $slug = str_replace(' ', '-', $title);

            $user = User::all()->random(1);
            $category = Category::all()->random(1);

            DB::table('posts')->insert([
                'title' => $title,
                'subtitle' => $faker->catchPhrase,
                'body' => $body,
                'slug' => $slug,
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
    }
}