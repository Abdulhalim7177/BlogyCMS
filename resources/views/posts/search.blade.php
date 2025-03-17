@extends('layouts.app')

@section('content')
<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: Business</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                @foreach ($result as $post ) 
                    <div class="blog-entry d-flex blog-entry-search-item">
                        <a href="{{route('posts.sinfle', $post->id )}}" class="img-link me-4">
                            <img src="images/img_1_sq.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div>
                            <span class="date">{{$post->created_at}} &bullet; <a href="#">Business</a></span>
                            <h2><a href="single.html">{{$post->title}}</a></h2>
                            <p>{{$post->description}}</p>
                            <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                        </div>
                    </div>
                @endforeach

            

            </div>

            <div class="col-lg-4 sidebar">
                
                
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="images/img_1_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/img_2_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="images/img_3_sq.jpg" alt="Image placeholder" class="me-4 rounded">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

                {{-- <div class="sidebar-box">
                    <h3 class="heading">Categories</h3>
                    <ul class="categories">
                        <li><a href="#">Food <span>(12)</span></a></li>
                        <li><a href="#">Travel <span>(22)</span></a></li>
                        <li><a href="#">Lifestyle <span>(37)</span></a></li>
                        <li><a href="#">Business <span>(42)</span></a></li>
                        <li><a href="#">Adventure <span>(14)</span></a></li>
                    </ul>
                </div> --}}
                <!-- END sidebar-box -->

                


            </div>
        </div>
    </div>
</div>
@endsection
