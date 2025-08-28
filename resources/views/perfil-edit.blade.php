<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Conexus</title>
    <!-- Importação da fonte Poppins do Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Script do Tailwind CSS para estilização rápida -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Script do IMask.js para criar máscaras de input -->
    <script src="https://unpkg.com/imask"></script>
    <style>
        /* Estilos personalizados para complementar o Tailwind */
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #14afa0, #6c57d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .profile-image-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .file-input-label {
            cursor: pointer;
            background-color: #f3f4f6;
            color: #4b5563;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .file-input-label:hover {
            background-color: #e5e7eb;
        }
        .form-input:focus {
            outline: none;
            border-color: #8f7af6;
            box-shadow: 0 0 0 3px rgba(143, 122, 246, 0.2);
        }
    </style>
</head>
{{-- 👇 MUDANÇA AQUI: Fundo gradiente aplicado diretamente no body --}}
<body class="bg-gradient-to-r from-cyan-400 to-purple-500 min-h-screen flex items-center justify-center p-4">

    <div class="container max-w-2xl mx-auto p-8 bg-white rounded-2xl shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold gradient-text">Editar Perfil</h1>
            <p class="text-gray-600 mt-2">Altere apenas os campos que desejar.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                <strong class="font-bold">Opa! Algo deu errado.</strong>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="flex flex-col items-center space-y-4">
                <label class="font-semibold text-gray-700">Foto de Perfil:</label>
                <img id="imagePreview" src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://placehold.co/120x120/EFEFEF/AAAAAA?text=Perfil' }}" alt="Pré-visualização da foto de perfil" class="profile-image-preview">
                <label for="profile_image" class="file-input-label font-medium">
                    Escolher Imagem
                </label>
                <input type="file" id="profile_image" name="profile_image" class="hidden" accept="image/*">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block font-semibold text-gray-700 mb-2">Nome:</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
                <div>
                    <label for="email" class="block font-semibold text-gray-700 mb-2">E-mail:</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
                <div>
                    <label for="telefone" class="block font-semibold text-gray-700 mb-2">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $user->telefone) }}" placeholder="(00) 00000-0000" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
                <div>
                    <label for="cidade" class="block font-semibold text-gray-700 mb-2">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" value="{{ old('cidade', $user->cidade) }}" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
            </div>

            <hr class="border-gray-200">

            <div class="text-center">
                <p class="text-gray-600">Deixe os campos de senha em branco para não alterá-la.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="password" class="block font-semibold text-gray-700 mb-2">Nova Senha:</label>
                    <input type="password" id="password" name="password" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
                <div>
                    <label for="password_confirmation" class="block font-semibold text-gray-700 mb-2">Confirmar Nova Senha:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full p-3 border border-gray-300 rounded-lg transition">
                </div>
            </div>

            <div class="text-center pt-4">
                <button type="submit" class="w-full md:w-auto bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-lg transition-transform transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    Salvar Alterações
                </button>
            </div>
        </form>

        {{-- 👇 MUDANÇA AQUI: Botão para voltar adicionado --}}
        <div class="text-center mt-6">
            <a href="{{ route('perfil.show') }}" class="text-gray-600 hover:text-purple-600 font-medium transition">
                Voltar para o Perfil
            </a>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lógica para pré-visualização da imagem
            const profileImageInput = document.getElementById('profile_image');
            const imagePreview = document.getElementById('imagePreview');
            if(profileImageInput) {
                profileImageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) { imagePreview.src = e.target.result; }
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Lógica para máscara de telefone
            const phoneInput = document.getElementById('telefone');
            if(phoneInput) {
                const phoneMaskOptions = {
                    mask: [ { mask: '(00) 0000-0000' }, { mask: '(00) 00000-0000' } ]
                };
                const mask = IMask(phoneInput, phoneMaskOptions);
            }
        });
    </script>

</body>
</html>
