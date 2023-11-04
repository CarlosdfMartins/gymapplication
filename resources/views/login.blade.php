@extends('layouts.page1')

@section('styles')
    <style>
        body {
            background-image: url('assets/images/GYM.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection

{{-- login page --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('login') }}" method="post">
                    @csrf


                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="email" name="user" value="{{ old('user') }}" placeholder="username"
                                class="form-control d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2"
                                required>
                        </label>
                    </div>

                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="password" name="pass" placeholder="password"
                                class="form-control d-inline-flex focus-ring focus-ring-light py-1 px-2 text-decoration-none border rounded-2"
                                required>
                        </label>
                    </div>

                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="submit" value="LOGIN" class="btn btn-light">
                        </label>
                    </div>
                </form>
                <div class="center-page">
                    <div class="footername text-center form-group"> <a href="{{ route('showForgotPasswordForm') }}"
                            class="link-light  link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover"><small>Esqueci-me
                                da password</small> </a></div>
                </div>

                @if ($erro)
                    <div class="alert alert-danger p-2 text-center">
                        {{ isset($erro) && $erro != '' ? $erro : '' }}
                    </div>
                @endif


                @if (session('error'))
                    <div class="alert alert-danger p-2 text-center">
                        {{ session('error') }}
                    </div>
                @endif



            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
