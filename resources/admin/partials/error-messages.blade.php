<script type="text/javascript">
    $(function() {
        @php($delay=200)
        @foreach ($errors->all() as $message)
            setTimeout(function() {
                $.bootstrapGrowl("{{ $message }}", {
                    type: 'danger',
                    align: 'right',
                    width: 'auto',
                    allow_dismiss: true,
                    offset: {from: 'top', amount: 10},
                });
            }, {{ $delay }});
        @php($delay += 200)
        @endforeach
    });
</script>