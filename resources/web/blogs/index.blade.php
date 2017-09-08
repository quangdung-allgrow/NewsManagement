@extends('layouts.main') 

@section('content')
<div class="col-xs-12 col-sm-9">
    @php($numOfCols = 3)
    <div class="row">
        @foreach($news as $item) 
        <div class="col-xs-6 col-lg-4">
            <h3><a href="{{ route('news.detail', [$item->title_slug]) }}">{{ $item->title }}</a></h3>
            <p>{{ truncate($item->content, 200) }}</p>
            <p><a class="btn btn-default" href="{{ route('news.detail', [$item->title_slug]) }}" role="button">View details &raquo;</a></p>
        </div>
        @if(($loop->index+1) % $numOfCols == 0) 
        {!! '</div><div class="row">' !!} 
        @endif 
        @endforeach
    </div>
    <!--/row-->
    <div class="">
        {!! $news->links() !!}
    </div>
</div>
<!--/.col-xs-12.col-sm-9-->
<div class="col-xs-6 col-sm-3" id="sidebar">
    <div class="list-group">
        @foreach($newsCategories as $item)
        <a href="#" class="list-group-item">{{ $item->title }}</a> 
        @endforeach
    </div>
</div>
@stop