<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // <-- BARIS INI HILANG!
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- BARIS INI JUGA HILANG!

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'pelanggan_id';
    protected $table = 'pelanggan';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
