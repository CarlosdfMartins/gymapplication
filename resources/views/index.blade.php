@extends('layouts.page1')

@section('styles')

    {{-- front page --}}

    <style>
        body {

            height: 100vh;

            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
                url('{{ asset('assets/images/img_Slide4_1.jpg') }}') center center/cover fixed no-repeat;

            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: pointer;
        }

        .center-page {
            text-align: center;
        }
    </style>

    <script>
        document.body.addEventListener('click', function() {

            window.location.href = '{{ route('login') }}';
        });
    </script>
@endsection
