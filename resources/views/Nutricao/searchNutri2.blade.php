@extends('layouts.page2')

@section('content')
    <div class="container-fluid mt-5 mb-5">
        <div class="row justify-content-center pb-5">
            <div class="col-lg-8 col-md-10">
                <div class="card p-4">

                    <h2>NUTRIÇÃO</h2>

                    <hr>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nomeSocios as $nsocios)
                                <tr>
                                    <td>
                                        <a
                                            href="{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}">{{ $nsocios->id }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}">{{ $nsocios->nome }}
                                            {{ $nsocios->apelido }}</a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}">{{ $nsocios->telefone }}</a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('app.nutriSearch', ['id' => $nsocios->id]) }}">{{ $nsocios->email }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
@endsection
