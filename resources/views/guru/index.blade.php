@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">
                    Data guru
                    <a href="{{route('guru.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Data</a>
                </div>
                <div class="container-fluid d-grid" style="height: 30px;">
                    <form action="{{ route('guru.cari') }}" method="GET" style="position: absolute; right: 10px;"
                        class="mt-3 mx-auto max-w-xl py-2 px-6 rounded-full bg-white border flex focus-within:border-gray-300 ">
                        <input type="text" name="cari" placeholder="Cari guru" value="{{ old('cari') }}"
                            class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0">
                        <input type="submit" value="Search"
                            class="flex flex-row items-center justify-center min-w-[130px] px-4 rounded-full font-medium tracking-wide border disabled:cursor-not-allowed disabled:opacity-50 transition ease-in-out duration-150 text-base bg-black text-white font-medium tracking-wide border-transparent py-1.5 h-[38px] -mr-3">
                    </form>
                </div>
                <br>
                <br>
                <div class="car-body">
                    <div class="table-responsive">
                        <table class="table" id="guru">
                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama guru</th>
                                <th>wali kelas</th>
                                <th>telepon</th>
                                <th>mapel</th>
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