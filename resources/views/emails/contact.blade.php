@extends('layoutmenu', ['title' => 'Kontakt'])

@section('content')
    <div class="postcontent" xmlns="http://www.w3.org/1999/html">
        <div class="posttitle m-b-md">
            <p>Nachricht senden</p>
        </div>
        <form method="POST" action="/contact">
            @csrf
            <div class="form__group field form_position">
                <input type="input" class="form__field" placeholder="name" name="name" id='name' required/>
                <label for="name" class="form__label">Name</label>
            </div>

            <div class="form__group field form_position">
                <input type="input" class="form__field" placeholder="E-Mail" name="email" id='email' required/>
                <label for="email" class="form__label">E-Mail Adresse</label>
            </div>

            @error('email')
            <div class="form__group field form_position" style="color: red">
                {{$message}}
            </div>
            @enderror

            <div class="form__group field form_position">
                <textarea type="input" class="form__field" placeholder="Nachricht" name="msg" id='msg' required></textarea>
                <label for="msg" class="form__label">Nachricht</label>
            </div>

            @if(session('message'))
                <div class="form__group field form_position" style="color: lightgreen">
                    {{session('message')}}
                </div>
            @endif

            <div class="form__group field form_position">
                <button type="submit" class="button form__group">Absenden</button>
            </div>

        </form>
    </div>

@endsection
