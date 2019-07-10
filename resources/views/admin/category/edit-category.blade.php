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
            <form action="{{ route('update-category')}}" method="POST" name="editCategory" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-1">Category Name</label>
                    <div class="col-sm-6">
                        <input type="text" name="category_name" value="{{ $category_info->category_name }}" class="form-control">
                        <input type="hidden" name="category_id" value="{{ $category_info->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-offset-1">Category description</label>
                    <div class="col-sm-6">
                        <textarea name="category_description" class="form-control">
                            {{ $category_info->category_description }}
                        </textarea>
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
<script type="text/javascript">
    document.forms['editCategory'].elements['publication_status'].value = {{$category_info->publication_status}};
</script>
@endsection



