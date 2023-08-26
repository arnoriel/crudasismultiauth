@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2>Halo Admin!</h2>
            <br>
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>
                <div style="width: 800px;margin: 0px auto;">
                    <canvas id="myChart"></canvas>
                </div>
             
               
                <div class="card-body">
                   
                </div>
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
<div class="col-md-10 offset-md-1">
    <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-header">
                    Total Data Siswa
                </div>
                <div class="card-body">
                    {{ DB::table('siswas')->count(); }}
                </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-header">
                    Total Data Guru
                </div>
                <div class="card-body">
                    {{ DB::table('gurus')->count(); }}
                </div>
            </div>
          </div>
          <div class="col">
            <div class="card bg-primary text-white" style="width: 18rem;">
                <div class="card-header">
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
@endsection