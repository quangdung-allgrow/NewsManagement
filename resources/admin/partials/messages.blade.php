@if( !empty(session('message')) )
<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            $.bootstrapGrowl("{{ session()->pull('message') }}", {
                type: '{{ session()->pull('type') }}',
                align: 'right',
                width: 'auto',
                allow_dismiss: true,
                offset: {from: 'top', amount: 10},
            });
        }, 200);
    });
</script>
@endif