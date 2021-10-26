<?php

namespace App\Http\Controllers\Admin;


use App\Models\Berita;
use App\Models\BeritaImage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ImagesBeritaRequest;

class ImagesBeritaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = BeritaImage::with(['Berita'])->get();
            return DataTables::of($data)
            ->addColumn('action', function($item){
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger">Delete</a>';
                return '<div class="d-flex">
                    <a href="'.route('images-berita.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('images-berita.destroy', $item->id).'" method="POST" class="mx-1">
                        '.csrf_field().method_field('delete').'
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>
                ';
            })
            ->addColumn('images', function($item){
                return $item->images ? '<img src="'.Storage::url($item->images).'" alt="Images-Berita" height="150" width="200"/>' : '';
            })
            ->rawColumns(['action', 'images'])
            ->make();
        }
        return view('pages.admin.images-berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Berita::all();
        return view('pages.admin.images-berita.create',[
            'datas' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImagesBeritaRequest $request)
    {
        $data = $request->all();
        $data['images'] = $request->file('images')->store('assets/image-berita', 'public');
        BeritaImage::create($data);
        return redirect()->route('images-berita.index');
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
        $item = BeritaImage::findOrFail($id);
        // $datas = Berita::all();
        $datas = Berita::all();
        $selectBerita = Berita::whereHas('BeritaImage', function($q) use($item){
            $q->where('id' , '=' , $item->id);
        })->get();
        return view('pages.admin.images-berita.edit',[
            'item' => $item,
            'datas' => $datas,
            'selectBerita' => $selectBerita
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImagesBeritaRequest $request, $id)
    {
        $data = $request->all();
        $item = BeritaImage::findOrFail($id);
        if (isset($data['images'])) {
            Storage::disk('public')->delete($item->images);
            $data['images'] = $request->file('images')->store('assets/image-berita', 'public');
        }
        $item->update($data);
        return redirect()->route('images-berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = BeritaImage::findOrFail($id);
        Storage::disk('public')->delete($data->images);
        $data->delete();
        return redirect()->back();
    }

}
