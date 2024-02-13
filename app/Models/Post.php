<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{     
    use HasFactory;
    protected $fillable = [
        'title', 'client_id','category_id','id','status','short_description', 'description'
   ];
    public function Images(){
        return $this->hasOne(Images::class,'post_id','id');
    }

    public function Category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function Client(){
        return $this->hasOne(Client::class,'id','client_id');
    }

    public function Cats(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function Posts(){
        return $this->hasOne(Category::class);
    }    
}
