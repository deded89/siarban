<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\MyHelper;
use Illuminate\Support\Carbon;

class Slot extends Model
{

    protected $fillable = ['qurban_id', 'user_id'];
    public function angsurans()
    {
        return $this->hasMany(Angsuran::class, 'slot_id', 'id')->orderBy('created_at', 'desc');
    }

    public function qurban()
    {
        return $this->belongsTo(Qurban::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalBayarAttribute()
    {
        return $this->angsurans->sum('jumlah');
    }

    public function getSisaAngsuranSetahunAttribute()
    {
        return $this->qurban->angsuran_setahun - $this->total_bayar;
    }

    public function getAngsuranJatuhTempoAttribute()
    {
        $interval = $this->qurban->interval_angsuran;
        $tgl_pertama = Carbon::parse($this->qurban->tgl_angsuran_pertama);
        $total_bayar = $this->total_bayar;
        $besar_angsuran = $this->qurban->besar_angsuran;
        $angsuran_berjalan = intdiv($tgl_pertama->diffInDays(today()), $interval);
        $angsuran_jatuh_tempo = $angsuran_berjalan - (intdiv($total_bayar, $besar_angsuran));
        $harus_dibayar = $angsuran_berjalan * $besar_angsuran - $total_bayar;

        return array(
            'jumlah' => MyHelper::formatNumber($harus_dibayar),
            'banyak' => $angsuran_jatuh_tempo,
        );
    }
}
