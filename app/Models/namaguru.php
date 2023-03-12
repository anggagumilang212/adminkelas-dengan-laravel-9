<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namaguru extends Model
{
    use HasFactory;
        
    public $timestamps = false;

    protected $table = 'namaguru';
    protected $fillable = [
       
        'namaguru',
        'nip',
        'foto',
        'status',
       
    ];

}
