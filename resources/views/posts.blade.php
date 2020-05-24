
@extends('master')



@section('content')


<h3 class="pb-4 mb-4 font-italic border-bottom">
    From the Firehose
  </h3>

  <div class="blog-post">
  <h2 class="blog-post-title">{{$post['title'] }}</h2>
    <p class="blog-post-meta">{{$post['created_at'] }} by <a href="#">Mark</a></p>

    {!! $post['description'] !!}

  </div><!-- /.blog-post -->

  <nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
  </nav>

@endsection



