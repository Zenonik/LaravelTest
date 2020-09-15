@extends('dashboardlayout', ['title' => 'Registrieren'])
@section('content')
    <body class="bg-gradient-primary" style="background: transparent">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image"
                             style="background-image: url(&quot;/img/dogs/image3.jpeg&quot;); background-size: cover;"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">{{ __('Register') }}</h4>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input placeholder="Name" id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name" class="col-sm-6 mb-3 mb-sm-0">{{ __('Name') }}</label>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input placeholder="E-Mail" id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email" class="col-sm-6 mb-3 mb-sm-0">{{ __('E-Mail Address') }}</label>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input placeholder="Telefonnummer" id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    <label for="phone" class="col-sm-6 mb-3 mb-sm-0">{{ __('Telefonnummer') }}</label>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input placeholder="Passwort" id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">
                                        <label for="password" class="col-sm-6 mb-3 mb-sm-0">{{ __('Password') }}</label>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input placeholder="Passwort wiederholen" id="password-confirm" type="password"
                                               class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                        <label for="password-confirm"
                                               class="col-sm-6 mb-3 mb-sm-0">{{ __('Confirm') }}</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block text-white btn-user"
                                        type="submit">{{ __('Register') }}</button>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="/dashboard/reset.html">Passwort
                                    vergessen</a>
                            </div>
                            <div class="text-center"><a class="small" href="/login/">Account vorhanden?
                                    Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

@endsection
