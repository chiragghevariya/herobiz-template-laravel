<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class LogoController extends Controller
{
    //
    public function index(){

        return view('admin.logo.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Logo::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/logo') . '/' . $data->image . '">';
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('logo.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('logo.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'image', 'status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Logo::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Logo::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Logo::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.logo.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Logo;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

           //  @unlink('uploads/logo/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/logo/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Logo::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.logo.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'status' => 'required',
        ]);

        $obj =  \App\Models\Logo::where('id',Crypt::decrypt($id))->first();
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/logo/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/logo/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Logo::where('id',Crypt::decrypt($id))->first();
        @unlink('uploads/logo/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }



}
