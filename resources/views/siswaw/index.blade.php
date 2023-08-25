@extends('layouts.walkel')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    Data siswa
                </div>
                <div class="container-fluid d-grid" style="height: 30px;">
                    <form action="{{ route('siswaw.cari') }}" method="GET" style="position: absolute; right: 10px;"
                        class="mt-3 mx-auto max-w-xl py-2 px-6 rounded-full bg-white border flex focus-within:border-gray-300 ">
                        <input type="text" name="cari" placeholder="Cari siswa" value="{{ old('cari') }}"
                            class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0">
                        <input type="submit" value="Search"
                            class="flex flex-row items-center justify-center min-w-[130px] px-4 rounded-full font-medium tracking-wide border disabled:cursor-not-allowed disabled:opacity-50 transition ease-in-out duration-150 text-base bg-black text-white font-medium tracking-wide border-transparent py-1.5 h-[38px] -mr-3">
                    </form>
                </div>
                <br>
                <br>
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
                <a href="/cetak" class="btn btn-primary" target="_blank">CETAK PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection