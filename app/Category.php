<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //devo creare la proprietà $category->posts che sarà un metodo
    //per sapere quali post appartengono a questa categoria

    public function posts(){
        return $this->hasMany('App\Post');
    }
    
}
