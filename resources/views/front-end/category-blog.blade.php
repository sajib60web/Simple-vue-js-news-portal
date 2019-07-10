@extends('front-end.master')
@section('title', 'Category Blog')
@section('maiContent')
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">Welcome to Our Blog</h1>
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])}}"><img class="card-img-top" src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_title }}"></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])}}">{{ $blog->blog_title }}</a>
                    </h4>
                    <p class="card-text">{{ str_limit($blog->blog_short_description, 60) }}</p>
                </div>
                <div class="card-footer">
                    <a style="float: right;" href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->blog_title])}}" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->
@endsection

