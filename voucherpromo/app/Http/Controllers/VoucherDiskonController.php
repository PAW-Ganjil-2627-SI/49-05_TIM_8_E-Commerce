<?php

namespace App\Http\Controllers;

use App\Models\VoucherDiskon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class VoucherDiskonController extends Controller
{
    // Aturan validasi untuk semua kolom
    private function rules(?VoucherDiskon $voucher = null): array
    {
        return [
            'kode'          => ['required', 'max:30', Rule::unique(VoucherDiskon::class, 'kode')->ignore($voucher?->id)],
            'jenis'         => ['required', 'in:persen,nominal'],
            'nilai_diskon'  => ['required', 'integer', 'min:0'],
            'minimum_spend' => ['required', 'integer', 'min:0'],
            'berlaku'       => ['required', 'date'],
            'status'        => ['required', 'in:aktif,nonaktif'],
        ];
    }

    // SELECT: daftar voucher (publik)
    public function daftar()
    {
        $vouchers = VoucherDiskon::orderBy('id')->get();

        return view('voucher.daftar', compact('vouchers'));
    }

    // Form tambah
    public function create()
    {
        return view('voucher.create');
    }

    // INSERT
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        VoucherDiskon::create($data);

        return redirect()->route('voucher.daftar')
            ->with('success', 'Voucher berhasil ditambahkan.');
    }

    // Form edit (data lama otomatis dibawa lewat route model binding)
    public function edit(VoucherDiskon $voucher)
    {
        return view('voucher.edit', compact('voucher'));
    }

    // UPDATE: admin boleh semua kolom, kasir hanya kolom tertentu
    public function update(Request $request, VoucherDiskon $voucher)
    {
        $rules = $this->rules($voucher);

        if ($request->user()->can('ubahNilai', $voucher)) {
            // Admin
            $data = $request->validate($rules);
        } else {
            // Kasir
            $data = $request->validate(Arr::only($rules, ['minimum_spend', 'berlaku', 'status']));
        }

        $voucher->update($data);

        return redirect()->route('voucher.daftar')
            ->with('success', 'Voucher berhasil diubah.');
    }

    // DELETE
    public function destroy(VoucherDiskon $voucher)
    {
        $voucher->delete();

        return redirect()->route('voucher.daftar')
            ->with('success', 'Voucher berhasil dihapus.');
    }

    // Halaman rekap (dilindungi Gate 'lihat-rekap-voucher' di route)
    public function rekap()
    {
        return view('voucher.rekap', [
            'total'    => VoucherDiskon::count(),
            'aktif'    => VoucherDiskon::where('status', 'aktif')->count(),
            'nonaktif' => VoucherDiskon::where('status', 'nonaktif')->count(),
        ]);
    }
}