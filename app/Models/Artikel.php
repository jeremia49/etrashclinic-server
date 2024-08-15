<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    
    protected $table = "table_artikel";

    protected $guarded  = ['id'];

    protected $hidden = [
        'content',
    ];
    protected function getImgPublicUrlAttribute(){
        return url("/storage/".$this->attributes['imgUrl']);
    }

    protected function getPublicUrlAttribute(){
        return url(route("viewartikelpublic",["id"=>$this->attributes['id']]));
    }
    
    protected $appends = ['imgPublicUrl', 'publicUrl'];

}
