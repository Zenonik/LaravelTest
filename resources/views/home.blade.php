@extends('dashboardlayout', ['title' => 'Dashboard'])
@section('content')
    <body id="conent">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <a class="navbar-brand" href="#">{{config('app.name')}}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Startseite<span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button">
                            <i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                                           data-toggle="dropdown" aria-expanded="false"
                                                                           href="#"><i
                                            class="fas fa-envelope fa-fw"></i><span
                                            class="badge badge-danger badge-counter"></span></a>
                                    <div
                                        class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in">
                                        <h6 class="dropdown-header">Neuste User</h6>
                                        <?php
                                        use App\User;
                                        try {
                                            $results = User::orderBy('created_at', 'desc')->take(3)->get();
                                            foreach ($results as $object) {
                                                echo "<a class='d-flex align-items-center dropdown-item' href=''>
                                            <div class='dropdown-list-image mr-3'><img class='rounded-circle' style='width: 50px; height: 50px;'
                                                                                       src='/uploads/avatars/".$object->avatar."'>
                                                <div class='bg-success status-indicator'></div>
                                            </div>
                                            <div class='font-weight-bold'>
                                                <div class='text-truncate'><span>" . $object->name . "</span>
                                                </div>
                                                <p class='small text-gray-500 mb-0'>" . $object->email . "</p>
                                            </div></a>";
                                            }
                                        } catch (\Illuminate\Database\QueryException $ex) {
                                            echo "<a> Es gab ein Problem mit der Datenbank: (" . $ex->getMessage() . ")</a>";
                                        }
                                        ?>
                                        <a class="text-center dropdown-item small text-gray-500" href="#">Zeige alle</a>
                                    </div> {{--TODO--}}
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                                     aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                                           data-toggle="dropdown" aria-expanded="false"
                                                                           href="#"><span
                                            class="d-none d-lg-inline mr-2 text-gray-600 small">{{auth()->user()->name}}</span><img
                                            class="border rounded-circle img-profile" style="width: 30px; height: 30px"
                                            src="/uploads/avatars/{{auth()->user()->avatar}}"></a>
                                    <div
                                        class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a
                                            class="dropdown-item" href="/profile"><i
                                                class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout"><i
                                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard | {{auth()->user()->name}}</h3></div>
                </div>
                <div class="card shadow mb-4 ml-4 mr-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary font-weight-bold m-0">Deine Posts</h6>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a
                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                                                                      href="#">&nbsp;Another
                                    action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">&nbsp;Something else here</a></div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                        use App\Posts;
                        try {
                            $results = DB::table('posts')->where('user_id', auth()->id())->get();
                            foreach ($results as $object) {
                                if ($object->hide === 1) {
                                    $hide1 = "disabled";
                                    $hide2 = "";
                                    $hidden = "0";
                                } else {
                                    $hide1 = "";
                                    $hide2 = "disabled";
                                    $hidden = "1";
                                }
                                print"<li class=list-group-item>
                                <div class='row align-items-center no-gutters'>
                                    <div class=col mr-2>
                                        <h6 class=mb-0><strong>$object->title</strong></h6><span
                                            class=text-xs>von " . DB::table('users')->where('id', $object->user_id)->first()->name . "</span></div>
                                </div>
                                <form method='POST' action='/hide/" . $object->link . "'> " . method_field('PUT') . csrf_field() . "
                                <input type=hidden class=form__field name=title id=title value=" . $object->title . " required/>
                                <input type=hidden class=form__field name=link id=link value=" . $object->link . " required/>
                                <input type=hidden class=form__field name=text id=text value=" . $object->text . " required/>
                                <input type=hidden class=form__field name=hide id=hide value=" . $hidden . " required/>
                                <input type=hidden class=form__field name=user_id id=user_id value=" . $object->user_id . " required/>
                                <button type=submit value=submit class='btn btn-primary btn-sm d-none d-sm-inline-block' " . $hide2 . ">Veröffentlichen</button>
                                <button type=submit value=submit class='btn btn-primary btn-sm d-none d-sm-inline-block' " . $hide1 . ">Verstecken</button>
                                </form>
                                </li>";
                            }
                        } catch
                        (\Illuminate\Database\QueryException $ex) {
                            echo "<p> Es gab ein Problem mit der Datenbank: </p>" . "<p>" . $ex->getMessage() . "</p>";
                        }
                        ?>
                    </ul>

                </div>
                <div class="row ml-2 mr-3">
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Deine Posts</h6>
                            </div>
                            <div class='card-body'>
                                <h4 class="small font-weight-bold">Account setup<span
                                        class="float-right">Complete!</span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4 ml-2">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary font-weight-bold m-0">Versteckt / Öffentlich</h6>
                        <div class="dropdown no-arrow">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas
                                data-bs-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Öffentlich&quot;,&quot;Versteckt&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#FFE74C&quot;,&quot;#FF5964&quot;],&quot;borderColor&quot;:[&quot;#FFE74C&quot;,&quot;#FF5964&quot;],&quot;data&quot;:[&quot;{{count(DB::select('select * from posts where !hide'))}}&quot;,&quot;{{count(DB::select('select * from posts where hide'))}}&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:true},&quot;title&quot;:{}}}"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © {{config('app.name')}} 2020</span></div>
        </div>
    </footer>
    </div>
    <a><i class="fas"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="js/theme.js"></script>
    </body>
@endsection
