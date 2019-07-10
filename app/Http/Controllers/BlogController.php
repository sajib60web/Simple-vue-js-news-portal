<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use Session;
use Redirect;
use DB;

class BlogController extends Controller {

    public function createBlog() {
        $category = Category::where('publication_status', 1)->get();
        return view('admin.blog.add-blog', compact('category'));
    }

    public function storeBlog(Request $request) {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['publication_status'] = $request->publication_status;

        $blog_image = $request->file('blog_image');
        if ($blog_image) {
            $image_name = str_random(10);
            $text = strtolower($blog_image->getClientOriginalName());
            $image_full_name = $image_name . '.' . $text;
            $uploadPath = 'admin/blog_image/';
            $image_url = $uploadPath . $image_full_name;
            $success = $blog_image->move($uploadPath, $image_full_name);
            if ($success) {
                $data['blog_image'] = $image_url;
                DB::table('blogs')->insert($data);
                return redirect('/manage-blog')->with('message', 'Blog Insert Successfully');
            } else {
                $data['blog_image'] = $image_url;
                DB::table('blogs')->insert($data);
                return redirect('/manage-blog')->with('message', 'Blog Not Insert');
            }
        }
    }

    public function manageBlog() {
        $categories = DB::table('categories')->get();
        $blogs = DB::table('blogs')
                ->join('categories', 'blogs.category_id', '=', 'categories.id')
                ->select('blogs.*', 'categories.category_name')
                ->get();
        return view('admin.blog.manage-blog', compact('blogs'));
    }

    public function publishedBlog($id) {
        DB::table('blogs')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return redirect()->back()->with('message', 'blogs Published Successfully');
    }

    public function unpublishedBlog($id) {
        DB::table('blogs')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return redirect()->back()->with('message', 'blogs Unpublished Successfully');
    }

    public function editBlog($id) {
        $category_info = Category::where('publication_status', 1)->get();
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog', compact('category_info', 'blog'));
    }

    public function updateBlog(Request $request) {
        $data = array();
        $id = $request->id;
        $data['category_id'] = $request->category_id;
        $data['blog_title'] = $request->blog_title;
        $data['blog_short_description'] = $request->blog_short_description;
        $data['blog_long_description'] = $request->blog_long_description;
        $data['publication_status'] = $request->publication_status;

        $blog_image = $request->file('blog_image');
        if ($blog_image) {
            $image_name = str_random(10);
            $text = strtolower($blog_image->getClientOriginalName());
            $image_full_name = $image_name . '.' . $text;
            $uploadPath = 'admin/blog_image/';
            $image_url = $uploadPath . $image_full_name;
            $success = $blog_image->move($uploadPath, $image_full_name);
            if ($success) {
                $data['blog_image'] = $image_url;
                DB::table('blogs')
                        ->where('id', $id)
                        ->update($data);
                unlink($request->old_blog_image);
                return redirect('/manage-blog')->with('message', 'Product Updated successfully');
            } else {
                $data['blog_image'] = $image_url;
                DB::table('blogs')
                        ->where('id', $id)
                        ->update($data);
                return redirect('/manage-blog')->with('message', 'Product Updated successfully');
            }
        }
        return redirect('/manage-blog')->with('message', 'Product Updated successfully');
    }

    public function deleteBlog($id) {
        $image_path = DB::table('blogs')
                ->select('blog_image')
                ->where('id', $id)
                ->first();

        $file_path = $image_path->blog_image;
        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            dd('File does not exists.');
        }
        DB::table('blogs')
                ->where('id', $id)
                ->delete();
        return redirect()->back()->with('message', 'Blog Delete Successfully');
    }

}
