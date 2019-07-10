@extends('admin.master')
@section('title', 'List Category')
@section('mainContent')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">List Category</h1>
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
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($count = 1)
                        @foreach($categories as $category)
                        <tr class="odd gradeX">
                            <td>{{ $count++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td style="width: 40%;">{{ $category->category_description }}</td>
                            <td class="center">
                                @if ($category->publication_status === 1)
                                <span class="btn btn-success">Published</span>
                                @else
                                <span class="btn btn-danger">Unpublished</span>
                                @endif
                            </td>
                            <td>
                                @if($category->publication_status == 0)
                                <a class="btn btn-success" href="{{route('published-category',['id'=>$category->id])}}">
                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                </a>
                                @else
                                <a class="btn btn-danger" href="{{route('unpublished-category',['id'=>$category->id])}}">
                                    <i class="glyphicon glyphicon-thumbs-down"></i>
                                </a>
                                @endif
                                <a class="btn btn-info" href="{{route('edit-category',['id'=>$category->id])}}">

                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <a class="btn btn-danger" href="{{route('delete-category',['id'=>$category->id])}}" onclick="return confirm('Are You Sure to Delete');">
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

