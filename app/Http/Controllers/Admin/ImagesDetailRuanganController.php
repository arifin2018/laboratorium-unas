<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DetailRuangan;
use App\Models\GalleryRuangan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ImagesDetailRuanganRequest;

class ImagesDetailRuanganController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = GalleryRuangan::with(['detail_ruangan'])->get();
        if (request()->ajax()) {

            $query = GalleryRuangan::with(['detail_ruangan'])->get();

            return DataTables::of($query)
            ->addColumn('action', function($item){
                return '<div class="d-flex">
                    <a href="'.route('images-detail-ruangan.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('images-detail-ruangan.destroy', $item->id).'" method="POST" class="mx-1">
                    '.method_field('delete').csrf_field().'
                    <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </div>';
            })
            ->addColumn('images', function($item){
                return $item->images ? '<img src="'.Storage::url($item->images).'" alt="Images-Ruangan" height="150" width="200"/>' : '';
            })
            ->rawColumns(['action','images'])
            ->make();
        }
        return view('pages.admin.images-detail-ruangan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = DetailRuangan::all();
        return view('pages.admin.images-detail-ruangan.create',[
            'datas' => $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImagesDetailRuanganRequest $request)
    {
        $data = $request->all();
        $data['images'] = $request->file('images')->store('assets/GalleryRuangan', 'public');
        GalleryRuangan::create($data);
        return redirect()->route('images-detail-ruangan.index');
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
        $data = GalleryRuangan::findOrFail($id);
        $datas = DetailRuangan::all();
        $DetailRuangan = DetailRuangan::whereHas('Gallery', function($q) use($data){
            $q->where('detail_ruangans_id' , '=' , $data->detail_ruangans_id);
        })->get();
        return view('pages.admin.images-detail-ruangan.edit',[
            'data' => $data,
            'datas' => $datas,
            'DetailRuangan' => $DetailRuangan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImagesDetailRuanganRequest $request, $id)
    {
        $data = $request->all();
        $item = GalleryRuangan::findOrFail($id);
        if (isset($data['images'])) {
            Storage::disk('public')->delete($item->images);
            $data['images'] = $request->file('images')->store('assets/GalleryRuangan', 'public');
        }
        $item->update($data);
        return redirect()->route('images-detail-ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = GalleryRuangan::findOrFail($id);
        Storage::disk('public')->delete($data->images);
        $data->delete();
        return redirect()->back();
    }

}
