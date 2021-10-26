<?php

namespace App\Http\Controllers\Admin;

use App\Models\Berita;
use App\Models\Category;
use App\Models\VisiMisi;
use Illuminate\Support\Str;
use App\Models\DetailRuangan;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisiMisiRequest;

class VisiMisiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = VisiMisi::all();
        return view('pages.admin.visi-misi.index',[
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisiMisiRequest $request)
    {
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
        $item = VisiMisi::findOrFail($id);
        return view('pages.admin.visi-misi.edit',[
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisiMisiRequest $request, $id)
    {
        $data = $request->all();
        $item = VisiMisi::findOrFail($id);
        $item->update($data);
        return redirect()->route('visi-misi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
