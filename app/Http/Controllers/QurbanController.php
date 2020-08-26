<?php

namespace App\Http\Controllers;

use App\Http\Requests\QurbanRequest;
use App\User;
use App\Qurban;
use App\Slot;
use Exception;

class QurbanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $qurbans = Qurban::all()->sortBy('tahun');
        return view('qurbans.index', compact('qurbans'));
    }

    public function create()
    {
        return view('qurbans.create');
    }

    public function store(QurbanRequest $request)
    {
        $qurban = Qurban::create($request->all());
        return redirect()->route('qurbans.index')->with(['success' => 'Data Tersimpan']);;
    }

    public function show(Qurban $qurban)
    {
        $calon_pequrbans = User::all()->sortBy('name');
        $slots = Slot::with('user')->where('qurban_id', $qurban->id)->get();
        return view('qurbans.show', compact('qurban', 'calon_pequrbans', 'slots'));
    }


    public function edit(Qurban $qurban)
    {
        return view('qurbans.edit', compact('qurban'));
    }

    public function update(QurbanRequest $request, Qurban $qurban)
    {
        $qurban->update($request->all());
        return redirect()->route('qurbans.show', ['qurban' => $qurban->id]);
    }

    public function destroy(Qurban $qurban)
    {
        try {
            Qurban::destroy($qurban->id);
            return redirect()->route('qurbans.index');
        } catch (Exception $e) {
            return redirect()->route('qurbans.show', ['qurban' => $qurban->id])->with(['error' => 'Tidak bisa dihapus, kosongkan list pequrban dulu']);
        };
    }
}
