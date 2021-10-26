<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanRequest;
use App\Models\Prodi;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jurusan::with(['prodi']);
            return DataTables::of($data)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                    <a href="'.route('jurusan.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('jurusan.destroy', $item->id).'" method="POST" class="mx-1">
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
        return view('pages.admin.jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Jurusan::all();
        return view('pages.admin.jurusan.create',[
            'datas' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JurusanRequest $request)
    {
        $data = $request->all();
        Jurusan::create($data);
        return redirect()->route('jurusan.index');
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
        $data = Jurusan::findOrFail($id);
        $prodi = Prodi::all();
        return view('pages.admin.jurusan.edit',[
            'data' => $data,
            'prodis' => $prodi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JurusanRequest $request, $id)
    {
        $data = $request->all();
        $item = Jurusan::findOrFail($id);
        $item->update($data);
        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
