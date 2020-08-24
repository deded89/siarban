<?php

namespace App;

use App\Helpers\MyHelper;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $fillable = ["jumlah", "slot_id"];

    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }

    public function getCurJumlahAttribute()
    {
        return MyHelper::formatNumber($this->jumlah);
    }
}
