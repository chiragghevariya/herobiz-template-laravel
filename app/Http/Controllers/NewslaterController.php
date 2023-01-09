<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class NewslaterController extends Controller
{
    //

    public function index(){

        return view('admin.newslater.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Newslater::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('email', function ($data) {
                return $data->email;
            })

            ->addColumn('action', function ($data) {

                $string = ' <a href="javascript:void(0)" data-link="' . route('newslater.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a>  <a href="'.route('newslater.view',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-eye"></i> </a>';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'email', 'action'])
            ->make(true);
    }

    public function view($id){

         $editdata = \App\Models\Newslater::where('id',Crypt::decrypt($id))->first();

        return view('admin.newslater.view',compact('editdata'));
    }

    public function delete($id){

        $obj = \App\Models\Newslater::where('id',Crypt::decrypt($id))->first();

        $obj->delete();

        return response()->json(['status' => 0]);
    }
}
