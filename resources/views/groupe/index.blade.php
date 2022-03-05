@extends('layouts.myapp')


@section('content')

<div class="container">
    <div class="row">
        @foreach ($groups as $group)
            <div class="col-sm-4">
                <div class="panel panet-default">
                    <strong>{{ $group->name }}</strong>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($group->users as $user )
                            <li class="list-group-item">
                             <a href="{{ route('spay', $user->id) }}">
                                {{ $user->name }}
                            </a>
                            </li>
                        @endforeach
                    </ul>

                    <form action="{{ route('notify', $group->id) }}" method="post">
                        {{ csrf_field() }}
                        <button class="btn btn-primary">Nottifier</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
