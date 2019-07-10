@extends('front-end.master')
@section('title', 'Login')
@section('maiContent')
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Login</h1>
    <hr>
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-danger text-center">{{ Session::get('message') }}</h3>
                    <form action="{{ route('new-sing-in')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">E-mail Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" name="btn" class="btn btn-lg btn-success btn-block" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
