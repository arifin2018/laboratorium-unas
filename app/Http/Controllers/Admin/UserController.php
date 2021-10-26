<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $datas = User::with(['transaksi','prodi','jurusan'])->first();
        // dd($datas);
        if ($request->ajax()) {
            $data = User::with(['transaksi','prodi','jurusan']);
            return DataTables::of($data)
            ->addColumn('action', function($item){
                // $btn = '<a href="javascript:void(0)" class="edit btn btn-primary">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger">Delete</a>';
                return '<div class="d-flex">
                    <a href="'.route('users.edit', $item->id).'" class="btn btn-primary mx-1"><i class="fas fa-pen-square"></i></a>
                    <form action="'.route('users.destroy', $item->id).'" method="POST" class="mx-1">
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
        return view('pages.admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('users.index');
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
        $data = User::findOrFail($id);
        return view('pages.admin.users.edit',[
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
    public function update(UsersRequest $request, $id)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->back();
    }

}
