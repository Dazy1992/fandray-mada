@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row">
    @include('conversations.users', ['users'=> $users, 'unread'=>$unread])
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                {{ $user->name }}
            </div>
            <div class="card-body conversation">
                @if($messages->hasMorePages())
                   <div class="text-center">
                    <a href="{{ $messages->nextPageUrl() }}">Voir les messages Précedents</a>
                   </div>
                @endif
                @foreach (array_reverse($messages->items()) as $message )
                <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-2 text-right' : ''}}">
                    <p><strong>{{ $message->from->id !== $user->id ?  'Moi' : $message->from->name }}</strong></p>
                    {!! nl2br(e( $message->content ))!!}
                </div>
                <hr>
                @endforeach
                @if($messages->previousPageUrl())
                <div class="text-center">
                    <a href="{{$messages->previousPageUrl()}}">Voir les messages suivants</a>
                </div>
                @endif
                <form action="" method="post" class="mt-4">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="content" placeholder="Ecrire votre message" class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}"></textarea>
                        @if ($errors->has('content'))
                        <div class="invalid-feedback">{{implode(',', $errors->get('content'))  }}</div>
                        @endif
                    </div>
                    <button class="form-control mt-4" type="submit">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
  </div>

</div>
@endsection
