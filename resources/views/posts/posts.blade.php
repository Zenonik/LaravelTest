@extends('layoutmenu', ['title' => 'Posts'])

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Alle Posts
        </div>

        <div class="links">
            <?php
                use App\Posts;
                try{
                $results = DB::select('select * from posts where !hide');
                foreach ($results as $object){
                    echo "<a href=/posts/" . $object->link . ">" . $object->title ."</a>";
                    }
                } catch(\Illuminate\Database\QueryException $ex){
                    echo "<p> Es gab ein Problem mit der Datenbank: </p>" . "<p>" . $ex->getMessage() . "</p>";
                }
                ?>
        </div>
    </div>
</div>
@endsection
