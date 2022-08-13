<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapras extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }

    public function saprasPinjam(){
        return $this->hasMany(SaprasPinjam::class);
    }
}
