<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TamuController extends Controller
{
    public function simpanTamu(Request $request){
        $nama = $request->nama;
        $kantor = $request->instansi_kantor;
        $tanggal = $request->tanggal;
        $ingin_bertemu = $request->ingin_bertemu;
        $keperluan = $request->perlu;

      


        $data = new User();
        $data->nama = $nama;
        $data->instansi_kantor = $kantor;
        $data->tanggal_hadir = $tanggal;
        $data->ingin_bertemu = $ingin_bertemu;
        $data->keperluan = $keperluan;
        $data->password = Hash::make('admin');
        $data->save();

        return redirect('/')->with('status', 'Data berhasil disimpan!');
    }
}
