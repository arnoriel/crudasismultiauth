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
                $jumlah_rpl = Siswa::where('jurusan', 'RPL') ->count();
                $jumlah_tkj = Siswa::where('jurusan', 'TKJ') ->count();
                $jumlah_dkv = Siswa::where('jurusan', 'DKV') ->count();
                $jumlah_tkro = Siswa::where('jurusan', 'TKRO') ->count();
                $jumlah_tbsm = Siswa::where('jurusan', 'TBSM') ->count();
                $jumlah_tmp = Siswa::where('jurusan', 'TMP') ->count();
                $jumlah_tp = Siswa::where('jurusan', 'TP') ->count();
                $jumlah_otkp = Siswa::where('jurusan', 'OTKP') ->count();
                $jumlah_hr = Siswa::where('jurusan', 'HR') ->count();
                @endphp
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["RPL", "TKJ", "DKV", "TKRO", "TBSM", "TMP", "TP", "OTKP", "HR"],
            datasets: [{
                label: ' Jurusan dengan siswa paling banyak',
                data: [{{$jumlah_rpl}},{{$jumlah_tkj}},{{$jumlah_dkv}},{{$jumlah_tkro}},{{$jumlah_tbsm}},{{$jumlah_tmp}},{{$jumlah_tp}},{{$jumlah_otkp}},{{$jumlah_hr}}],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
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