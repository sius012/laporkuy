@extends('layouts.auth')

@section('form')
<div class="container">
        <div class="row row-auth " style="margin-top: 10vh">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                <div class="card p-5">
                    <div class="container ">
                        <div class="row text-center m-3">
                            <h3><b>LaporKuy</b></h3>
                            <p><b>Register</b></p>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input id="name" type="text" placeholder="Masukan Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                             <div class="col">
                                <input id="email" placeholder="Masukan Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="row mb-3">
                             <div class="col">
                                <input id="alamat" placeholder="Masukan Alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                          
                            <div class="col">
                                <input id="password" type="password" placeholder="Masukan Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row"> 
                           
                            <div class="col">
                                <input id="password-confirm" placeholder="Masukan Konfirmasi Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row p-3">
                            
                                <button type="submit" class="btn btn-primary-lk">
                                    {{ __('Daftar') }}
                                </button>
                            
                        </div>
                        <div class="row">
                            <span>Sudah punya akun? <b><a href="{{url('/register')}}">Masuk</a></b></span>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="col-4"></div>
        </div>
    </div>
@endsection

