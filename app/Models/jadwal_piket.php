<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_piket extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'jadwal_piket';
    protected $fillable = [
       
        'hari',
        'id_nama',
        
       
    ];
}
