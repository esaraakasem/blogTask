<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogsController extends Controller
{




    public function index()
    {

        $blogs = Blog::all();

        return view('welcome', compact("blogs"));


    }


    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'description' => 'required'
        ]);

        $data = $request->all();
        $blog = new Blog();


        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->user_id = auth()->id();

        $blog->save();


        return redirect('/');


    }


    public function importBlogs()
    {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sq1-api-test.herokuapp.com/posts');
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($ch), true);
        $err = curl_error($ch);
        $blogs = [];
        if ($err == '') {
            $blogs = $response['data'];

            curl_close($ch);

        }


        return view('importedBlogs', compact("blogs"));

    }


    public function sort(Request $request)
    {

       $type=  $request->input('type');
       if($type=='all')
       { $blogs = Blog::orderBy('created_at', 'desc')->get();
           return view('welcome', compact("blogs"));}


       elseif ($type=='myBlogs' && auth()->check())
           $blogs = Blog::where('user_id',auth()->id())->orderBy('created_at', 'desc')->get();

        return view('myBlogs', compact("blogs"));


    }


    public function myBlogs(){
            $blogs=Blog::where("user_id",auth()->id())->get();


            return view("myBlogs",compact("blogs"));


    }
}
