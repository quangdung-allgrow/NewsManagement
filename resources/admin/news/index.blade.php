@extends('layouts.master') 

@section('title', 'Dashboard')


 @section('content')
<h1 class="page-header">News List</h1>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @each('news.partials.tr-news', $news, 'news')
            </tbody>
        </table>
    </div>
</div>
@stop