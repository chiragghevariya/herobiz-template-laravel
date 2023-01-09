<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class PortfolioController extends Controller
{
    //
    public function index(){

        return view('admin.portfolio.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Portfolio::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/portfolio') . '/' . $data->image . '">';
            })


            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('long_description', function ($data) {
                return $data->long_description;
            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('portfolio.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('portfolio.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'image', 'name', 'title', 'long_description','status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Portfolio::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Portfolio::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Portfolio::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.portfolio.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'title' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Portfolio;
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

           //  @unlink('uploads/portfolio/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/portfolio/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Portfolio::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.portfolio.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Portfolio::where('id',Crypt::decrypt($id))->first();
        $obj->name = $request->name;
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/portfolio/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/portfolio/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Portfolio::where('id',Crypt::decrypt($id))->first();
        @unlink('uploads/portfolio/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }



}
