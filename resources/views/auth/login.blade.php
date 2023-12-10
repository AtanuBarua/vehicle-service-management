@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</div>

                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @endisset
                            @csrf
                            @if (Session::get('error'))
                            <div class="form-group row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-6 ">
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error')}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                                    }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                </div>

                            </div>
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-8 offset-md-4">
                                    <a href="{{route('google.login')}}" class="col-md-9 btn btn-danger"><i
                                            class="fa-brands fa-google"></i> Sign in with Google</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div><br>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $adminEmail = "admin@gmail.com";
                    $adminPass = "admin@gmail.com";

                    $userEmail = "user@gmail.com";
                    $userPass = "12345678";
                    @endphp
                    <tr>
                        <td>Admin</td>
                        <td>{{$adminEmail}}</td>
                        <td>{{$adminPass}}</td>
                        <td><button class="btn btn-success"
                                onclick="set('{{$adminEmail}}','{{$adminPass}}')">Select</button></td>
                    </tr>
                    <tr>
                        <td>User</td>
                        <td>{{$userEmail}}</td>
                        <td>{{$userPass}}</td>
                        <td><button class="btn btn-success"
                                onclick="set('{{$userEmail}}','{{$userPass}}')">Select</button></td>
                    </tr>
                    {{-- <tr>
                        <td>Technician</td>
                        <td>tech@gmail.com</td>
                        <td>tech@gmail.com</td>
                        <td><button class="btn btn-success" onclick="admin()">Select</button></td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function set(email,pass){
                $("#email").val(email);
                $("#password").val(pass);
            }     
</script>
@endsection