<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use DB;

class WelcomeController extends Controller {

    public function index() {
        $popularBlogs = Blog::orderBy('hit_count','DESC')->get();
        $blogs = Blog::where('publication_status', 1)->get();
        return view('front-end.maiContent', compact('blogs', 'popularBlogs'));
    }

    public function category($id, $name) {
        return view('front-end.category-blog', [
            'categories' => Category::where('publication_status', 1)->get(),
            'blogs' => Blog::where('category_id', $id)->where('publication_status', 1)->get()
        ]);
    }

    public function blogDetails($id, $name) {
        $blogs = Blog::find($id);
        $blogs->hit_count = $blogs->hit_count + 1;
        $blogs->save();

        return view('front-end.blog-details', [
            'categories' => Category::where('publication_status', 1)->get(),
            'blogs' => Blog::find($id),
            'comments' => DB::table('comments')
                    ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                    ->select('comments.*', 'visitors.first_name', 'visitors.last_name')
                    ->where('comments.blog_id', $id)
                    ->where('comments.publication_status', 1)
                    ->orderBy('comments.id', 'DESC')
                    ->get()
        ]);
    }

    public function about() {
        return view('front-end.about');
    }

    public function service() {
        return view('front-end.service');
    }

    public function contact() {
        return view('front-end.contact');
    }

}
