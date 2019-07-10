<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller {

    public function createCategory() {
        return view('admin.category.add-category');
    }

    public function store(Request $request) {
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect()->back()->with('message', 'Category Insert Successfully');
    }

    public function manageMategory() {
        $categories = DB::table('categories')->get();
        return view('admin.category.list-category', compact('categories'));
    }

    public function publishedCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return redirect()->back()->with('message', 'Category Published Successfully');
    }

    public function unpublishedCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return redirect()->back()->with('message', 'Category Unpublished Successfully');
    }

    public function editCategory($id) {
        $category_info = Category::find($id);
//        return $category_info;
        return view('admin.category.edit-category', compact('category_info'));
    }

    public function updateCategory(Request $request) {
        $category_up = Category::find($request->category_id);
        $category_up->category_name = $request->category_name;
        $category_up->category_description = $request->category_description;
        $category_up->publication_status = $request->publication_status;
//        return $category_up;
        $category_up->save();
        return redirect('/manage-category')->with('message', 'Category Update Successfully');
    }

    public function deleteCategory($id) {
        DB::table('categories')
                ->where('id', $id)
                ->delete();
        return redirect()->back()->with('message', 'Category Delete Successfully');
    }

}
