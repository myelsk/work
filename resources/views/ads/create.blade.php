<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
<form action="/edit" method="post" class="create-form">
    {{ csrf_field()  }}
    <h3 class="text-center">Create Ad</h3>
    <div>
        <label for="title">Title of Ad</label>
        <input type="text" id="title" class="title-input" name="title">
    </div>
    <div>
        <label for="description">Description of Ad</label>
        <textarea class="description" id="description" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Ad</button>
    @include('layouts.errors')
</form>