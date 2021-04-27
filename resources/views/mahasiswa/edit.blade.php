@extends('layout.utama')

@section('title', 'Form Ubah Data Mahasiswa Ilkom')

@section('container')
<div class="container" style="background-color:rgba(20, 40, 80, 0.5);">
    <div class="row">
        <div class="col-10">
            <h1 class="mt-3" style="color: aliceblue;">Form Ubah Data Mahasiswa</h1><br>
            <br>

            <form method="post" action="/mahasiswa/{{$mhs->id}}/update">
                @csrf
                <div class="form-group">
                    <label for="Nama" style="color: aliceblue;">Nama</label>
                    <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama"
                        placeholder="Masukkan Nama" name="Nama" value="{{$mhs->Nama}}">
                    @error('Nama')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Nim" style="color: aliceblue;">Nim</label>
                    <input type="text" class="form-control @error('Nim') is-invalid @enderror" id="Nim"
                        placeholder="Masukkan Nim" name="Nim" value="{{$mhs->Nim}}">
                    @error('Nim')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Jurusan_Prodi" style="color: white;">Jurusan / Prodi</label><br>
                    <select name="Jurusan_Prodi" class="form-control">
                        <option value="" style="color: black;">Silahkan Pilih Jurusan</option>
                        @foreach($jurusan as $item)
                        <option value="{{$item->nama}}" selected style="color: black;">{{$item->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Alamat" style="color: aliceblue;">Alamat</label><br>
                    <input type="text" class="form-control @error('Nim') is-invalid @enderror" id="Alamat"
                        placeholder="Masukkan Alamat" name="Alamat" value="{{$mhs->Alamat}}">
                    @error('Alamat')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="sumbit" class="btn btn-primary my-3">Ubah Data</button>
                <a href="/mahasiswa" class="btn btn-danger">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection