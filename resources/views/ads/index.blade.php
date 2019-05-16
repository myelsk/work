<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
@if(Auth::check())
    <p class="welcome-message">Hello, {{ Auth::user()->name  }}</p>
    <p><a href="/logout" class="logout-button">logout</a></p>
    <a class="create-button" href="/edit">Create Ad</a>
@else
    <form action="/signin" method="post">
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
        <div>
            <a class="title-link" href="/{{ $ad->id }}">{{$ad->title}}</a>
        </div>
    @endforeach
</div>
<div>{{ $ads->links() }}</div>

<div class="errors">
    @include('layouts.errors')
</div>

<div class="sess-message">{{ session()->get('message') }}</div>