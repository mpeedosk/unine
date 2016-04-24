@foreach($logs as $log)
    <a href="/unelogi/{{$log->id}}" class="list-group-item" onclick="logScript(event,'{{$log->id}}')">
        <?php
        if(strlen($log -> title)> 14) {
            echo substr($log -> title, 0, 14) . '...';

        }else{
            echo $log -> title;
        }
        ?>
        <span class="log-list pull-right text-muted small"><em>{{date('d.m.Y', strtotime($log    -> date))}}</em>
                                    </span>
    </a>
@endforeach