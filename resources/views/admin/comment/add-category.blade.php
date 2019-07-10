@extends('admin.master')
@section('title', 'Add Category')
@section('mainContent')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Category</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="well">
            <form action="{{ route('store')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-1">Category Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="category_name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-1">Category description</label>
                    <div class="col-sm-6">
                        <textarea name="category_description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2  col-sm-offset-1">Publication Status</label>
                    <div class="col-sm-6">
                        <label><input type="radio" name="publication_status" value="1">Published</label>
                        <label><input type="radio" name="publication_status" value="0">Unpublished</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2  col-sm-offset-1"></label>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('Add Category') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

