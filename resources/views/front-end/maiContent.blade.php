@extends('front-end.master')
@section('title', 'Home')
@section('maiContent')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>First Slide</h3>
                    <p>This is a description for the first slide.</p>
                </div>
            </div>
            <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p>
                </div>
            </div>
            <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
<!-- Page Content -->
<div class="container">
    <h1 class="my-4">Welcome to Our Blog</h1>
    <!-- Blog -->
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 mb-4">
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
    </div><!-- /.row -->
    <!-- ./Blog -->
    <!-- Portfolio Section -->
    <h2>Popular blogs</h2>
    <div class="row">
        @foreach($popularBlogs as $blog)
        <div class="col-lg-4 mb-4">
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
    </div><!-- /.row -->
    <hr>
    <!-- Call to Action Section -->
    <div class="row mb-4">
        <div class="col-md-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
        </div>
    </div>
</div>
<!-- /.container -->
@endsection
