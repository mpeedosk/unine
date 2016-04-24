@extends('layout')

@section('page-title')
    <title>Uni</title>
    @stop
    @section('page-specific-stuff')

            <!-- Datepicker -->
    <link href="css/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">

    <!-- Kella valik -->
    <script src="js/bootstrap-clockpicker.js"></script>

    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function () {
                $("#modal-login").modal('show');
            });
        </script>
    @endif

@stop
@section('content')
    <section id="content">

        <div class="row">
            <div class="col-md-offset-4" style="margin-top: 10%">
                <h1 style="color: #405162"> Teil puudub internetiühendus!</h1>
            </div>
        </div>



    </section>

@stop