@extends("layouts.auth")
@section("form")
    <div class="container">
        <div class="row row-auth" style="">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                <div class="card my-auto">
                    <div class="container p-3">
                        <div class="row text-center m-3">
                            <h3><b>LaporKuy</b></h3>
                            <p><b>Login</b></p>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email Anda">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Masukan Password Anda">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingatkan saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row p-3">
                            
                                <button type="submit" class="btn btn-primary-lk">
                                    {{ __('Masuk') }}
                                </button>
                            
                        </div>
                        <div class="row">
                            <span>Belum punya akun? <b><a href="{{url('/register')}}">Register</a></b></span>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-4"></div>
        </div>
    </div>
    @endsection