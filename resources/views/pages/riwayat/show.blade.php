@extends('layouts.admin')

@section('title', 'Riwayat Diagnosa')

@section('content')
<!-- Header -->
@include('sweetalert::alert')
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
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Riwayat Diagnosa</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="mb-2 mt-2">
                                <i class="fas fa-user mr-1"></i> {{ $item->nama }} <i class="fas fa-calendar ml-4 mr-1"></i> {{ $item->created_at->format('d M Y, H:m:s') }}
                            </p>

                            <table class="table table-hover border">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Gejala yang kamu alami saat ini</th>
                                        <th>Tingkat keyakinan</th>
                                        <th>CF User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(unserialize($item->gejala_terpilih) as $gejala)
                                    <tr>
                                        <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                                        <td>{{ $gejala['keyakinan'] }}</td>
                                        <td>{{ $gejala['cf_user'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @foreach(unserialize($item->hasil_diagnosa) as $diagnosa)
                            <div class="card card-body p-0 mt-3 border" style="box-shadow: none !important;">
                                <div class="card-header bg-primary text-white p-2">
                                    <h5 class="font-weight-bold">Tabel perhitungan penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h5>
                                </div>
                                <table class="table table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Gejala</th>
                                            <th>CF User</th>
                                            <th>CF Expert</th>
                                            <th>CF (H, E)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($diagnosa['gejala'] as $gejala)
                                        <tr>
                                            <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                                            <td>{{ $gejala['cf_user'] }}</td>
                                            <td>{{ $gejala['cf_role'] }}</td>
                                            <td>{{ $gejala['hasil_perkalian'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="font-weight-bold">
                                        <tr>
                                            <td scope="row">Nilai CF</td>
                                            <td><span class="text-danger">{{ number_format($diagnosa['hasil_cf'], 3) }}</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            @endforeach
                            <div class="mt-5">
                                <div class="alert alert-success">
                                    <h5 class="font-weight-bold">Kesimpulan</h5>
                                    <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($item->cf_max)[0], 3) }} ({{ number_format(unserialize($item->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($item->cf_max)[1] }}</b></p>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="{{ route('diagnosa.index') }}" class="btn btn-warning mr-1"><i class="fas fa-redo mr-1"></i> Diagnosa ulang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
@endsection
