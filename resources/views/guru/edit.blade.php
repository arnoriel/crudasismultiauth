@extends('layouts.admin')
  
@section('content')
<div class="container">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header">Data guru</div>
                <div class="card-body">
                    <form action="{{route('guru.update',$guru->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Masukan Nama guru</label>
                            <input type="text" name="nama" value="{{$guru->nama}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama guru">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="">Masukan Wali Kelas</label>
                                 <select class="form-select"  value="{{$guru->walkel}}" aria-label="Default select example" name="walkel" id="" >
                                    <option selected>Pilih Kelas</option>
                                   <option>X-RPL</option>
                                   <option>X-TKJ</option>
                                   <option>X-DKV</option>
                                   <option>X-TKRO</option>
                                   <option>X-TBSM</option>
                                   <option>X-TMP</option>
                                   <option>X-TP</option>
                                   <option>X-OTKP</option>
                                   <option>X-HR</option>
                                   <option>XI-RPL</option>
                                   <option>XI-TKJ</option>
                                   <option>XI-DKV</option>
                                   <option>XI-TKRO</option>
                                   <option>XI-TBSM</option>
                                   <option>XI-TMP</option>
                                   <option>XI-TP</option>
                                   <option>XI-OTKP</option>
                                   <option>XI-HR</option>
                                   <option>XII-RPL</option>
                                   <option>XII-TKJ</option>
                                   <option>XII-DKV</option>
                                   <option>XII-TKRO</option>
                                   <option>XII-TBSM</option>
                                   <option>XII-TMP</option>
                                   <option>XII-TP</option>
                                   <option>XII-OTKP</option>
                                   <option>XII-HR</option>
                                </select>
                                <label for="">Masukan telepon</label>
                                <input type="number" name="telepon"  value="{{$guru->telepon}}" class="form-control @error('telepon') is-invalid @enderror" placeholder="Masukkan telepon guru">
                                @error('telepon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="">Masukan mapel</label>
                                <select class="form-select"  value="{{$guru->mapel}}" aria-label="Default select example" name="mapel" id="" >
                                    <option selected>Pilih mapel</option>
                                   <option>Bahasa Indonesia</option>
                                   <option>Matematika</option>
                                   <option>Bahasa Inggris</option>
                                   <option>Bahasa Sunda</option>
                                   <option>Fisika</option>
                                   <option>Kimia</option>
                                   <option>PAI</option>
                                   <option>PPKN</option>
                                   <option>PKKT</option>
                                   <option>PKKP</option>
                                   <option>Jepang</option>
                                   <option>Seni Budaya</option>
                                </select>
                                <label for="">Masukan Alamat</label>
                            <input type="text" name="alamat"  value="{{$guru->alamat}}" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat guru">
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
