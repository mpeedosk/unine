<script>
    {{--var data = '{{ $sleeps }}';--}}
{{--    var data = JSON.parse({{ $sleeps }});--}}
    var data = {!! json_encode($query2)!!}

    Morris.Bar({
        axes: true,
        grid: true,
        element: 'morris-bar-chart',
        data: data,
        xkey: 'created_at',
        ykeys: ['hours'],
        labels: ['Uni'],
        hideHover: 'auto',
        stacked: true,
        resize: true
    });


</script>