<?php

namespace App\Http\Controllers\Admin;

use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = transaksi::with(['user','detail_ruangans'])->get();
            return DataTables::of($data)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                    <a href="'.route('transaksi.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('transaksi.destroy', $item->id).'" method="POST" class="mx-1">
                        '.csrf_field().method_field('delete').'
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.admin.transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = transaksi::with(['user','detail_ruangans'])->findOrFail($id);
        return view('pages.admin.transaksi.edit',[
            'data' => $data
        ]);
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
        $data = $request->all();
        $transaksi = transaksi::findOrFail($id);
        $transaksi->status = $data['status'];
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = transaksi::with('transaksi_details')->findOrFail($id);
        $transaksiDetail = TransaksiDetail::findOrFail($data->transaksi_details_id);
        // $transaksiDetailQuery = $transaksiDetail::has('transaksi')->get();
        $dataQuery = $data::has('transaksi_details')->get();
        $data->delete();
        $transaksiDetail->jumlah = count($dataQuery);
        // $transaksiDetail->jumlah = isset($transaksiDetailQuery) == true ? $transaksiDetailQuery :  NULL;
        $transaksiDetail->save();
        // dd($transaksiDetail->jumlah);
        if ($transaksiDetail->jumlah <= 1) {
            $transaksiDetail->delete();
        }

        return redirect()->back();
    }
}
