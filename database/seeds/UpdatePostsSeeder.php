<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
class UpdatePostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //estraggo tutti i post
        $posts = Post::all();

        //estraggo random l'id della categoria
        foreach($posts as $post){
            $data=[
                'category_id' => Category::inRandomOrder()->first()->id //metto tutto in un array associativo che scrive il campo
            ];

            //eseguo l'update
            $post->update($data);
        }
    }
}
