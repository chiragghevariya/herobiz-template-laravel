<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\Datatables\Datatables;
use Crypt;

class BlogController extends Controller
{
    //
    public function index(){

        return view('admin.blog.index');
    }


    public function anydata(Request $request)
    {

        $sql = \App\Models\Blog::select("*");


        return Datatables::of($sql)

            ->editColumn('id', function ($data) {
                return $data->id;
            })

            ->editColumn('image', function ($data) {
                return '<img src="' . \asset('uploads/blog') . '/' . $data->image . '">';
            })

            ->editColumn('title', function ($data) {
                return $data->title;
            })

            ->editColumn('long_description', function ($data) {
                return $data->long_description;
            })

            ->editColumn('date', function ($data) {
                return $data->date;
            })

            ->editColumn('name', function ($data) {
                return $data->name;
            })

            ->editColumn('categories_id', function ($data) {

                $categories = \App\Models\Categories::where('id',$data->categories_id)->first();

                if($categories != null){

                    return $categories->name;
                }else{
                    "-";
                }

            })

            ->editColumn('tag_id', function ($data) {

                $tag = \App\Models\Tag::where('id',$data->tag_id)->first();

                if($tag != null){

                    return $tag->name;
                }else{
                    "-";
                }            })

            ->addColumn('status', function ($data) {
                return getStatusIcon($data);
            })

            ->addColumn('action', function ($data) {

                $string = '<a href="'.route('blog.edit',Crypt::encrypt($data->id)).'" class="btn btn-primary btn-sm"> <i class="mdi mdi-table-edit"></i> </a> <a href="javascript:void(0)" data-link="' . route('blog.delete',Crypt::encrypt($data->id)) . '" class="btn btn-danger btn-sm delete"> <i class="mdi mdi-delete-forever"></i></a> ';


                return $string;
            })
            ->filter(function ($query) use ($request) {
            })
            ->rawColumns(['id', 'image', 'title', 'long_description','date', 'name', 'categories_id', 'tag_id','status','action'])
            ->make(true);
    }

    public function SingleStatusChange(Request $request)
    {

        $l = \App\Models\Blog::where('id', \Crypt::decrypt($request->id))->first();
        if ($l != NULL) {

            if ($l->status == 1) {
                $l->status = \App\Models\Blog::STATUS_INACTIVE;
            } else {
                $l->status = \App\Models\Blog::STATUS_ACTIVE;
            }
            $l->save();
            return response()->json(['status' => $l->status]);
        }
    }

    public function create(){

        return view('admin.blog.addedit');
    }


    public function store(Request $request){

        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'long_description' => 'required',
            'date' => 'required',
            'name' => 'required',
            'categories_id' => 'required',
            'tag_id' => 'required',
            'status' => 'required',
        ]);

        $obj = new \App\Models\Blog;
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->name = $request->name;
        $obj->categories_id = $request->categories_id;
        $obj->tag_id = $request->tag_id;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

           //  @unlink('uploads/blog/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function edit($id){

        $editdata = \App\Models\Blog::where('id',Crypt::decrypt($id))->firstOrfail();

        return view('admin.blog.addedit',compact('editdata'));
    }

    public function update(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'long_description' => 'required',
            'description' => 'required',
            'name' => 'required',
            'name' => 'required',
            'categories_id' => 'required',
            'tag_id' => 'required',
            'status' => 'required',
        ]);

        $obj =  \App\Models\Blog::where('id',Crypt::decrypt($id))->first();
        $obj->title = $request->title;
        $obj->long_description = $request->long_description;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->name = $request->name;
        $obj->categories_id = $request->categories_id;
        $obj->tag_id = $request->tag_id;
        $obj->status = $request->status;
        $obj->slug = makeslug($request->title,'-');

        $img = $request->file('image');

        if ($request->hasFile('image')) {

             @unlink('uploads/blog/' . $obj->image);
            $filename = rand() .'.'. $img->getClientOriginalExtension();
            $img->move('uploads/blog/', $filename);

            $obj->image = $filename;


        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete($id){

        $obj = \App\Models\Blog::where('id',Crypt::decrypt($id))->first();
        @unlink('uploads/blog/' . $obj->image);

        $obj->delete();

        return response()->json(['status' => 0]);
    }



}
