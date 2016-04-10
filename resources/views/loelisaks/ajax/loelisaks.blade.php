@foreach($posts as $post)
    <div class="postPanel" >
        <div class="postPanel-body">
            {{ $post-> body }}
        </div>
        <div class="postDate" ><span class="pull-right">{{ $post->created_at }}</span></div>
    </div>
@endforeach