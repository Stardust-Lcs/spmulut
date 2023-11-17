<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    protected $table = 'riwayat';
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
