@extends('layout')

@section('html')
    <html lang="et">
    @stop
    @section('page-title')
        <title>Lisa info</title>
    @stop

    @section('page-specific-stuff')
        <script src="/js/lisa.js" defer></script>

    @stop

    @section('content')
        <div id="content">
            <div class="content-overlay "></div>
            <div class="row extra-padding">
                <div class="col-xs-12 col-md-7 extra-padding">
                    <h2>Autorid : </h2>
                    <br>
                    <div id="autorid"></div>
                </div>
                <div class="col-xs-12 col-md-4 pull-right ">
                    <h3> Uudised </h3>

                    <div class="postWrapper">
                        @foreach($posts as $post)
                            <div class="postPanel">
                                <div class="postPanel-body">
                                    {{ $post-> body }}
                                </div>
                                <div class="postDate"><span class="pull-right">{{ $post->created_at }}</span></div>
                            </div>
                        @endforeach
                    </div>
                    <form id="posts" method="POST" action="/loe_lisaks">

                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="newPost" class="visuallyhidden">Lisa kommentaar</label>
                            <input type="text" class="form-control" name="body" id="newPost"
                                   placeholder="Lisa kommentaar"
                                   required>
                        </div>
                        <button id="submit" class="btn btn-success btn-block">Lisa</button>
                    </form>
                </div>
            </div>
        </div>
@stop