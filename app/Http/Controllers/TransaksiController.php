<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\DetailRuangan;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index(DetailRuangan $DetailRuangan)
    {
        $auth = Auth::user()->prodi_id;
        if ($auth == $DetailRuangan->prodi_id) {
            return view('pages.user.Transaksi',[
                'DetailRuangan' => $DetailRuangan
            ]);
        }
        else {
            Alert::error('Error', 'Anda melakukan pemesanan laboratorium pada prodi lain,silahkan pilih laboratorium sesuai dengan prodi anda');
            return redirect()->back();
        }


    }

    public function transaksi(Request $request,DetailRuangan $DetailRuangan)
    {
        $data = $request->all();
        $user = Auth::user()->transaksi;
        for ($i=0; $i < count($user); $i++) {
            if ($user[$i]->status != 'Expired') {
                Alert::error('Error', 'Anda sudah memesan silahkan pesan lagi ketika status expired');
                return redirect()->back();
            }
        }
        if (substr($request->waktu, -5, 2) >= substr($request->waktu_selesai, -5, 2)) {
            Alert::error('Error', 'Salah memilih jam waktu, silahkan pilih yang tepat pada waktu selesai mininal 1 jam');
            return redirect()->back();
        }
        $get_id = transaksi::create($data);
        $transaksi = transaksi::findOrFail($get_id->id);
        $transaksiWaktu = transaksi::where('waktu', $transaksi->waktu)->get();

        $jumlah = (transaksi::where([
            ['waktu', $request->waktu],
            ['detail_ruangans_id', $request->detail_ruangans_id]
        ]))->count();

        $transaksiDetail = TransaksiDetail::where([
            ['detail_ruangans_id', $transaksi->detail_ruangans_id],
            ['transaksi_waktu', $transaksi->waktu]
        ])->first();

        if (isset($transaksiDetail) == true) {
            $transaksiDetail->jumlah = $transaksiWaktu->count();
            $transaksiDetail->save();
            $transaksi->transaksi_details_id = $transaksiDetail->id;
            $transaksi->save();
        }else{
            $get_id_transaksiDetail = TransaksiDetail::create([
                'detail_ruangans_id' => $DetailRuangan->id,
                'transaksi_waktu' => $data['waktu'],
                'jumlah' => $jumlah
            ]);
            $transaksi->transaksi_details_id = $get_id_transaksiDetail->id;
            $transaksi->save();
        }

        return redirect()->route('transaksi-success');
    }

    public function status()
    {
        $datas = transaksi::with(['user','detail_ruangans'])->where('users_id', Auth::user()->id)->get();
        // dd($datas);
        return view('pages.user.Status',[
            'datas' => $datas
        ]);
    }

    public function success()
    {
        return view('pages.user.Berhasil');
    }
}
