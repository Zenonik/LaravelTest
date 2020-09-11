@extends('dashboardlayout', ['title' => 'Dashboard'])
@section('content')
<body id="page-top">
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
                <h3 class="text-dark mb-4">Profil | {{auth()->user()->name}}</h3>
                <div class="row mb-3">
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="/uploads/avatars/{{auth()->user()->avatar}}" width="160" height="160">
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Profilbild ändern</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                    </div>
                                    <div class="card-body">
                                        <form class="user" method="POST" action="/user">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Nutzername</strong></label><input class="form-control" value="{{auth()->user()->name}}" placeholder="{{auth()->user()->name}}" name="username"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>E-mail Addresse</strong></label><input class="form-control" value="{{auth()->user()->email}}" placeholder="{{auth()->user()->email}}" name="email"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>Neues Passwort</strong></label>
                                                    <input placeholder="Neues Passwort" id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password"
                                                           required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                    @enderror
                                                </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="first_name"><strong>Neues Passwort wiederholen</strong></label>
                                                    <input placeholder="Neues Passwort wiederholen" id="password-confirm" type="password"
                                                           class="form-control"
                                                           name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Speichern</button></div>
                                        </form>
                                    </div>
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
            <a><i class="fas"></i></a></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/assets/js/theme.js"></script>
</body>
@endsection
