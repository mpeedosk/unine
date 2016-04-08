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
        <div class="content-overlay" style="padding: 20px;">
            <div class="container col-md-12" id="map-container" style="height: 100%;"></div>
        </div>
    </div>

@stop