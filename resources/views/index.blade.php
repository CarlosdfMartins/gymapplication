@extends('layouts.page1')

@section('styles')
<style>
    body {
        /* Define a altura do corpo para ocupar a tela inteira */
        height: 100vh;
        /* Adiciona um gradiente sobre as imagens do carrossel para torná-las menos pronunciadas */
        background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
                    url('{{ asset("assets/images/img_Slide4_1.jpg") }}') center center/cover fixed no-repeat;
        /* Outros estilos do corpo, se necessário */
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff; /* Cor do texto */
        cursor: pointer;
    }

    /* Estilize o botão para ser centralizado */
    .center-page {
        text-align: center;
    }
</style>

<script>
    // Adicione um evento de clique ao corpo da página
    document.body.addEventListener('click', function() {
        // Redirecione para a rota de login
        window.location.href = '{{ route('login') }}';
    });
</script>
@endsection


