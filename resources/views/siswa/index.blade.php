@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    Data siswa
                    <a href="{{route('siswa.create')}}" class=" btn btn-sm btn-outline-primary "><i class="bi bi-plus-square"></i> Tambah Data</a>
                    <a href="/cetak" class="btn btn-sm btn-success" target="_blank"><i class="bi bi-file-earmark-arrow-down"></i> CETAK PDF</a>
                    <div style="width: 340px; float: right">
                        <form action="{{ route('siswa.cari') }}" class="row" method="GET" style="">
                            <input type="text" class="form-control col-4" style="width: 210px" name="cari" placeholder="Cari siswa" value="{{ old('cari') }}" >
                            <input type="submit" value="Cari" class="btn btn-primary col-4">
                        </form>
                    </div>
                </div>
                {{-- <br>
                <br> --}}
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
                                <th>Aksi</th>
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
                                    <td>
                                        <form action="{{route('siswa.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('siswa.edit',$data->id)}}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
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