<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;


class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index', [
            'title' => 'Daftar Mahasiswa',
            'students' => DB::table('mahasiswas')->paginate(5)
        ]);
    }

    public function create()
    {
        return view('mahasiswa.add');
    }

    public function store(Request $request)
    {
        $mhs = new Mahasiswa;
        $mhs->nim = $request->nim;
        $mhs->nama = $request->nama;
        $mhs->umur = $request->umur;
        $mhs->alamat = $request->alamat;
        $mhs->kota = $request->kota;
        $mhs->kelas = $request->kelas;
        $mhs->jurusan = $request->jurusan;
        $mhs->save();
        return redirect('/mahasiswa')->with('status', 'Data berhasil ditambahkan');
    }

    public function getEdit($nim)
    {
        return view('mahasiswa.edit', [
            "title" => "Edit Mahasiswa",
            "students" => DB::table("mahasiswas")->where("nim", $nim)->first()
        ]);
    }

    public function postEdit(Request $request, $nim)
    {
        $this->validate ($request,[
            'nim' => 'required',
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'jurusan' => 'required',
            'kelas' => 'required',
        ]);

        $save['nim'] = $request->get('nim');
        $save['nama'] = $request->get('nama');
        $save['umur'] = $request->get('umur');
        $save['alamat'] = $request->get('alamat');
        $save['kota'] = $request->get('kota');
        $save['jurusan'] = $request->get('jurusan');
        $save['kelas'] = $request->get('kelas');

        DB::table('mahasiswas')->where('nim',$nim)->update($save);

        return redirect('/mahasiswa')->with(["status"=>"Berhasil diedit"]);
    }

    public function delete($nim)
    {

        DB::Table('mahasiswas')->where('nim',$nim)->delete();

        return redirect('/mahasiswa')->with('status','Berhasil dihapus');
    }

}
