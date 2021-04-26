<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>lorem ipsum dolar</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nesciunt ab iusto, quaerat, modi accusantium incidunt doloribus eligendi voluptas atque qui laudantium soluta repellendus quo culpa, quam ratione repudiandae dignissimos?
            Ipsam reiciendis hic laboriosam dolorem sint ea ipsa, numquam voluptatem voluptatum natus provident ipsum id officia libero consequuntur nihil officiis non, quos quasi deserunt iusto impedit. Sed neque atque officiis.
            Cumque sequi aut vitae magnam harum nisi architecto, neque enim, praesentium animi libero. Ipsum, fuga nihil ea accusamus earum fugiat aspernatur, quo neque vel, voluptate nam impedit a? Veritatis, quisquam!</p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-work-post',
            'excerpt' => '<p>lorem ipsum dolar</p>',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nesciunt ab iusto, quaerat, modi accusantium incidunt doloribus eligendi voluptas atque qui laudantium soluta repellendus quo culpa, quam ratione repudiandae dignissimos?
            Ipsam reiciendis hic laboriosam dolorem sint ea ipsa, numquam voluptatem voluptatum natus provident ipsum id officia libero consequuntur nihil officiis non, quos quasi deserunt iusto impedit. Sed neque atque officiis.
            Cumque sequi aut vitae magnam harum nisi architecto, neque enim, praesentium animi libero. Ipsum, fuga nihil ea accusamus earum fugiat aspernatur, quo neque vel, voluptate nam impedit a? Veritatis, quisquam!</p>'
        ]);
    }
}
