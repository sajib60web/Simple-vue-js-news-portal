@extends('admin.master')
@section('title', 'Manage Comment')
@section('mainContent')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Comment</h1>
    </div>

    <!-- /.col-lg-12 -->
</div>
@if(Session::has('message'))
<div class="alert alert-success">
    <a class="close" data-dismiss="alert">×</a>
    <strong>{!!Session::get('message')!!}</strong>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List Category Table
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Visitor name</th>
                            <th>Blog title</th>
                            <th>Comment</th>
                            <th>Publication status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($count = 1)
                        @foreach($comments as $comment)
                        <tr class="odd gradeX">
                            <td>{{ $count++ }}</td>
                            <td>{{ $comment->first_name.' '.$comment->last_name }}</td>
                            <td style="width: 20%;">{{ $comment->blog_title }}</td>
                            <td style="width: 30%;">{{ $comment->comment }}</td>
                            <td class="center">
                                @if ($comment->publication_status === 1)
                                <span class="btn btn-success">Published</span>
                                @else
                                <span class="btn btn-danger">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                @if($comment->publication_status == 0)
                                <a class="btn btn-success" href="{{route('published-comment',['id'=>$comment->id])}}">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                </a>
                                @else
                                <a class="btn btn-danger" href="{{route('unpublished-comment',['id'=>$comment->id])}}">
                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                </a>
                                @endif
                                <a class="btn btn-info" href="{{route('edit-comment',['id'=>$comment->id])}}">

                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('delete-comment',['id'=>$comment->id])}}" onclick="return confirm('Are You Sure to Delete');">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

