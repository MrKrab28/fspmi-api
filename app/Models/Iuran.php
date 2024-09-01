<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Iuran extends Model
{


    use HasFactory;
    protected $table = 'iuran';


    public function items(): HasMany
    {
        return $this->hasMany(IuranItem::class, 'id_iuran');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_anggota');
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: function () {
                $a = $this->items->sortByDesc('tgl_bayar')->first();
                if ($a) {
                    $bulan = Carbon::parse($a->tgl_bayar)->month;
                    $bulanIni = Carbon::today()->month;
                    if ($bulan == $bulanIni) {
                        return 'Terbayar';
                    }
                }
                return 'Belum Terbayar';
            }
        );
    }
}
