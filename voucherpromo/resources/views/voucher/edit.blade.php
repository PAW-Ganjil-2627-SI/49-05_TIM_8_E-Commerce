@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm p-4">
            <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Voucher</h3>
            <form action="{{ route('voucher.update', $voucher) }}" method="POST">
                @csrf
                @method('PUT')
                @include('voucher._form')
                <div class="d-flex justify-content-between">
                    <a href="{{ route('voucher.daftar') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection