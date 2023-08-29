@extends('layouts.siswa')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card bg-success text-white" style="opacity: 50%;">
                <div class="card-body">
                    <h5>Halo Siswa !</h5>
                </div>
            </div>
            <br>
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
                use App\Models\Guru;

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
<div class="col-md-8 offset-md-2">
    <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 25rem;">
                <div class="card-header bg-primary text-white">
                    Total Data Guru
                </div>
                <div class="card-body">
                    {{ DB::table('gurus')->count(); }}
                </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 25rem;">
                <div class="card-header bg-primary text-white">
                    Total Data Kelas
                </div>
                <div class="card-body">
                    {{ DB::table('kelas')->count(); }}
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
<br>
<div class="card bg-danger text-white" style="margin: 10px;">
    <div class="card-body">
        Note: Biasakan LOG OUT setelah menggunakan aplikasi !
    </div>
</div>
@endsection