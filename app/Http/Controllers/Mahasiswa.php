<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Mhs;
use Alert;

class Mahasiswa extends Controller
{
    public function index(){
        $mhs = Mhs::all();
        return view('mahasiswa.index', compact('mhs'));
    }

    public function tambah(Request $request){
        $request->validate([
            'nama' => 'required',
            'nim'  => 'required|max:11',
            'fakultas' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa = new Mhs;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();
        Alert::success('Success Title', 'Success Message');
        return redirect('/dashboard');
    }

    public function ubah(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'nim'  => 'required',
            'fakultas' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa = Mhs::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->save();
        Alert::success('Success Title', 'Success Message');
        return redirect('/dashboard');
    }

    public function hapus($id){
        Mhs::find($id)->delete();
        return redirect('/dashboard');
    }
}
