<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaprasPinjam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function sapras(){
        return $this->belongsTo(Sapras::class, 'sapras_id');
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
