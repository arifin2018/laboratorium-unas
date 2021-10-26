<?php

namespace App\Http\Controllers\Api;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JurusanProdiController extends Controller{

    public function Jurusan(Request $request, $prodi_id)
    {
        // dd($prodi_id);
        return Jurusan::where('prodi_id', $prodi_id)->get();
    }

    public function Prodi()
    {
        return Prodi::all();
    }
}
