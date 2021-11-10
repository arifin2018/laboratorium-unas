<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProdiRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ProdiRequestRequest;

class ProdiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = ProdiRequest::with(['prodi'])->get();
        // dd($data);
        if ($request->ajax()) {
            $data = Prodi::all();
            return DataTables::of($data)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                    <a href="'.route('prodi.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('prodi.destroy', $item->id).'" method="POST" class="mx-1">
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
        $start = microtime(true);
        usleep(250);
        $end = microtime(true);
        dd(($start - $end) * 1000);
        return view('pages.admin.prodi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdiRequest $request)
    {
        $data = $request->all();
        Prodi::create($data);
        return redirect()->route('prodi.index');
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
        $data = Prodi::findOrFail($id);
        $prodi = Prodi::all();
        return view('pages.admin.prodi.edit',[
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
    public function update(ProdiRequest $request, $id)
    {
        $data = $request->all();
        $item = Prodi::findOrFail($id);
        $item->update($data);
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Prodi::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
