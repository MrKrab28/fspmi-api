<?php

namespace App\Models;

use App\Models\PengaduanBalasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function balasan()
    {
        return $this->hasMany(PengaduanBalasan::class, 'id_pengaduan');
    }
}
