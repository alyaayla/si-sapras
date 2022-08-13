<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = "peminjamen";
    protected $guarded = ['id'];

    public function sapras(){
        return $this->belongsTo(Sapras::class, 'sapras_id');
    }

    public function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }
}
