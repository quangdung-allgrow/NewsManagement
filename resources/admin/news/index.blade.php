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
        <table class="table table-hover" id="table-data">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="checked-all">
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

@section('script')
<script type="text/javascript">

    function deleteMulti() {
        vex.dialog.confirm({
            message: '{{ __('app.string.aya sure') }}',
            callback: function (confirm) {
                if (confirm) {
                    var ids = [];
                    $("input[name=row_del]").each(function(index) {
                        if ($(this).is(':checked')) {
                            ids.push($(this).data('id'));
                        }
                    });

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    $.ajax({
                        url: '{{ route('news.deleteMulti') }}',
                        data: {
                            id : JSON.stringify(ids)
                        },
                        cache: false,
                        type: 'POST',
                        beforeSend: function(xhr) {
                            $.addLoadingBottom();
                            $('.ajax-loading').show();
                        },
                        success: function(resp) {
                            if (resp.code == 200) {
                                location.reload();
                            } else {
                                vex.dialog.alert({ unsafeMessage: resp.message });
                            }
                        },
                        complete: function() {
                            $('.ajax-loading').hide();
                        }
                    });
                }
            }
        });
    };

    function confirmDel(el) {
        vex.dialog.confirm({
            message: '{{ __('app.string.aya sure') }}',
            callback: function (confirm) {
                if (confirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
                    $.ajax({
                        url: '{{ route('news.delete') }}',
                        data: {
                            id : $(el).data('id')
                        },
                        cache: false,
                        type: 'POST',
                        beforeSend: function(xhr) {
                            $.addLoadingBottom();
                            $('.ajax-loading').show();
                        },
                        success: function(resp) {
                            if (resp.code == 200) {
                                location.reload();
                            } else {
                                vex.dialog.alert({ unsafeMessage: resp.message });
                            }
                        },
                        complete: function() {
                            $('.ajax-loading').hide();
                        }
                    });
                }
            }
        });
    };

</script>
@stop