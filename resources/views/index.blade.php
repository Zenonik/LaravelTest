@extends('layoutmenu', ['title' => 'Start'])

@section('content')
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Willkommen!</h2>
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-5">
            <a class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" href="/posts/ueberuns">Über uns</a>

        </div>
        <div class="col-md-6 col-lg-4 mb-5">

            <a class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100" href="/posts">Posts</a>
        </div>
    </div>
@endsection
