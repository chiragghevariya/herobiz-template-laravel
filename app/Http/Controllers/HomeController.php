<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class HomeController extends Controller
{
    //
    public function index()
    {

        $heading = \App\Models\Heading::first();
        $getsetting = \App\Models\Setting::first();
        $getservice = \App\Models\Service::where('status', 1)->take(4)->get();
        $service = \App\Models\Service::where('status', 1)->get();
        $testimonial = \App\Models\Testimonial::where('status', 1)->get();
        $team = \App\Models\Team::where('status', 1)->get();
        $feature = \App\Models\Feature::where('status', 1)->get();
        $getfeature = \App\Models\Feature::where('status', 1)->take(3)->get();
        $pricing = \App\Models\Pricing::where('status', 1)->get();
        $faq = \App\Models\Faq::where('status', 1)->get();
        $logo = \App\Models\Logo::where('status', 1)->get();
        $portfolio = \App\Models\Portfolio::where('status', 1)->take(4)->get();
        $getportfolio = \App\Models\Portfolio::where('status', 1)->get();
        $blog = \App\Models\Blog::where('status', 1)->take(3)->get();


        return view('front.home', compact('heading', 'service', 'getservice', 'testimonial', 'faq', 'pricing', 'getsetting', 'team', 'feature', 'logo', 'getfeature', 'portfolio', 'getportfolio', 'blog'));
    }

    public function contactstore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $obj = new \App\Models\Contact;
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->subject = $request->subject;
        $obj->message = $request->message;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function newslaterstore(Request $request)
    {

        $request->validate([
            'nemail' => 'required',
        ]);

        $obj = new \App\Models\Newslater;
        $obj->email = $request->nemail;

        $obj->save();

        return response()->json(['status' => 1]);
    }

    public function portfolio_details($slug)
    {

        $portfolio = \App\Models\Portfolio::where('slug', $slug)->first();
        $heading = \App\Models\Heading::first();

        return view('front.portfolio-details', compact('portfolio', 'heading'));
    }

    public function blog()
    {

        $heading = \App\Models\Heading::first();
        $blog = \App\Models\Blog::where('status', 1)->get();
        $categories = \App\Models\Categories::where('status', 1)->get();
        $tag = \App\Models\Tag::where('status', 1)->get();
        $posts = \App\Models\Blog::orderBy('date', 'DESC')->get();

        return view('front.blog', compact('heading', 'blog', 'categories', 'tag', 'posts'));
    }

    public function blog_detail($slug)
    {

        $heading = \App\Models\Heading::first();
        $blog = \App\Models\Blog::where('slug', $slug)->first();
        $categories = \App\Models\Categories::where('status', 1)->get();
        $tag = \App\Models\Tag::where('status', 1)->get();
        $posts = \App\Models\Blog::orderBy('date', 'DESC')->get();

        return view('front.blog-details', compact('heading', 'blog', 'categories', 'tag', 'posts'));
    }
}
