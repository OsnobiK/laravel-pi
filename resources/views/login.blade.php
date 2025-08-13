
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Conexus</title>
    <link rel="stylesheet" href="{{ asset('CSS/styles-login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="form-container">
            <h1 class="logo">C<span class="logo-o">o</span>nexus</h1>
            <h2>Bem-vindo de volta!</h2>
            <p>Acesse sua conta para continuar.</p>

            {{-- Formulário agora aponta para a rota 'login' com o método POST --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf {{-- DIRETIVA DE SEGURANÇA ESSENCIAL DO LARAVEL --}}

                <div class="input-group">
                    <label for="email">Email</label>
                    {{-- O old('email') recupera o email digitado em caso de erro --}}
                    <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" value="{{ old('email') }}" required>
                </div>

                {{-- Bloco para exibir a mensagem de erro --}}
                @error('email')
                    <div class="alert-error" style="color: red; font-size: 0.9em; margin-top: -10px; margin-bottom: 10px;">
                        <span>{{ $message }}</span>
                    </div>
                @enderror

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="options-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="manter-conectado" name="manter-conectado">
                        <label for="manter-conectado">Manter-me conectado</label>
                    </div>
                    {{-- Troque o link estático por uma rota, se tiver uma --}}
                    <a href="{{ route('recuperacao') }}" class="forgot-password">Esqueci a senha</a>
                </div>

                <button type="submit" class="submit-btn">Entrar</button>
            </form>
            {{-- Troque o link estático por uma rota, se tiver uma --}}
             <p class="login-link">Não tem uma conta? <a href="{{ route('cadastro.create') }}">Cadastre-se</a></p>
             <p class="login-link">Voltar para o <a href="{{ route('home') }}">Inicio</a></p>
        </div>
    </div>
</body>
</html>