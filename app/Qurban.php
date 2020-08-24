<?php

namespace App;

use App\Helpers\MyHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Slot;

class Qurban extends Model
{
    protected $fillable = [
        'jenis', 'harga', 'tahun', 'lama', 'besar_angsuran', 'interval_angsuran', 'tgl_angsuran_pertama', 'max_pequrban'
    ];

    public function slots()
    {
        return $this->hasMany(Slot::class);
    }

    public function angsurans()
    {
        return $this->hasManyThrough(Angsuran::class, Slot::class, 'qurban_id', 'slot_id');
    }

    public function getCurHargaAttribute()
    {
        return MyHelper::formatNumber($this->harga);
    }

    public function getCurBesarAngsuranAttribute()
    {
        return MyHelper::formatNumber($this->besar_angsuran);
    }

    public function getIndoTglAngsuranPertamaAttribute()
    {
        return Carbon::parse($this->tgl_angsuran_pertama)->format('j - m - Y');
    }

    public function getAngsuranSetahunAttribute()
    {
        return $this->harga / $this->lama;;
    }

    public function getCurAngsuranSetahunAttribute()
    {
        return MyHelper::formatNumber($this->harga / $this->lama);
    }

    public function getModAngsuranSetahunAttribute()
    {
        return $this->AngsuranSetahun % $this->besar_angsuran;
    }

    public function getCurModAngsuranSetahunAttribute()
    {
        return MyHelper::formatNumber($this->AngsuranSetahun % $this->besar_angsuran);
    }

    public function getBanyakAngsuranSetahunAttribute()
    {
        return ceil($this->AngsuranSetahun / $this->besar_angsuran);
    }

    public function getBanyakAngsuranAttribute()
    {
        return $this->BanyakAngsuranSetahun * $this->lama;
    }

    public function getBanyakAngsuranBerjalanAttribute()
    {
        $now = Carbon::now();
        $tgl_pertama = Carbon::parse($this->tgl_angsuran_pertama);
        $selisih = $tgl_pertama->diffInDays($now);
        return intdiv($selisih, $this->interval_angsuran);
    }
}
