<div class="col-md-3">
    <div class="list-group">
        @foreach ( $users as $user)
         <a href="{{ route('conversations.show', $user->id) }}" class="list-group-item">
            {{ $user->name  }}

            @if(isset($unread[$user->id]))
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $unread[$user->id] }}
                <span class="visually-hidden">unread messages</span>
              </span>

            @endif
        </a>
         @endforeach

    </div>
</div>
