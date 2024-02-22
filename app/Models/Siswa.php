<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kota;

class Siswa extends Model
{
    protected $guarded = [];

    public function kota(){
        return $this->belongsTo(Kota::class, 'id_kota', 'id');
    }
}
