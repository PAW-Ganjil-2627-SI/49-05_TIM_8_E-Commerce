{{--
    Variabel yang dibaca form ini:
      $voucher -> data voucher (tidak ada saat tambah)
      $semua   -> true: tampilkan semua kolom (tambah / admin), false: kolom terbatas (kasir)
--}}
@php($semua = $semua ?? true)

@if ($semua)
    <div class="mb-3">
        <label class="form-label fw-semibold">Kode</label>
        <input type="text" name="kode" maxlength="30"
               class="form-control @error('kode') is-invalid @enderror"
               value="{{ old('kode', $voucher->kode ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Jenis</label>
        <select name="jenis" class="form-select @error('jenis') is-invalid @enderror" required>
            <option value="persen"  @selected(old('jenis', $voucher->jenis ?? 'persen') == 'persen')>Persen</option>
            <option value="nominal" @selected(old('jenis', $voucher->jenis ?? 'persen') == 'nominal')>Nominal</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Nilai Diskon</label>
        <input type="number" name="nilai_diskon" min="0"
               class="form-control @error('nilai_diskon') is-invalid @enderror"
               value="{{ old('nilai_diskon', $voucher->nilai_diskon ?? '') }}" required>
    </div>
@else
    <div class="alert alert-secondary">
        Voucher <strong>{{ $voucher->kode }}</strong>
        ({{ ucfirst($voucher->jenis) }}, nilai {{ number_format($voucher->nilai_diskon, 0, ',', '.') }}).
        Kode, jenis, dan nilai diskon hanya bisa diubah oleh admin.
    </div>
@endif

<div class="mb-3">
    <label class="form-label fw-semibold">Minimum Spend</label>
    <input type="number" name="minimum_spend" min="0"
           class="form-control @error('minimum_spend') is-invalid @enderror"
           value="{{ old('minimum_spend', $voucher->minimum_spend ?? 0) }}" required>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Berlaku sampai</label>
    <input type="date" name="berlaku"
           class="form-control @error('berlaku') is-invalid @enderror"
           value="{{ old('berlaku', isset($voucher) ? \Carbon\Carbon::parse($voucher->berlaku)->format('Y-m-d') : '') }}" required>
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
        <option value="aktif"    @selected(old('status', $voucher->status ?? 'aktif') == 'aktif')>Aktif</option>
        <option value="nonaktif" @selected(old('status', $voucher->status ?? 'aktif') == 'nonaktif')>Nonaktif</option>
    </select>
</div>