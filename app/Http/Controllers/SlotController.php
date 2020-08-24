<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qurban;
use App\Slot;



class SlotController extends Controller
{

    public function store(Qurban $qurban, Request $request)
    {
        $request->validate([
            'pequrban' => 'required'
        ]);

        Slot::create([
            'qurban_id' => $qurban->id,
            'user_id' => $request->pequrban,
        ]);

        return redirect()->back()->with(['success' => 'Data tersimpan']);
    }

    public function destroy(Slot $slot)
    {
        $slot->delete();

        return redirect()->back()->with(['success' => 'Data Berhasi Dihapus']);
    }
}
