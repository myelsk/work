<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
@if($ad)
    <p>
        Created by: {{ $ad->user->name  }}
    </p>
    <p>
        Title: {{ $ad->title }}
    </p>
    <div>
        Description: {{ $ad->description }}
    </div>
    <p>
        Created at: {{ $ad->created_at  }}
    </p>
    <button>
        <a href="/" class="return-button">home page</a>
    </button>
    @if($ad->user_id === Auth::id())
        <form action="/delete/{{ $ad->id }}" method="post" class="delete-form">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit">Delete Ad</button>
        </form>
        <button>
            <a class="edit-link" href="/edit/{{ $ad->id }}">Edit Ad</a>
        </button>
    @endif
@else
    <p>Resource you are trying to get does not exists</p>
@endif