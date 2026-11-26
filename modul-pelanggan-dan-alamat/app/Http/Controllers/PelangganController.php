<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    public function daftar(){
        $pelanggan = Pelanggan::orderByDesc('id')->get();
        return view('pelanggan.daftar', compact('pelanggan'));
    }

    public function index()
    {
         $pelanggan = Pelanggan::orderByDesc('id')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }


    public function store(Request $request){
            $request->validate([
                'nama' => 'required|max:100',
                'email' => 'required|email|max:50',
                'no_hp' => 'required|max:20',
                'jenis_kelamin' => 'required',
                'label_alamat' => 'required',
                'alamat' => 'required',
                'kota' => 'required',
                'provinsi' => 'required',
                'kode_pos' => 'required|max:5',
    ]);

    $is_utama = $request->has('utama') ? '(Utama)' : '';
    $alamat_pengiriman = "{$request->label_alamat} {$is_utama} : {$request->alamat}, {$request->kota}, {$request->provinsi}, {$request->kode_pos}";

    Pelanggan::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat_pengiriman' => $alamat_pengiriman,
    ]);

    return redirect()->route('pelanggan.daftar')->with('success', 'Data Pelanggan Berhasil Ditambahkan. ');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $request->validate([
        'nama' => 'required|max:100',
        'email' => 'required|email|max:50',
        'no_hp' => 'required|max:20',
        'jenis_kelamin' => 'required',
        'alamat_pengiriman' => 'required',
    ]);

    $pelanggan->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat_pengiriman' => $request->alamat_pengiriman,
    ]);

    return redirect()->route('pelanggan.daftar')->with('success', 'Data Pelanggan Berhasil Diperbarui.');
}

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

       return redirect()->route('pelanggan.daftar')->with('success', 'Pelanggan berhasil dihapus.');
    }
}
