<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            $.bootstrapGrowl("{{ Sesstion::get('message', '') }}", {
                type: 'danger',
                align: 'right',
                width: 'auto',
                allow_dismiss: true,
                offset: {from: 'top', amount: 10},
            });
        }, 200);
    });
</script>