@extends('layoutmenu', ['title' => 'Posts'])

@section('content')

    <div class="content">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Alle Posts</h2>

        <div class="links">
            <?php
            use App\Posts;
            try {
                $results = DB::select('select * from posts where !hide');
                foreach ($results as $object) {
                    echo "<div class='row''>
                        <div class='col-md-6 col-lg-4 mb-5'>
                        <a class='portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100' href=/posts/" . $object->link . ">" . $object->title . "</a>
                    </div>
                    </div>";
                }
            } catch (\Illuminate\Database\QueryException $ex) {

                echo "<div class='row''>
                        <div class='col-md-6 col-lg-4 mb-5'> <a class='portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100'> Es gab ein Problem mit der Datenbank: </a>" . "<a>" . $ex->getMessage() . "</a> </div>
                    </div>";
            }
            ?>
        </div>
    </div>
    </div>
@endsection
