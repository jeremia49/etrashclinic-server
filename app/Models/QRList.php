<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRList extends Model
{
    use HasFactory;
    
    protected $table = "table_qr_list";

    protected $guarded  = ['id'];

}
