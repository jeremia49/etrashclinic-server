<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SampahPengguna extends Model
{
    use HasFactory;

    protected $table = "table_sampah";

    protected $guarded  = ['id'];

}
