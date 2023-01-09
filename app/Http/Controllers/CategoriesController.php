<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class CategoriesController extends Controller
{
    //

    public function index(){

        return view('admin.categories.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Categories::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('categories.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('categories.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'name', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Categories::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Categories::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Categories::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.categories.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Categories;
        $obj->name = $request->name;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Categories::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.categories.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Categories::where('id',Crypt::decrypt($id))->first();
        $obj->name = $request->name;
        $obj->status = $request->status;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Categories::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
