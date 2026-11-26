<?php

namespace App\Http\Controllers;

use App\Models\KatalogProduk;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $katalog = KatalogProduk::orderByDesc('id_produk')->get();
        return view('katalog.index', compact('katalog'));
    }

    public function create()
    {
        return view('katalog.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Nama_produk' => 'required|max:100',
            'Warna_produk' => 'required|max:50',
            'Berat' => 'required|integer',
            'Merk' => 'required|max:100',
        ]);

        KatalogProduk::create($data);

        return redirect()->route('katalog.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $katalog = KatalogProduk::findOrFail($id);
        return view('katalog.edit', compact('katalog'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Nama_produk' => 'required|max:100',
            'Warna_produk' => 'required|max:50',
            'Berat' => 'required|integer',
            'Merk' => 'required|max:100',
        ]);

        $katalog = KatalogProduk::findOrFail($id);
        $katalog->update($data);

        return redirect()->route('katalog.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $katalog = KatalogProduk::findOrFail($id);
        $katalog->delete();

        return redirect()->route('katalog.index')->with('success', 'Produk berhasil dihapus.');
    }
}