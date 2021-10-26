<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\DetailRuangan;
use App\Http\Controllers\Controller;
use App\Http\Requests\BeritaRequest;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Berita::with(['Category'])->get();
        if (request()->ajax()) {
            $data = Berita::with(['Category'])->get();
            return DataTables::of($data)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                <a href="'.route('berita.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                <form action="'.route('berita.destroy', $item->id).'" method="POST" class="mx-1">
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
        return view('pages.admin.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Category::all();
        return view('pages.admin.berita.create',[
            'datas' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeritaRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        Berita::create($data);
        return redirect()->route('berita.index');
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
        $item = Berita::findOrFail($id);
        $datas = Category::all();
        return view('pages.admin.berita.edit',[
            'item' => $item,
            'datas' => $datas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeritaRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $item = Berita::findOrFail($id);
        $item->update($data);
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
