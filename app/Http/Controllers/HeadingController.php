<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class HeadingController extends Controller
{
    //

    public function index()
    {
        $editdata = \App\Models\Heading::first();

        return view('admin.heading.addedit', compact('editdata'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'home_title' => 'required',
            'home_description' => 'required',
            'about_title' => 'required',
            'about_description' => 'required',
            'pricing_title' => 'required',
            'pricing_description' => 'required',
            'service_title' => 'required',
            'service_description' => 'required',
            'contact_title' => 'required',
            'contact_description' => 'required',
            'portfolio_title' => 'required',
            'portfolio_description' => 'required',
            'team_title' => 'required',
            'team_description' => 'required',
            'faq_title' => 'required',
            'faq_description' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'newslater_title' => 'required',
            'newslater_description' => 'required',
            'calltoaction_title' => 'required',
            'calltoaction_description' => 'required',
            'git_title' => 'required',
            'git_description' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);


        $obj =  \App\Models\Heading::where('id', Crypt::decrypt($id))->first();
        $obj->home_title = $request->home_title;
        $obj->home_description = $request->home_description;
        $obj->about_title = $request->about_title;
        $obj->about_description = $request->about_description;
        $obj->service_title = $request->service_title;
        $obj->service_description = $request->service_description;
        $obj->pricing_title = $request->pricing_title;
        $obj->pricing_description = $request->pricing_description;
        $obj->contact_title = $request->contact_title;
        $obj->contact_description = $request->contact_description;
        $obj->portfolio_title = $request->portfolio_title;
        $obj->portfolio_description = $request->portfolio_description;
        $obj->team_title = $request->team_title;
        $obj->team_description = $request->team_description;
        $obj->faq_title = $request->faq_title;
        $obj->faq_description = $request->faq_description;
        $obj->blog_title = $request->blog_title;
        $obj->blog_description = $request->blog_description;
        $obj->newslater_title = $request->newslater_title;
        $obj->newslater_description = $request->newslater_description;
        $obj->calltoaction_title = $request->calltoaction_title;
        $obj->calltoaction_description = $request->calltoaction_description;
        $obj->git_title = $request->git_title;
        $obj->git_description = $request->git_description;
        $obj->title = $request->title;
        $obj->short_description = $request->short_description;
        $obj->long_description = $request->long_description;

        $img = $request->file('image');

        if ($request->hasFile('image')) {

            @unlink('uploads/heading/' . $obj->image);
            $filename = rand() . '.' . $img->getClientOriginalExtension();
            $img->move('uploads/heading/', $filename);

            $obj->image = $filename;
        }

        $img1 = $request->file('quote_image');

        if ($request->hasFile('quote_image')) {

            @unlink('uploads/quote/' . $obj->quote_image);
            $filename1 = rand() . '.' . $img1->getClientOriginalExtension();
            $img1->move('uploads/quote/', $filename1);

            $obj->quote_image = $filename1;
        }

        $img2 = $request->file('home_image');

        if ($request->hasFile('home_image')) {

            @unlink('uploads/heading/' . $obj->home_image);
            $filename2 = rand() . '.' . $img2->getClientOriginalExtension();
            $img2->move('uploads/heading/', $filename2);

            $obj->home_image = $filename2;
        }

        $imag3 = $request->file('faq_image');

        if ($request->hasFile('faq_image')) {

            @unlink('uploads/heading/' . $obj->faq_image);
            $filename3 = rand() . '.' . $imag3->getClientOriginalExtension();
            $imag3->move('uploads/heading/', $filename3);

            $obj->faq_image = $filename3;
        }



        $img4 = $request->file('feature_image');

        if ($request->hasFile('feature_image')) {

            @unlink('uploads/heading/' . $obj->feature_image);
            $filename4 = rand() . '.' . $img4->getClientOriginalExtension();
            $img4->move('uploads/heading/', $filename4);

            $obj->feature_image = $filename4;
        }

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function delete()
    {

        $obj = \App\Models\Heading::first();
        @unlink('uploads/heading/' . $obj->image);

        $obj->image = null;


        $obj->save();

        return response()->json(['status' => '1']);
    }

    public function delete_quote()
    {

        $obj = \App\Models\Heading::first();
        @unlink('uploads/quote/' . $obj->quote_image);

        $obj->quote_image = null;


        $obj->save();

        return response()->json(['status' => '2']);
    }

    public function home_image_delete()
    {

        $obj = \App\Models\Heading::first();
        @unlink('uploads/heading/' . $obj->home_image);

        $obj->home_image = null;


        $obj->save();

        return response()->json(['status' => '3']);
    }

    public function faq_image_delete()
    {

        $obj = \App\Models\Heading::first();
        @unlink('uploads/heading/' . $obj->faq_image);

        $obj->faq_image = null;


        $obj->save();

        return response()->json(['status' => '4']);
    }

    public function feature_image_delete()
    {

        $obj = \App\Models\Heading::first();
        @unlink('uploads/heading/' . $obj->feature_image);

        $obj->feature_image = null;


        $obj->save();

        return response()->json(['status' => '5']);
    }
}
