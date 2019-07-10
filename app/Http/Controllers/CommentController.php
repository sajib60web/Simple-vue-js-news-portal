<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use DB;

class CommentController extends Controller {

    public function manageComments() {
        return view('admin.comment.manage-comment', [
            'comments' => DB::table('comments')
                    ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                    ->select('comments.*', 'visitors.first_name', 'visitors.last_name')
                    ->orderBy('comments.id', 'DESC')
                    ->get()
        ]);
    }

    public function publishedComment($id) {
        DB::table('comments')
                ->where('id', $id)
                ->update(['publication_status' => 1]);
        return redirect()->back()->with('message', 'Comment Published Successfully');
    }

    public function unpublishedComment($id) {
        DB::table('comments')
                ->where('id', $id)
                ->update(['publication_status' => 0]);
        return redirect()->back()->with('message', 'Comment Unpublished Successfully');
    }

    public function newComment(Request $request) {
        $comment = new Comment();
        $comment->visitor_id = $request->visitor_id;
        $comment->blog_id = $request->blog_id;
        $comment->blog_id = $request->blog_id;
        $comment->blog_title = $request->blog_title;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/blog-details/' . $request->blog_id . '/' . $request->blog_title)->with('message', 'Category Insert Successfully');
    }

}
