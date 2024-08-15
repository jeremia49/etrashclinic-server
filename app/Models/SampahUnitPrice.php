<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahUnitPrice extends Model
{
    use HasFactory;

    protected $table = "table_unitprice";

    protected $guarded  = ['id'];

    protected function getImgPublicUrlAttribute(){
        return url("/storage/".$this->attributes['imgUrl']);
    }

    protected $appends = [
        'imgPublicUrl',
    ];

}
