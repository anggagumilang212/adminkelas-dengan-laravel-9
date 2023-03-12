<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uangkas extends Model
{
    use HasFactory;
        
    public $timestamps = false;

    protected $table = 'uangkas';
    protected $fillable = [
       
        'id_absensi',
        'hari',
        'tgl_bayar',
        'jml_bayar',
       
       
    ];
   
    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_absensi');
    }
 
    
}
