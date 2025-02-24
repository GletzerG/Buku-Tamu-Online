<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TamuController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.tamu.index', compact('data'));
    }


    public function formTambah()
    {
        return view('admin.tamu.formTambah');
    }


    public function formEdit($id)
    {
        $data = User::find($id);

        return view('admin.tamu.formEdit', compact('data'));
    }

    public function simpanData(Request $request)
    {
        $nama = $request->nama;
        $kantor = $request->instansi_kantor;
        $tanggal = $request->tanggal_hadir;
        $ingin_bertemu = $request->ingin_bertemu;
        $keperluan = $request->keperluan;

        $data = new User();
        $data->nama = $nama;
        $data->instansi_kantor = $kantor;
        $data->tanggal_hadir = $tanggal;
        $data->ingin_bertemu = $ingin_bertemu;
        $data->keperluan = $keperluan;
        $data->password = Hash::make('admin');
        $data->save();
        return redirect('admin/tamu')->with('status', 'Data berhasil disimpan!');
    }
    public function updateTamu(Request $request, $id)
    {
        $id = $request->id;
        $nama = $request->nama;
        $kantor = $request->instansi_kantor;
        $tanggal = $request->tanggal_hadir;
        $ingin_bertemu = $request->ingin_bertemu;
        $keperluan = $request->keperluan;

        $data = User::find($id);
        $data->nama = $nama;
        $data->instansi_kantor = $kantor;
        $data->tanggal_hadir = $tanggal;
        $data->ingin_bertemu = $ingin_bertemu;
        $data->keperluan = $keperluan;
        $data->update();
        return redirect('admin/tamu')->with('status', 'Data berhasil disimpan!');
    }

    public function hapusTamu(Request $request){
    $id = $request->id;
    $data = User::find($id);
    $data->delete();
    return redirect('admin/tamu')->with('status', 'Data berhasil dihapus!');
    }
}