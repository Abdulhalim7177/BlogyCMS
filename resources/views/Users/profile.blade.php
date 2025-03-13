@extends('layouts.app')

@section('content')

<div class="site-cover site-cover-sm same-height overlay single-page" style="margin-top:-25px; background-image: url('{{ asset('assets/images/hero_3.jpg') }}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">

          <div class="post-entry text-center">

              <img style="width: 70px; height:80px " src="{{ asset('assets/user_images/'.$profile->image.'') }}" alt="Image" class="img-fluid">
            <h1 class="mb-4">{{ $profile->name }}</h1>
            <div class="post-meta align-items-center text-center">
              <span class="d-inline-block mt-1"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
           <p>{{ $profile->bio }}</p>
          </div>
        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">

          <!-- END sidebar-box -->
         
          <!-- END sidebar-box -->
          <div  style="padding: 20px;"  class="sidi sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
                @foreach( $latestPost as $Post)
                <li>
                  <a href="{{ route('posts.single', $Post->id) }}">
                    <img src="{{ asset('assets/images/'.$Post->image.'') }}" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>{{ $Post->title }}</h4>
                      <div class="post-meta">
                        <span class="mr-2"> {{ \Carbon\Carbon::parse($Post->created_at)->format('M d, Y') }}</span>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
            
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

         


        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>
@endsection
