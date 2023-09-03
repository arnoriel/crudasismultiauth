@extends('layouts.walkel')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                   <h5>Dashboard</h5>
                </div>
                <div class="card-header">
                 Total Data Siswa: {{ DB::table('siswas')->count() }}
                </div>
                <div style="width: 800px;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="card-body">
                @php
                use App\Models\Siswa;

                $jumlah_laki = Siswa::where('jk', 'perempuan') ->count();
                $jumlah_perempuan= Siswa::where('jk', 'Laki-laki')->count();
                @endphp
                </div>
            </div>
        </div>
    </div>
</div>
<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["Perempuan", "Laki-Laki"],
			datasets: [{
				label: '',
				data: [{{$jumlah_laki}},{{$jumlah_perempuan}}
				],
				backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
				],
				borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
<br>
            <div class="card">
                <div class="card-header">
                    Data siswa
                    <a href="/cetak" class="btn btn-sm btn-success" target="_blank"><i class="bi bi-file-earmark-arrow-down"></i> CETAK PDF</a>
                    <div style="width: 340px; float: right">
                        <form action="{{ route('siswaw.cari') }}" class="row" method="GET" style="">
                            <input type="text" class="form-control col-4" style="width: 210px" name="cari" placeholder="Cari siswa" value="{{ old('cari') }}" >
                            <input type="submit" value="Cari" class="btn btn-primary col-4">
                        </form>
                    </div>
                </div>
                <div class="car-body">
                    <div class="table-responsive">
                        <table class="table" id="siswa">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama siswa</th>
                                <th>Kelas</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp  
                            @foreach ($siswa as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->kelas}}</td>
                                    <td>{{$data->jk}}</td>
                                    <td>{{$data->jurusan}}</td>
                                    <td>{{$data->alamat}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection