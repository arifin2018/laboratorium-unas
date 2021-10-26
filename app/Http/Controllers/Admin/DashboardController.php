<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\DetailRuangan;
use App\Models\transaksi;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('roles', 'admin')->get();
        $mahasiswa = User::where('roles', 'mahasiswa')->get();
        $laboratorium = DetailRuangan::all();
        $transaksi = transaksi::all();
        return view('pages.admin.dashboard',[
            'admin' => $admin,
            'mahasiswa' => $mahasiswa,
            'laboratorium' => $laboratorium,
            'transaksi' => $transaksi
        ]);
    }

}
