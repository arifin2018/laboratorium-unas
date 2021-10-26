<?php

namespace App\Http\Controllers\Admin;

use App\Models\D;
use Illuminate\Http\Request;
use App\Models\DashboardCaraosel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DashboardCaraoselRequest;

class DashboardCaraoselController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = DashboardCaraosel::all();
        return view('pages.admin.dashboard-caraosel.index',[
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.dashboard-caraosel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DashboardCaraoselRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/dashboard-caraosel', 'public');
        DashboardCaraosel::create($data);
        return redirect()->route('dashboard-caraosel.index');
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
        $data = DashboardCaraosel::findOrFail($id);
        return view('pages.admin.dashboard-caraosel.edit',[
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
    public function update(DashboardCaraoselRequest $request, $id)
    {
        $data = $request->all();
        $dashboardCaraosel = DashboardCaraosel::findOrFail($id);
        Storage::disk('public')->delete($dashboardCaraosel->image);
        $data['image'] = $request->file('image')->store('assets/dashboard-caraosel', 'public');
        $dashboardCaraosel->update($data);
        return redirect()->route('dashboard-caraosel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DashboardCaraosel::findOrFail($id);
        Storage::disk('public')->delete($data['image']);
        $data->delete();
        return redirect()->back();
    }

}
