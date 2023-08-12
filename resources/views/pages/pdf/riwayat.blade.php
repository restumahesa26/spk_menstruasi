<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hasil Diagnosa</title>
    <link rel="shortcut icon" href="{{ url('logo_si_mini.svg') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
	<p class="mt-3" style="margin-bottom: -4px">
		<b>Nama :</b> {{ $item->nama }}
	</p>
	<p class="mb-4">
		<b>Tanggal :</b> {{ $item->created_at->format('d M Y, H:m:s A') }}
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
	@foreach($hasil as $diagnosa)
	<div class="card card-body shadow-none p-0 mt-5 border">
		<div class="card-header text-white p-2" style="background-color: #068FFF !important;">
			<h6 class="font-weight-bold">Tabel perhitungan penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h6>
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
                    <td></td>
                    <td></td>
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
	</div>
    <div class="mt-2">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border: 0;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Pencegahan</h4>
                        {!! App\Helpers\Helper::getPencegahan(unserialize($item->cf_max)[1]) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="border: 0;">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Pengobatan</h4>
                        {!! App\Helpers\Helper::getPengobatan(unserialize($item->cf_max)[1]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    window.print()
</script>
