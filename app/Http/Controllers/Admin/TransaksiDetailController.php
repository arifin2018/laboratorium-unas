<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TransaksiDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = TransaksiDetail::with(['detail_ruangan'])->get();
            return DataTables::of($data)
            ->addColumn('action', function($item){
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger">Delete</a>';
                return '<div class="d-flex">
                    <a href="'.route('transaksi-detail.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('transaksi-detail.destroy', $item->id).'" method="POST" class="mx-1">
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
        return view('pages.admin.transaksi-detail.index');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TransaksiDetail::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
