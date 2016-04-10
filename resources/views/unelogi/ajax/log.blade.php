@foreach($logs as $log)
    <a href="/unelogi/{{$log->id}}" class="list-group-item"> {{$log -> title}}
        <span class="log-list pull-right text-muted small"><em>{{date('d.m.Y', strtotime($log    -> date))}}</em>
                                    </span>
    </a>
@endforeach