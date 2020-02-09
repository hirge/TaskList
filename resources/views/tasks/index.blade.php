<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($task->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <table class="table table-striped table-bordered table-sm">
                    <tr>
                        <th>ステータス</th>
                        <th>タスク</th>
                    </tr>
                    <tr>
                        <td><p class="mb-0">{!! nl2br(e($task->status)) !!}</p></td>
                        <td><p class="mb-0">{!! nl2br(e($task->content)) !!}</p></td>
                    </tr>
                </table>
                <div>
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tasks->links('pagination::bootstrap-4') }}