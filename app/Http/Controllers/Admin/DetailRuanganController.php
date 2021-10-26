<?php

namespace App\Http\Controllers\Admin;

use App\Models\D;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailRuangan;
use App\Models\DashboardCaraosel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\DetailRuanganRequest;
use App\Models\Prodi;

class DetailRuanganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = DetailRuangan::with(['prodi'])->get();
        // dd($data);
        if ($request->ajax()) {
            $data = DetailRuangan::with(['prodi']);
            return DataTables::of($data)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                    <a href="'.route('detail-ruangan.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('detail-ruangan.destroy', $item->id).'" method="POST" class="mx-1">
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
        return view('pages.admin.detail-ruangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('pages.admin.detail-ruangan.create',[
            'prodi' => $prodi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailRuanganRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        DetailRuangan::create($data);
        return redirect()->route('detail-ruangan.index');
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
        $data = DetailRuangan::findOrFail($id);
        $prodi = Prodi::all();
        return view('pages.admin.detail-ruangan.edit',[
            'data' => $data,
            'prodi' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailRuanganRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = DetailRuangan::findOrFail($id);
        $item->update($data);
        return redirect()->route('detail-ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DetailRuangan::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
