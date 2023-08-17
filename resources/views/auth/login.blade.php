@extends('layouts.auth')
  
@section('content')
<div class="row justify-content-center">
<div class="col-xl-10 col-lg-12 col-md-9">
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <a href="{{url('/')}}"><h1 class="h4 text-gray-900 mb-4">Barkatul Kaunain</h1></a>
                    </div>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                placeholder="Masukan Alamat Email">
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Kata Sandi">
                             @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Masuk
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{route('register')}}">Buat Akun?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
