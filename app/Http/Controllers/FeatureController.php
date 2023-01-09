<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class FeatureController extends Controller
{
    //

    public function index(){

        return view('admin.feature.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Feature::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/feature') . '/' . $data->image . '">';
            })

            ->editColumn('icon', function ($data) {
                return $data->icon;
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('feature.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-long_description="' . route('feature.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id','image', 'icon', 'title', 'status', 'action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Feature::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Feature::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Feature::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.feature.addedit');
    }

    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'icon' => 'required',
            'title' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Feature;
        $obj->icon = $request->icon;
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            // @unlink('uploads/feature/' . $be->intro_bg2);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/feature/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Feature::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.feature.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Feature::where('id',Crypt::decrypt($id))->first();
        $obj->icon = $request->icon;
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/feature/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/feature/', $filename);

            $obj->image = $filename;
        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Feature::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
