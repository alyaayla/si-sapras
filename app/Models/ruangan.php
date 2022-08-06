<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;

    protected $guarded = ('id');

    public function sapras(){
        return $this->hasMany(Sapras::class);
    }

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }
}
