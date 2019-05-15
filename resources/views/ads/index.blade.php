<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
@if(Auth::check())
    <p class="welcome-message">Hello, {{ Auth::user()->name  }}</p>
    <p><a href="/logout" class="logout-button">logout</a></p>
    <a class="create-button" href="/edit">Create Ad</a>
@else
    <form action="/login" method="post">
        {{ csrf_field() }}
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
@endif

<div class="ads">
    @foreach($ads as $ad)
        @if($ad->user_id === Auth::id())
            <div>
                <a class="title-link" href="/{{ $ad->id }}">{{$ad->title}}</a>
                <form action="/delete/{{ $ad->id }}" method="post" class="delete-form">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Delete Ad</button>
                </form>
                <button>
                    <a class="edit-link" href="/edit/{{ $ad->id }}">Edit Ad</a>
                </button>
            </div>
        @else
            <div>
                <a class="title-link" href="/{{ $ad->id }}">{{$ad->title}}</a>
            </div>
        @endif

    @endforeach
</div>
<div>{{ $ads->links() }}</div>

<div class="errors">
    @include('layouts.errors')
</div>

<div class="sess-message">{{ session()->get('message') }}</div>