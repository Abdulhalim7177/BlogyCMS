@extends('layouts.app')
@section('content')

    <!-- Start retroy layout blog posts -->
    <section class="section">
        <div class="container">
            @if (\Session::has('delete'))
                <div class="alert">   
                <p>{!! \Session::get('delete') !!}</p>
                </div>
          @endif
            <div class="retro-layout">
                <div>

                    <a class="h-entry mb-30 v-height">

                        <div class="featured-img" style="background-image: url('');"></div>

                        <div class="text">
                            <span class="date"></span>
                            <h2> </h2>
                        </div>
                    </a>

                </div>
                <div>

                    <a href="" class="h-entry img-5 h-100">
                        <div class="featured-img" style="background-image: url('');"></div>
                        <div class="text">
                            <span class="date"></span>
                            <h2></h2>
                        </div>
                    </a>

                </div>
                <div>

                    <a href="" class="h-entry mb-30 v-height">
                        <div class="featured-img" style="background-image: url('}}');"></div>
                        <div class="text">
                            <span class="date"></span>
                            <h2></h2>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- End retroy layout blog posts -->

@endsection
