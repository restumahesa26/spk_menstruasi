@extends('layouts.admin')

@section('title', 'Rule Penyakit')

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
                                @forelse (App\Helpers\Helper::penyakit() as $penyakits)
                                    <li>{{ $penyakits->nama }}</li>
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
                            <h3 class="mb-0">Data Rule Penyakit</h3>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <ul class="list-group">
                                @forelse ($penyakit as $item)
                                    <a href="{{ route('rule-penyakit.show', $item->id) }}"><li class="list-group-item @if($data->id == $item->id) active @endif" aria-current="true">{{ $item->nama }}</li></a>
                                @empty

                                @endforelse
                            </ul>
                            <div class="mt-3">
                                <button class="btn-primary btn save">Simpan</button>
                                <a href="" class="btn-warning btn">Reset</a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('rule-penyakit.update', $data->id) }}" method="post" id="update-rule">
                                @csrf
                                @method('PATCH')
                                <div class="table-responsive">
                                    <!-- Projects table -->
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th style="width: 40% !important;">Gejala</th>
                                                <th>Nilai MB</th>
                                                <th>Nilai MD</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $rows = 1; @endphp
                                            @forelse ($gejalaPenyakit->get() as $item)
                                            <tr>
                                                <th>
                                                    {{ $rows }}
                                                </th>
                                                <td>
                                                    {{ $item->gejala->nama }}
                                                </td>
                                                <td>
                                                    <input type="number" step="0.2" class="form-control form-control-sm" name="nilai_mb[]" value="{{ $item->nilai_mb }}" required id="nilai-mb-{{ $item->gejala->id }}" max="1" min="0">
                                                    {{-- <input type="number" step="0.2" class="form-control form-control-sm" name="gejala-{{ $item->id }}" value="{{ $item->pivot->value_cf }}" required min="0"> --}}
                                                </td>
                                                <td>
                                                    <input type="hidden" name="gejala[]" id="hidden-{{ $item->gejala->id }}" value="{{ $item->gejala->id }}">
                                                    <input type="number" step="0.2" class="form-control form-control-sm" name="nilai_md[]" value="{{ $item->nilai_md }}" required id="nilai-md-{{ $item->gejala->id }}" max="1" min="0">
                                                    {{-- <input type="number" step="0.2" class="form-control form-control-sm" name="gejala-{{ $item->id }}" value="{{ $item->pivot->value_cf }}" required min="0"> --}}
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input check" data-id="{{ $item->gejala->id }}" id="gejala-{{ $item->gejala->id }}" checked>
                                                        <label class="custom-control-label" for="gejala-{{ $item->gejala->id }}">Aktif</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $rows++; @endphp
                                            @empty

                                            @endforelse

                                            @forelse ($gejala as $item)
                                            @if (!in_array($item->id, $gejalaId))
                                            <tr>
                                                <th>
                                                    {{ $rows }}
                                                </th>
                                                <td>
                                                    {{ $item->nama }}
                                                </td>
                                                <td>
                                                    <input type="number" step="0.2" class="form-control form-control-sm" id="nilai-mb-{{ $item->id }}" name="nilai_mb[]" required disabled min="0" max="1">
                                                </td>
                                                <td>
                                                    <input type="hidden" name="gejala[]" value="{{ $item->id }}" id="hidden-{{ $item->id }}" disabled>
                                                    <input type="number" step="0.2" class="form-control form-control-sm" id="nilai-md-{{ $item->id }}" name="nilai_md[]" required disabled min="0" max="1">
                                                </td>
                                                <td>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input check" data-id="{{ $item->id }}" id="gejala-{{ $item->id }}">
                                                        <label class="custom-control-label" for="gejala-{{ $item->id }}">Aktif</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php $rows++; @endphp
                                            @endif
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
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
@push('addon-script')
    <script>
        $('.save').click(function() {
            $('#update-rule').submit()
        })
        $('.check').change(function() {
            const id = $(this).data('id')

            if(this.checked) {
                $(`input[id="nilai-md-${id}"]`).removeAttr('disabled')
                $(`input[id="nilai-mb-${id}"]`).removeAttr('disabled')
                $(`input[id="hidden-${id}"]`).removeAttr('disabled')
            } else {
                $(`input[id="nilai-md-${id}"]`).attr('disabled', '')
                $(`input[id="nilai-md-${id}"]`).val('')
                $(`input[id="nilai-mb-${id}"]`).attr('disabled', '')
                $(`input[id="nilai-mb-${id}"]`).val('')
                $(`input[id="hidden-${id}"]`).attr('disabled', '')
            }
        })
    </script>
@endpush
