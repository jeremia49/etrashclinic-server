<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukHasil extends Model
{
    use HasFactory;

    protected $table = "table_produkhasil";

    protected $guarded  = ['id'];

    protected function getImgPublicUrlAttribute(){
        return url("/storage/".$this->attributes['imgUrl']);
    }

    protected $appends = [
        'imgPublicUrl',
    ];

}
