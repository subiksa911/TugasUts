<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Jurusan;
use App\Student;
use Illuminate\Support\Facades\DB;
use App\Exports\Export;
use App\Exports\MahasiswaExport;
use App\Imports\MahasiswaImport;
use App\Mahasiswa;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(Request $request)
    {
        $mahasiswa = Student::all();
       if($request->has('cari')){
        $mahasiswa = Student::where('Nama','LIKE', '%'.$request->cari.'%')->get();
    }
    else{
        $mahasiswa = Student::all();
        }

       return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create',compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama' => 'required',
            'Nim' => 'required|size:10',
            'Jurusan_Prodi'=> 'required',
            'Alamat'=>'required'
        ]);

        student::create([
            'Nama' => $request->Nama,
            'Nim' => $request->Nim,
            'Jurusan_Prodi' => $request->Jurusan_Prodi,
            'Alamat'=> $request->Alamat
        ]);
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $mhs = Student::find($id);
        return view('mahasiswa.edit', compact('mhs','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $mhs = Student::find($id);
        $mhs->update($request->all());
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete($id)
    {
        $mhs = Student::find($id);
        $mhs->delete();
        return redirect('/mahasiswa')->with('status', 'Data Berhasil Dihapus');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport(),'Mahasiswa.xlsx');
    }
    public function import(Request $request){
        $file = $request->file('file');
        $nama_File = $file->getClientOriginalName();
        $file->move('DataMahasiswa', $nama_File);

        Excel::import(new MahasiswaImport, public_path('/DataMahasiswa/'.$nama_File));
        return redirect('/mahasiswa');
    }
}
