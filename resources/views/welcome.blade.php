@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'tasks.store']) !!}
                        <div class="form-group">
                            <table class="table table-striped table-bordered table-sm">
                                <tr>
                                    <th>ステータス</th>
                                    <th>タスク</th>
                                </tr>
                                <tr>
                                    <td>{!! Form::textarea('status', old('status'), ['class' => 'form-control', 'rows' => '1']) !!}</td>
                                    <td>{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '1']) !!}</td>
                                </tr>
                            </table>
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
                @if (count($tasks) > 0)
                    @include('tasks.index', ['tasks' => $tasks])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the TaskList</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection