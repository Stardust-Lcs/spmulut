<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
