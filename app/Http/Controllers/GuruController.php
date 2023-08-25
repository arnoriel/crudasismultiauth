<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru=Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru=Guru::all();
        return view('guru.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'walkel' => 'required',
            'telepon' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        $guru = new Guru;
        $guru->nama = $request->nama;
        $guru->walkel = $request->walkel;
        $guru->telepon = $request->telepon;
        $guru->mapel = $request->mapel;
        $guru->alamat = $request->alamat;
        
        $guru->save();
        return redirect()->route('guru.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $guru=Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'walkel' => 'required',
            'telepon' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nama = $request->nama;
        $guru->walkel = $request->walkel;
        $guru->telepon = $request->telepon;
        $guru->mapel = $request->mapel;
        $guru->alamat = $request->alamat;

        $guru->save();
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru=Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index');
    }

    public function cari(Request $request)
    {
        $keyword = $request->input('cari');

        $guru = guru::where('nama', 'like', "%" . $keyword . "%")->paginate(10);
        
        return view('guru.index', compact('guru'));
    }
}
