<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lifehub extends Model
{
  protected $table = 'lifehubs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
        'jenis_kegiatan',
         'mood',
        'kegiatan',
        'tanggal',
        
        
 
        
    ];
}
