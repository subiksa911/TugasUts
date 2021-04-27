@extends('layout/utama')

@section('title', 'Data Mahasiswa ')

@section('container')
<div class="container">
    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <div class="row">

        <div class="col-10">
            <h1 class="mt-10 colored-shadow" style="color: aliceblue; text-align:center;"><b>DATA MAHASISWA FTK</b>
            </h1><br>
            <div>
                <a href="/mahasiswa/create" class="btn btn-primary" my=3 style="margin: 10px;">Tambah Data
                    Mahasiswa </a>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Import Data
                </a>
                <a href="/mahasiswa/export" class="btn btn-primary" my=3 style="margin: 10px;">Export Data </a>
                <form class="d-flex" method="GET" action="/mahasiswa">
                    <div class="col-auto">
                        <input name="cari" class="form-control" type="search" placeholder="Search Dengan Nama"
                            aria-label="Search">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit" style="color: azure;">Search</button>
                    </div>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: indigo;">
                            <div class="modal-header" style="color: aliceblue;">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Import Data</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/mahasiswa/import" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"><b>Silahkan Pilih Data Anda</b></label>
                                        <input class="form-control" name="file" type="file" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">OKE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>


            @if (session('status'))
            <div class="alert alert-success ms-3">
                {{ session('status') }}
            </div>
            @endif


        </div>

    </div>
    <table class="table" style="background-color:dimgrey; border: 4px Solid;">
        <thead class="thead-dark" style="color: azure; border: 4px Solid;">
            <tr style="color: azure;">
                <th style="color: azure; border: 2px Solid;">No</th>
                <th style="color: azure; border: 2px Solid;">Nama</th>
                <th style="color: azure; border: 2px Solid;">Nim</th>
                <th style="color: azure; border: 2px Solid;">Jurusan / Prodi</th>
                <th style="color: azure; border: 2px Solid;">Alamat</th>
                <th style="color: azure; border: 2px Solid;">Edit Or Delete</th>
            </tr>
        </thead>

        <tbody style="border: 2px Solid;">
            @foreach($mahasiswa as $mhs)
            <tr style="color: azure; border: 2px Solid;">
                <th style="color: azure; border: 2px Solid;">{{ $loop->iteration }}</th>
                <td style="color: azure; border: 2px Solid;">{{ $mhs->Nama }}</td>
                <td style="color: azure; border: 2px Solid;">{{ $mhs->Nim }}</td>
                <td style="color: azure; border: 2px Solid;">{{ $mhs->Jurusan_Prodi }}</td>
                <td style="color: azure; border: 2px Solid;">{{ $mhs->Alamat }}</td>
                <td>
                    <a href="/mahasiswa/{{$mhs->id}}/edit" class="btn btn-success btn-sm">
                        <<i class="fa fa-edit"></i>></icla>
                    </a>
                    <a href="/mahasiswa/{{$mhs->id}}/delete" class="btn btn-danger btn-sm "><i
                            class="fa fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection