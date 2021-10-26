<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailRuangan;

class DetailsLabController extends Controller
{
    public function index(DetailRuangan $DetailRuangan)
    {
        $slug = DetailRuangan::with(['Gallery','prodi'])->findOrFail($DetailRuangan->id);
        return view('pages.user.DetailsLab',[
            'slug'  => $slug
        ]);
    }
}
