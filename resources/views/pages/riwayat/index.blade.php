@extends('layouts.admin')

@section('title', 'Riwayat Diagnosa')

@section('content')
<!-- Header -->
@include('sweetalert::alert')
<div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="modal fade" id="modalPenyakit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Penyakit Pada Menstruasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ol>
                                @forelse (App\Helpers\Helper::penyakit() as $penyakit)
                                    <li>{{ $penyakit->nama }}</li>
                                @empty

                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalGejala" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Gejala Pada Menstruasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ol>
                                @forelse (App\Helpers\Helper::gejala() as $gejala)
                                    <li>{{ $gejala->nama }}</li>
                                @empty

                                @endforelse
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Gejala</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="#" data-toggle="modal" data-target="#modalGejala"><u>@gejala</u></a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fa fa-th" style="cursor: pointer" data-toggle="modal" data-target="#modalGejala"></i>
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
                                    <span class="h2 font-weight-bold mb-0"><a href="#" data-toggle="modal" data-target="#modalPenyakit"><u>@penyakit</u></a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fa fa-map" style="cursor: pointer" data-toggle="modal" data-target="#modalPenyakit"></i>
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
                                    <span class="h2 font-weight-bold mb-0">{{ App\Helpers\Helper::hitungDiagnosa() }}</span>
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
                    <div class="table-responsive mt-3">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush" id="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Penyakit Terdiagnosa</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        {{ unserialize($item->cf_max)[1] }} <b>(<span class="text-danger">{{ number_format(unserialize($item->cf_max)[0] * 100, 2) }}%</span>)</b>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('riwayat-diagnosa.pdf', $item->id) }}" target="_blank" class="btn btn-primary btn-sm">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="{{ route('riwayat-diagnosa.show', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <th colspan="5">--- Data Kosong ---</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
</div>
@endsection

@if ($items->count() > 0)
@push('addon-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable({
            "orderable": false
        });
    });
</script>
@endpush
@endif
