<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalpelajaran extends Model
{
    use HasFactory;
        
    public $timestamps = false;

    protected $table = 'jadwalpelajaran';
    protected $fillable = [
       
        'pelajaran',
        'id_namaguru',
        'waktu_mulai',
        'waktu_selesai',
       
       
    ];
   
    public function namaguru()
    {
        return $this->belongsTo(Namaguru::class, 'id_namaguru');
    }
 
    
}
