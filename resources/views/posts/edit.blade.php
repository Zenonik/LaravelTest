@extends('layoutmenu', ['title' => 'Edit' . $post->title])

@section('content')

    <div class="postcontent">
        <div class="posttitle m-b-md">
            <p>Post bearbeiten</p>
        </div>
        <form method="POST" action="/posts/{{$post->link}}">
            @csrf
            @method('PUT')

            <div class="form__group field form_position">
                <input type="input" class="form__field" name="title" id='title' value="{{$post->title}}" required/>
                <label for="title" class="form__label">Titel</label>
            </div>
            <div class="form__group field form_position">
                <input type="input" class="form__field" name="link" id='link' value="{{$post->link}}" required/>
                <label for="link" class="form__label">Link (z.B. beispielpost)</label>
            </div>
            <div class="form__group field form_position">
                <textarea type="input" class="form__field" name="text" id='text' required/>{{$post->text}}</textarea>
                <label for="text" class="form__label">Text</label>
            </div>
            <div class="form__group field form_position">
                <input type="input" class="form__field" name="hide" id='hide' value="{{$post->hide}}" required/>
                <label for="hide" class="form__label">Sichtbar (1=nein 0=ja)</label>
            </div>

            <div class="form__group field form_position" >
                <input type="input" class="form__field" placeholder="user_id" name="user_id" id='user_id' value="{{auth()->user()->id}}" hidden required/>
                <p style="color: red">{{$errors -> first('user_id')}}</p>
                <label for="hide" class="form__label">Wird als {{auth()->user()->name}} geändert.</label>
            </div>

            <div class="form__group field form_position">
                <button class="button form__group">Ändern</button>
            </div>

        </form>
    </div>

@endsection
