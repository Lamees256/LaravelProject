<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable =[
        'name','status', 'post_id', 'id'
    ];

    public function Post(){
        return $this->hasOne(Category::class,'post_id','id');
    }

    public function Posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }
}
