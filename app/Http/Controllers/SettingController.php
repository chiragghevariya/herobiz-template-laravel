<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class SettingController extends Controller
{
    //

    public function index()
    {

        $editdata = \App\Models\Setting::first();

        return view('admin.setting.edit', compact('editdata'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'website_name' => 'required',
            'logo' => 'required',
            'copyright' => 'required',
            'video_url' => 'required',
            'map_url' => 'required',
            'location' => 'required',
            'email' => 'required',
            'number' => 'required',
            'status' => 'required',
        ]);


        $obj =  \App\Models\Setting::where('id', Crypt::decrypt($id))->first();
        $obj->website_name = $request->website_name;
        $obj->logo = $request->logo;
        $obj->copyright = $request->copyright;
        $obj->map_url = $request->map_url;
        $obj->video_url = $request->video_url;
        $obj->location = $request->location;
        $obj->email = $request->email;
        $obj->number = $request->number;
        $obj->status = $request->status;

        $img = $request->file('favicon_logo');

        if ($request->hasFile('favicon_logo')) {

            @unlink('uploads/setting/' . $obj->favicon_logo);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/setting/', $filename);

            $obj->favicon_logo = $filename;
        }
        $obj->save();

        return response()->json(['status' => 1]);
    }

}
