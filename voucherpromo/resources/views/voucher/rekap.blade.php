@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Rekap Voucher</h2>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-muted">Total Voucher</div>
                    <div class="display-5 fw-bold">{{ $total }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-muted">Aktif</div>
                    <div class="display-5 fw-bold text-success">{{ $aktif }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <div class="text-muted">Nonaktif</div>
                    <div class="display-5 fw-bold text-secondary">{{ $nonaktif }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection