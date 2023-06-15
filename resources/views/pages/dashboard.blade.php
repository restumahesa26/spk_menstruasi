@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Gejala</h5>
                                    <span class="h2 font-weight-bold mb-0">@gejala</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fa fa-th"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Penyakit</h5>
                                    <span class="h2 font-weight-bold mb-0">@penyakit</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fa fa-map"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role == 'admin')
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
                                    <span class="h2 font-weight-bold mb-0">@pengguna</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Diagnosa</h5>
                                    <span class="h2 font-weight-bold mb-0">@diagnosa</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-stethoscope"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Riwayat Diagnosa Terakhir</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('riwayat-diagnosa.index') }}" class="btn btn-sm btn-primary">Lihat Lebih Banyak</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Penyakit Terdiagnosa</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>
                                        {{ $item->user->nama }}
                                    </td>
                                    <td>
                                        {{ unserialize($item->cf_max)[1] }} <b>(<span class="text-danger">{{ number_format(unserialize($item->cf_max)[0] * 100, 2) }}%</span>)</b>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="4">-- Belum Ada Riwayat Diagnosa --</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Artikel</h3>
                            </div>
                        </div>
                        <div class="artikel mt-3">
                            @forelse ($items2 as $item)
                            <h5 class="mt-3">{{ $item->judul }}</h5>
                            <img src="{{ url('images/gambar-artikel/' . $item->gambar) }}" alt="{{ $item->judul }}" style="width: 100%">
                            <button type="button" class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#modalKonten{{ $item->id }}">
                                Lihat Konten
                            </button>
                            <div class="modal fade" id="modalKonten{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTambahLabel">{{ $item->judul }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h3>{{ $item->judul }}</h3>
                                            <img src="{{ url('images/gambar-artikel/' . $item->gambar) }}" alt="{{ $item->judul }}" style="width: 100%" class="mb-2">
                                            {!! $item->konten !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </div>
@endsection
