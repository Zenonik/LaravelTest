@extends('layoutmenu')

@section('content')
    <div class="postcontent" xmlns="http://www.w3.org/1999/html">
        <div class="posttitle m-b-md">
            <p>Einen Post erstellen</p>
        </div>
        <form method="POST" action="/posts">
            @csrf
            <div class="form__group field form_position">
                <input type="input" class="form__field" placeholder="title" name="title" id='title' required/>
                <p style="color: red">{{$errors -> first('title')}}</p>
                <label for="title" class="form__label">Titel</label>
            </div>

            <div class="form__group field form_position">
                <input type="input" class="form__field" placeholder="link" name="link" id='link' required/>
                <p style="color: red">{{$errors -> first('link')}}</p>
                <label for="link" class="form__label">Link (z.B. beispielpost)</label>
            </div>
            <div class="form__group field form_position">
                <textarea type="input" class="form__field" name="text" id='text' required/></textarea>
                <p style="color: red">{{$errors -> first('text')}}</p>
                <label for="text" class="form__label">Text</label>
            </div>
            <div class="form__group field form_position">
                <input type="input" class="form__field" placeholder="hide" name="hide" id='hide' required/>
                <p style="color: red">{{$errors -> first('hide')}}</p>
                <label for="hide" class="form__label">Sichtbar (1=nein 0=ja)</label>
            </div>

            <div class="form__group field form_position" >
                <input type="input" class="form__field" placeholder="user_id" name="user_id" id='user_id' value="{{auth()->user()->id}}" hidden required/>
                <p style="color: red">{{$errors -> first('user_id')}}</p>
                <label for="hide" class="form__label">Wird als {{auth()->user()->name}} erstellt.</label>
            </div>

            <div class="form__group field form_position">
                <button class="button form__group">Erstellen</button>
            </div>

        </form>
    </div>

@endsection
