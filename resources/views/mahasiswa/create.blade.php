@extends('layout/utama')

@section('title', 'Form Tambah Data Mahasiswa Ilkom')

@section('container')
<div class="container">
    <div class="row">
        <h1 class="mt-3" style="color: white;"><b>Form Tambah Data Mahasiswa Ilkom</b></h1><br>
        <div class="col-10"><br>
            <form method="post" action="{{url ('mahasiswa')}}">
                @csrf
                <div class="form-group">
                    <label for="Nama" style="color: white;">Nama</label><br>
                    <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                        placeholder="Masukkan Nama" name="Nama">
                    @error('Nama')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="NIM" style="color: white;">Nim</label><br>
                    <input type="text" class="form-control @error('Nim') is-invalid @enderror" id="Nim"
                        placeholder="Masukkan Nim" name="Nim">
                    @error('Nim')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Jurusan_Prodi" style="color: white;">Jurusan / Prodi</label><br>
                    <select name="Jurusan_Prodi" class="form-control">
                        <option value="" style="color: black;">Silahkan Pilih Jurusan / Prodi</option>
                        @foreach($jurusan as $item)
                        <option value="{{$item->nama}}" style="color: black;">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Alamat" style="color: white;">Alamat</label><br>
                    <input type="text" class="form-control @error('Nim') is-invalid @enderror" id="Alamat"
                        placeholder="Masukkan Alamat" name="Alamat">
                    @error('Alamat')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="sumbit" class="btn btn-info my-3">Tambah Data</button>
                <a href="/mahasiswa" class="btn btn-warning">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection
