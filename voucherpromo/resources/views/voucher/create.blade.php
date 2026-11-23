@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm p-4">
            <h3 class="fw-bold mb-3 border-bottom pb-2">Tambah Voucher</h3>
            <form action="{{ route('voucher.store') }}" method="POST">
                @csrf
                @include('voucher._form', ['semua' => true])
                <div class="d-flex justify-content-between">
                    <a href="{{ route('voucher.daftar') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection