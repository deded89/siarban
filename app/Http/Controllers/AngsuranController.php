<?php

namespace App\Http\Controllers;

use App\Angsuran;
use App\Slot;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Slot $slot)
    {
        return view('angsurans.index', compact('slot'));
    }


    public function store(Request $request, Slot $slot)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
        ]);

        $slot->angsurans()->create([
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->back()->with(['success', 'Transaksi Tersimpan']);
    }

    public function show(Angsuran $angsuran)
    {
        return view('angsurans.show', compact('angsuran'));
    }

    public function destroy(Angsuran $angsuran)
    {
        $angsuran->delete();
        return redirect()->back()->with(['success', 'Transaksi Dihapus']);
    }
}
