<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaduanBalasan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan_balasan';

    public function pengaduan(){
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function childs(){
        return $this->hasMany(PengaduanBalasan::class, 'parent');
    }
}
