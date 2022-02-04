<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    public static function generateSlug($title){

        $slug = Str::slug($title);
        $slug_base = $slug;

        $post_presente = Post::where('slug', $slug)->first();

        $contatore = 1;

        while($post_presente){
            $slug = $slug_base . '-' . $contatore;
            $contatore++;
            $post_presente = Post::where('slug', $slug)->first();
        }

        return $slug;

    }

    //per sapere a che categoria appartiene il post
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
