<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'nama',
        'tanggal',
        'jam',
        'jenis_kelamin',
        'keluhan'
    ];
}
