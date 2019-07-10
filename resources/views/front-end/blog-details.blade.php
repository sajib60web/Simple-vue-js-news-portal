@extends('front-end.master')
@section('title', 'Home')
@section('maiContent')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 text-success">{{ Session::get('message') }}</h1>
    <h1 class="mt-4 mb-3">{{ $blogs->blog_title }}</h1>
    <hr>
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset($blogs->blog_image) }}" alt="{{ $blogs->blog_title }}">
            <hr>
            <!-- Date/Time -->
            <p style="padding-left: 10px;"> {{ $blogs->date }}</p>
            <hr>
            <!-- Post Content -->
            <p class="lead">{!! $blogs->blog_long_description !!}</p>
            <hr>
            @if($visitor_id = Session::get('visitor_id'))
            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Comment:</h5>
                <div class="card-body">
                    <form action="{{ route('new-comment')}}" method="POST">
                        @csrf
                        <input type="hidden" name="visitor_id" value="{{ $visitor_id }}">
                        <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                        <input type="hidden" name="blog_title" value="{{ $blogs->blog_title }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            @else
            <div class="card my-4">
                <div class="card-body">
                    <h5 class="card-title">You have to <a href="{{ route('visitor-login')}}">login</a> to Comment this blog. If you are <a href="{{ route('singUp')}}">registration</a> then <a href="{{ route('visitor-login')}}">login</a></h5>
                </div>
            </div>
            @endif
            <!-- Single Comment -->
            @foreach($comments as $comment)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ $comment->first_name.' '.$comment->last_name }}</h5>
                    <p style="background: #ddd; padding: 10px;">{{ $comment->comment }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('category-blog',['id'=>$category->id,'name'=>$category->category_name])}}">{{ $category->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->
@endsection
