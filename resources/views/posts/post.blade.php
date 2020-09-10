@extends('../layoutmenu', ['title' => $post->title])

@section('content')
        <div class="posttitle m-b-md">
            {{$post->title}}
        </div>

        <div>
            {{$post->text}}
        </div>

        <div>

            <p>Erstellt von: {{DB::table('users')->where('id',$post->user_id)->first()->name}}</p>
        </div>

    </div>

@endsection
