@extends('layoutmenu', ['title' => 'Home'])

@section('content')
    <div class="postcontent">
        <div class="m-b-md">
            <div class="form__group field form_position">
                <div class="form__group field form_position">
                <div class="form__group field form_position">{{ __('Dashboard') }}</div>

                <div class="form__group field form_position">
                    @if (session('status'))

                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hallo, {{auth()->user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
