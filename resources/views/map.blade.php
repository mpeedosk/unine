@extends('layout')

@section('page-title')
    <title>Kaart</title>
    @stop

    @section('page-specific-stuff')
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script>
            google.maps.event.addDomListener(window, 'load', init_map);
        </script>
    @stop


@section('content')

    <div id="content">
        <div class="content-overlay extra-padding">
            <div class="container col-md-12" id="map-container"></div>
        </div>
    </div>

@stop