<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TamuController extends Controller
{
    public function index()
    {
         $data = User::all();
        return view('admin.tamu.index', compact('data'));
    }

    public function formEdit($id)
    {
        $data = User::find($id);
        return view('formEdit', compact('data'));
        dd($data);
    }
}
