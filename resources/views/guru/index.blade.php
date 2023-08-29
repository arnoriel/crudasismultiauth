@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    Data guru
                    <a href="{{route('guru.create')}}" class="btn btn-sm btn-outline-primary float-right"><i class="bi bi-plus-square"></i> Tambah Data</a>
                    <div style="width: 340px; float: right">
                        <form action="{{ route('guru.cari') }}" class="row" method="GET" style="">
                            <input type="text" class="form-control col-4" style="width: 210px" name="cari" placeholder="Cari Guru" value="{{ old('cari') }}" >
                            <input type="submit" value="Cari" class="btn btn-primary col-4">
                        </form>
                    </div>
                </div>
                <div class="car-body">
                    <div class="table-responsive">
                        <table class="table" id="guru">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Guru</th>
                                <th>Wali Kelas</th>
                                <th>Telepon</th>
                                <th>Mata Pelajaran</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp  
                            @foreach ($guru as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->walkel}}</td>
                                    <td>{{$data->telepon}}</td>
                                    <td>{{$data->mapel}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>
                                        <form action="{{route('guru.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('guru.edit',$data->id)}}" class="btn btn-outline-info"><i class="bi bi-pencil-square"></i></a>
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