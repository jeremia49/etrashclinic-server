<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FCM extends Model
{
    use HasFactory;

    protected $table = "table_fcm";

    protected $guarded  = ['id'];
}
