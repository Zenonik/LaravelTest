@extends('layoutmenu', ['title' => 'Edit' . $post->title])

@section('content')

    <div class="postcontent">
        <div class="posttitle m-b-md">
            <p>Mail Test</p>
        </div>
        <form>
            <div class="form__group field form_position">
                <input type="input" class="form__field" name="email" id='email' required/>
                <label for="email" class="form__label">E-Mail Adresse</label>
            </div>

            <div class="form__group field form_position">
                <button type="submit" class="button form__group">Ändern</button>
            </div>

        </form>
    </div>

@endsection
