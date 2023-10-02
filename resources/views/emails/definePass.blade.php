@extends('layouts.page3')


@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <div>
                        <h4><strong>Defina a sua password</strong></h4>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <form action="{{ route('app.definePass', ['token' => $token]) }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-sm-6">
                                            <label for="password" class="form-label" required>Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control" required>
                                            </label>
                                        </div>

                                        <div class="col-md-8 col-sm-6">
                                            <label for="password" class="form-label" required>Confirme password</label>
                                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                class="form-control" required>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-3 my-2">
                                        <a href="{{ route('index') }}" class="btn btn-light">Cancelar</a>
                                        <button type="submit" class="btn btn-light">Gravar</button>
                                    </div>
                                </form>

                                @if ($errors->any())
                                    <div class="alert alert-danger p-2 text-center">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
