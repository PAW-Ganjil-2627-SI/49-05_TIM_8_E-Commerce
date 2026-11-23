@extends('layouts.app')

@section('content')
    <h2 class="text-center mb-4">Voucher dan promo yang tersedia</h2>

    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Kode</th>
                    <th>Jenis</th>
                    <th>Nilai Diskon</th>
                    <th>Minimum Spend</th>
                    <th>Berlaku sampai</th>
                    <th>Status</th>
                    @auth
                        <th>Aksi</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse ($vouchers as $voucher)
                    <tr>
                        <th>{{ $voucher->kode }}</th>
                        <td>{{ ucfirst($voucher->jenis) }}</td>
                        <td>
                            @if ($voucher->jenis == 'persen')
                                {{ $voucher->nilai_diskon }}%
                            @else
                                {{ number_format($voucher->nilai_diskon, 0, ',', '.') }}
                            @endif
                        </td>
                        <td>{{ number_format($voucher->minimum_spend, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($voucher->berlaku)->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($voucher->status) }}</td>

                        @auth
                            <td class="text-nowrap">
                                {{-- @can hanya menyembunyikan tombol. Pengunci sebenarnya ada di route. --}}
                                @can('update', $voucher)
                                    <a href="{{ route('voucher.edit', $voucher) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endcan

                                @can('delete', $voucher)
                                    <form action="{{ route('voucher.destroy', $voucher) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus voucher {{ $voucher->kode }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                @endcan
                            </td>
                        @endauth
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Belum ada voucher.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @auth
        <a href="{{ route('voucher.create') }}" class="btn btn-primary">Tambah Voucher</a>
    @endauth
@endsection