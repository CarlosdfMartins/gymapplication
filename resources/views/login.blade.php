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

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('login') }}" method="post">
                    @csrf


                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="email" name="user" value="{{ old('user') }}" placeholder="username"
                                class="form-control">
                        </label>
                    </div>

                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="password" name="pass" placeholder="password" class="form-control">
                        </label>
                    </div>

                    <div class="text-center my-3 form-group">
                        <label>
                            <input type="submit" value="LOGIN" class="btn btn-light">
                        </label>
                    </div>
                </form>

                @if ($erro)
                    <div class="alert alert-danger p-2 text-center">
                        {{ isset($erro) && $erro != '' ? $erro : '' }}
                    </div>
                @endif



            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
