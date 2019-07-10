@extends('admin.master')
@section('title', 'Add Blog')
@section('mainContent')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Blog</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="well">
            <form action="{{ route('update-blog')}}" method="POST" class="form-horizontal" name="editBlog" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-sm-3">Category name</label>
                    <div class="col-sm-8">
                        <select name="category_id" class="form-control">
                            <option>Select Category</option>
                            @foreach($category_info as $v_category)
                            <option value="{{ $v_category->id }}">{{ $v_category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Blog title</label>
                    <div class="col-sm-8">
                        <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control">
                        <input type="hidden" name="id" value="{{ $blog->id }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Blog short description</label>
                    <div class="col-sm-8">
                        <textarea name="blog_short_description" rows="3" class="form-control">
                            {{ $blog->blog_short_description }}
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Blog long description</label>
                    <div class="col-sm-8">
                        <textarea name="blog_long_description" id="editor">
                            {{ $blog->blog_long_description }}
                        </textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Blog Image</label>
                    <div class="col-sm-8">
                        <img src="{{ asset($blog->blog_image) }}" height="80" width="80" /><br>
                        <input type="hidden" name="old_blog_image" value="{{($blog->blog_image) }}"><br>
                        <input type="file" name="blog_image" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3">Publication status</label>
                    <div class="col-sm-8">
                        <label><input type="radio" name="publication_status" value="1">Published</label>
                        <label><input type="radio" name="publication_status" value="0">Unpublished</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-lg btn-success btn-block">{{ __('Add Blog') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.forms['editBlog'].elements['publication_status'].value = {{$blog->publication_status}};
    document.forms['editBlog'].elements['category_id'].value = {{$blog->category_id}};
</script>
@endsection