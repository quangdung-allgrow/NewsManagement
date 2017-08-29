@extends('layouts.master') 

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="pull-left"> 
                <h2 class="page-header">News List</h2>
            </div>
            <div class="pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ route('news.create') }}" class="btn btn-primary btn-flat mar-r-10">
                    <span class="glyphicon glyphicon-pencil"></span> Add New
                </a>
                <button class="btn btn-danger btn-flat btn-del-all" disabled onclick="deleteMulti()">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        @if(count($news) > 0)
                        <div class="form-group">
                            <input type="checkbox" onchange="check_del_all(this)" id="checke-all">
                        </div>
                        @endif
                    </th>
                    <th class="center">ID</th>
                    <th class="center">Title</th>
                    <th class="center">Category</th>
                    <th class="center">Status</th>
                    <th class="center">Writer</th>
                    <th class="center">Create At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @each('news.partials.tr-news', $news, 'item')
            </tbody>
        </table>
        <div class="paginate pull-right">
            {!! $news->links() !!}
        </div>
    </div>
</div>
@stop