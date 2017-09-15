@extends('layouts.main') 

@section('content')
<div class="col-xs-12 col-sm-9">
    <list-news page="{{ isset($_GET['page']) ? $_GET['page'] : 1 }}" col="3" citem="6"/>
</div>
<div class="col-xs-6 col-sm-3" id="sidebar">
    <div class="list-group">
        @foreach($newsCategories as $item)
        <a href="#" class="list-group-item">{{ $item->title }}</a> 
        @endforeach
    </div>
</div>
@stop
