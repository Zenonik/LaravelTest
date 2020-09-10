@extends('layoutmenu', ['title' => 'Post erstellen'])

@section('content')
    <div class="form-group container">
        <div class="display-1">
            <p>Einen Post erstellen</p>
        </div>
        <form method="POST" action="/posts">
            @csrf
            <div class="">
                <input type="input" class="form-control" placeholder="title" name="title" id='title' required/>
                <p style="color: red">{{$errors -> first('title')}}</p>
                <label for="title" class="mdl-textfield__label">Titel</label>
            </div>

            <div class="form__group field form_position">
                <input type="input" class="form-control" placeholder="link" name="link" id='link' required/>
                <p style="color: red">{{$errors -> first('link')}}</p>
                <label for="link" class="form__label">Link (z.B. beispielpost)</label>
            </div>
            <div class="form__group field form_position">
                <textarea type="input" class="form-control" name="text" id='text' required/></textarea>
                <p style="color: red">{{$errors -> first('text')}}</p>
                <label for="text" class="form__label">Text</label>
            </div>
            <div class="form__group field form_position">
                <input type="input" class="form-control" placeholder="hide" name="hide" id='hide' required/>
                <p style="color: red">{{$errors -> first('hide')}}</p>
                <label for="hide" class="form__label">Sichtbar (1=nein 0=ja)</label>
            </div>

            <div class="form__group field form_position" >
                <input type="input" class="form-control" placeholder="user_id" name="user_id" id='user_id' value="{{auth()->user()->id}}" hidden required/>
                <p style="color: red">{{$errors -> first('user_id')}}</p>
                <label for="hide" class="form__label">Wird als {{auth()->user()->name}} erstellt.</label>
            </div>

            <div class="form__group field form_position">
                <button class="btn btn-default">Erstellen</button>
            </div>

        </form>
    </div>

@endsection
