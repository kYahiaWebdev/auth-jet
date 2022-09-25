<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'Administrator')->get()->first();

        $post1 = Post::factory()->create([
            'title' => 'First Post',
            'user_id' => $user->id,
            'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus, 
                iusto nisi. Neque velit illo facilis necessitatibus id hic eaque tenetur 
                laudantium et minima. Officia est ab atque voluptas inventore cupiditate!'
        ]);
        $post2 = Post::factory()->create([
            'title' => 'Second Post',
            'user_id' => $user->id,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque 
                magnam aspernatur nisi magni natus accusamus tempora aliquid earum mollitia delectus.'
        ]);

        Comment::factory(3)->create([
            'post_id' => $post1->id
        ]);
        
        Comment::factory(3)->create([
            'post_id' => $post2->id
        ]);
        
    }
}
