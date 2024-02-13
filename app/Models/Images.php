<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'path','post_id','id'
   ];
    public function Post(){
        return $this->hasOne(Images::class,'post_id','id');
    }

  
}
