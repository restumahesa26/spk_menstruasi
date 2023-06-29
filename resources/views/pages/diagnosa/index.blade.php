@extends('layouts.admin')

@section('title', 'Diagnosa')

@section('content')
<!-- Header -->
@include('sweetalert::alert')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
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
                            <h3 class="mb-0">Diagnosa Penyakit</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="{{ route('diagnosa.store') }}" method="post" id="form-diagnosa">
                                @csrf
                                <div class="row">
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""><b><i class="fas fa-user mr-1"></i> Nama</b></label>
                                            <input type="text" class="form-control mb-3 w-75" name="nama" required id="nama">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for=""><b><i class="fas fa-address-card mr-1"></i> Usia</b></label>
                                            <input type="number" class="form-control mb-3 w-75" name="usia" required id="usia">
                                        </div>
                                    </div>
                                </div>
                            <p class="font-weight-bold">Pilih gejala yang sedang dirasakan.</p>
                            <label for=""><b><i class="fas fa-th mr-1"></i> Gejala-gejala</b></label>
                            @foreach($items as $key => $value)
                            @php
                            $mod = ($key + 1) % 2;
                            @endphp
                            @if($mod == 1)
                            <div class="row">
                            @endif
                                <div class="col-md-6">
                                    <div class="row align-items-center justify-content-between border mb-2 p-2">
                                        <div class="col-md-8">
                                            <span>{{ $value->nama }}</span>
                                        </div>
                                        <div class="col-md-4" id="aa">
                                            <select name="diagnosa[]" id="gejala"
                                            class="form-control form-control-sm red-border font-weight-bold text-body">
                                            <option value="" selected>Tidak</option>
                                            <option value="{{ $value->id }}+0.2">Tidak Tahu</option>
                                            <option value="{{ $value->id }}+0.4">Mungkin</option>
                                            <option value="{{ $value->id }}+0.6">Kemungkinan Besar</option>
                                            <option value="{{ $value->id }}+0.8">Hampir pasti</option>
                                            <option value="{{ $value->id }}+1">Pasti</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                @if($mod == 0)
                            </div>
                            @endif

                            @if($key + 1 == \App\Models\Gejala::count() && $mod != 0)
                        </div>
                        @endif

                        @endforeach
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Diagnosa sekarang</button>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</div>
@endsection
@push('addon-style')
<style>
    .red-border {
        border: 1px solid rgba(227, 39, 79, .8);
    }

    .green-border {
        border: 1px solid rgba(50, 179, 104, .8);
    }
</style>
@endpush
@push('addon-script')
@if (Auth::user()->role == 'pengguna')
<script>
    $('button[type="submit"]').click(function(e) {
        e.preventDefault();
        var gejala = $('#form-diagnosa').find('select option[value!=""]:selected').length;
        var usia = $('#usia').val();
        if (usia != '') {
            if (gejala >= 3) {
                $('#form-diagnosa').submit();
                $(this).attr('disabled')
            } else {
                alert('Harap Isi Usia');
            }
        }else {
            alert('Harap Isi Minimal 3 Gejala');
        }
    });
</script>
@endif
@if (Auth::user()->role != 'pengguna')
<script>
    $('button[type="submit"]').click(function(e) {
        e.preventDefault();
        var gejala = $('#form-diagnosa').find('select option[value!=""]:selected').length;
        var nama = $('#nama').val();
        var usia = $('#usia').val();
        if (nama != '' && usia != '') {
            if (gejala >= 3) {
                $('#form-diagnosa').submit();
                $(this).attr('disabled')
            } else {
                alert('Harap Isi Minimal 3 Gejala');
            }
        }else {
            alert('Harap Isi Nama dan Usia');
        }
    });
</script>
@endif
<script>
    $('select[name="diagnosa[]"]').on('change', function() {
        if(this.value == "") {
            $(this).attr('class', 'form-control form-control-sm red-border')
        } else {
            $(this).attr('class', 'form-control form-control-sm green-border')
        }
    })
</script>
@endpush
