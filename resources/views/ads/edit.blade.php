<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
<form action="/edit/{{ $ad->id }}" method="post" class="edit-form">
    {{ csrf_field()  }}
    {{ method_field('PUT') }}
    <h3 class="text-center">Update Ad</h3>
    <div>
        <label for="title">Title of Ad</label>
        <input type="text" id="title" class="title-input" name="title" value="{{ $ad->title }}">
    </div>
    <div>
        <label for="description">Description of Ad</label>
        <textarea class="description" id="description" name="description">{{ $ad->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Ad</button>
    @include('layouts.errors')
</form>