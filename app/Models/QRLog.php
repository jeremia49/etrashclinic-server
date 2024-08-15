<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRLog extends Model
{
    use HasFactory;

    protected $table = "table_qr_log";

    protected $guarded  = ['id'];
}
