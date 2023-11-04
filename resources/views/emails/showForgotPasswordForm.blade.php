@extends('layouts.page3Mail')


@section('content')

    {{-- view for password recovery --}}

    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">
                    <div>
                        <h4><strong>Esqueceu-se da password</strong></h4>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <p>Por favor introduza o seu email.
                                    Só assim será enviado um email que possibilitará recuperação da sua password.</p>
                                <form action="{{ route('generateNewToken') }}" method="post">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-8 col-sm-6">
                                            <label for="email" class="form-label" required>Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" required>
                                            </label>
                                        </div>

                                        <div class="mb-3 my-2">
                                            <a href="{{ route('index') }}" class="btn btn-light">Cancelar</a>
                                            <button type="submit" class="btn btn-light">Enviar</button>
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
