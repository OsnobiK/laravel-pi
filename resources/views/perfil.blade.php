@extends('layouts.app')

@section('content')
<style>
   
 /* Usando variáveis CSS para facilitar a customização de cores */
    :root {
        --cor-primaria: #007bff;
        --cor-primaria-hover: #0056b3;
        --cor-perigo: #dc3545;
        --cor-perigo-hover: #c82333;
        --cor-fundo: #f0f2f5; /* Um cinza azulado suave */
        --cor-card: #ffffff;
        --cor-texto-principal: #333;
        --cor-texto-secundario: #6c757d;
        --sombra-card: 0 5px 15px rgba(0, 0, 0, 0.08);
        --borda-raio: 12px;
    }

    body {
        font-family: 'Poppins', Arial, sans-serif; /* Usando a fonte importada */
        background-color: var(--cor-fundo);
        margin: 0;
        padding: 20px; /* Adiciona um respiro nas laterais em telas pequenas */
    }

    .perfil-container {
        background-color: var(--cor-card);
        max-width: 500px;
        margin: 40px auto;
        padding: 40px;
        border-radius: var(--borda-raio);
        box-shadow: var(--sombra-card);
        text-align: center;
        border-top: 5px solid blue /* Detalhe visual no topo */
    }

   .perfil-foto {
    width: 150px;
    height: 150px;
    border-radius: 50%; /* Mantém a forma circular */
    object-fit: cover;    /* Garante que a imagem não se estique */
    
    /* --- A NOVA TÉCNICA PARA O DEGRADÊ --- */

    /* 1. Criamos um 'espaço' para a borda usando padding. */
    padding: 4px; /* Esta será a espessura da sua borda de degradê */

    /* 2. Aplicamos o degradê diretamente ao fundo do elemento.
       A sua imagem de perfil (o 'src' da tag <img>) vai aparecer por cima,
       deixando o degradê visível apenas na área do padding. */
    background: linear-gradient(45deg, #00ffcc, #7700ff, #00ffd0, #00ff91);
    
    margin: 0 auto 20px auto;
    display: block;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1); /* Sombra suave opcional */
}

    .perfil-nome {
        font-size: 2em; /* Um pouco maior para mais destaque */
        font-weight: 700;
        color: var(--cor-texto-principal);
        margin-bottom: 5px;
    }

    .perfil-email {
        color: var(--cor-texto-secundario);
        margin-bottom: 30px;
        font-size: 1.1em;
    }

    .perfil-info {
        text-align: left; /* Alinha o texto das informações à esquerda */
        margin-bottom: 30px;
    }

    .perfil-info div {
        display: flex; /* Usa Flexbox para alinhar label e valor */
        justify-content: space-between; /* Espaça os itens */
        padding: 12px 0;
        font-size: 1em;
        border-bottom: 1px solid #eee; /* Linha separadora sutil */
    }

    .perfil-info div:last-child {
        border-bottom: none; /* Remove a borda do último item */
    }

    .perfil-info strong {
        color: var(--cor-texto-principal);
        font-weight: 600;
    }

    .botoes-container {
        margin-top: 20px;
        /* Usa Flexbox para alinhar os botões e permitir que quebrem a linha em telas menores */
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px; /* Espaçamento entre os botões */
    }

    .button {
        background-color: var(--cor-primaria);
        color: white;
        padding: 12px 22px;
        border-radius: 8px; /* Bordas um pouco mais arredondadas */
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 0.95em;
        /* Transição suave para todas as propriedades */
        transition: all 0.3s ease;
    }

    .button:hover {
        background-color: var(--cor-primaria-hover);
        transform: translateY(-3px); /* Efeito de "levantar" o botão */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }
    
    .button-danger {
        background-color: var(--cor-perigo);
    }

    .button-danger:hover {
        background-color: var(--cor-perigo-hover);
    }

    /* Regra para telas pequenas (celulares) */
    @media (max-width: 600px) {
        .perfil-container {
            padding: 25px;
            margin: 20px auto;
        }
        .perfil-nome {
            font-size: 1.8em;
        }
    }
</style>

<div class="perfil-container">

    @if(Auth::user()->profile_image)
        <img class="perfil-foto" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Foto de Perfil">
    @else
        {{-- Uma imagem padrão caso o usuário não tenha enviado nenhuma --}}
        <img class="perfil-foto" src="https://i.pinimg.com/736x/11/49/7f/11497f10b3711b1b42a9e327159fc50c.jpg" alt="Foto de Perfil Padrão">
    @endif

    @auth
        <div class="perfil-nome">{{ Auth::user()->name }}</div>
        <div class="perfil-email">{{ Auth::user()->email }}</div>

        <div class="perfil-info">
            <div><strong>Idade:</strong> 428</div>
            <div><strong>Cidade:</strong> {{ Auth::user()->cidade ?? 'Não informado' }}</div>
            <div><strong>Telefone:</strong> {{ Auth::user()->telefone ?? 'Não informado' }}</div>
            <div><strong>Senha:</strong> ************</div>
        </div>

        <div class="botoes-container">
            <a class="button" href="{{ route('perfil.edit') }}">Editar Perfil</a>
            <a class="button" href="{{ route('cadastrolaudo') }}">Cadastrar Laudo</a>
            <a class="button" href="{{ route('home') }}">Ver Laudos</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="button button-danger">Desconectar</button>
            </form>
        </div>
    @endauth
</div>
@endsection