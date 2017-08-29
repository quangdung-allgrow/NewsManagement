@extends('layouts.main')

@section('content')
<div class="col-xs-12 col-sm-9">
  <div class="blog-post">
    <h2 class="blog-post-title">{{ $news->title }}</h2>
    <p class="blog-post-meta">January 1, 2014 by <a href="#"></a></p>
    <p>{!! $news->content !!}</p>
  </div><!-- /.blog-post -->
</div>
<div class="col-xs-6 col-sm-3" id="sidebar">
  <div class="list-group">
    @foreach($newsCategories as $item)
    <a href="#" class="list-group-item">{{ $item->title }}</a>
    @endforeach
  </div>
</div>
@stop