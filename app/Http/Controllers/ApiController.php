<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class ApiController extends Controller {

    public function allCategories() {
        $categories = Category::get();
        return $categories;
    }
    
    public function allPublishedCategories() {
        $categories = Category::where('publication_status', 1)->get();
        return $categories;
    }

    public function allPublishedBlogs() {
        $blogs = Blog::where('publication_status', 1)->get();
        return $blogs;
    }

    public function blogByCategoryId($id) {
        $blogs = Blog::where('category_id', $id)->where('publication_status', 1)->get();
        return $blogs;
    }

    public function blogDetails($id) {
        $blog = Blog::find($id);
        $blog->hit_count = $blog->hit_count + 1;
        $blog->save();
        $blogs = Blog::find($id);
        return $blogs;
    }
    
    public function login() {
        echo 'Hello API LARAVEL';
    }

}
