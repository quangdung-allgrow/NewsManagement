@extends('layouts.master') 

@section('title', 'Add News')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="pull-left"> 
                <h2 class="page-header">Add News</h2>
            </div>
            <div class="pull-right" style="margin: 0 15px 15px 0;">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{ route('news.index') }}"><i class="fa fa-dashboard"></i> News</a></li>
                    <li class="active">New</li> 
                </ol>
            </div>
        </div>
        {!! Form::open(['route' => 'news.store', 'file' => true]) !!}
        <div class="pull-right">
            <button type="submit" class="btn btn-primary" name="submit" value="save"><span class="glyphicon glyphicon-floppy-disk"></span>{{ __('app.button.save') }}</button>
            <button type="submit" class="btn btn-primary" name="submit" value="save_continue"><span class="glyphicon glyphicon-floppy-disk"></span>{{ __('app.button.save and continue') }}</button>
            <a href="{{ route('news.index') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>{{ __('app.button.cancel') }}</a>
        </div>
        <div class="row clearfix">
            <div class="col-md-6">
                <div class="form-group {{ has_error($errors, 'title') }}">
                    <label>Title<span class="red">*</span></label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title">
                </div>
                <div class="form-group {{ has_error($errors, 'ca_id') }}">
                    <label>Categories</label>
                    <select name="news_cate_id" class="form-control">
                        @foreach($newsCategories as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="">
                    <label for="lock">Lock</label>
                    <input name="lock" class="" type="checkbox" id="lock"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label>Short Description (limit 300 characters)</label>
                    <div class="box-textarea">
                        <p class="count_char count_char_4">0 char</p>
                        <textarea class="form-control" data-id_count="4" name="short_desc" rows="3">{{ old('short_desc') }}</textarea>
                    </div>
                </div>
                <div class="form-group {{ has_error($errors, 'content') }}">
                    <label>Content<span class="red">*</span></label>
                    <textarea id="tinymce" name="content" class="form-control" rows="20">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop

@section('script')
{{-- <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('app/js/tinymce.init.js') }}"></script> --}}

@stop