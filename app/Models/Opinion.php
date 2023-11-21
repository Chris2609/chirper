<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $table = "opiniones";

    //sirve al usar ->save() para insertar
    public $timestamps = false; // Disable timestamps

    use HasFactory;
}
