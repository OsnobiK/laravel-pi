<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Mostra a página de perfil do usuário.
     */
    public function show()
    {
        // Supondo que a view que você mostrou na imagem se chama 'perfil.show'
        // ou simplesmente 'perfil'
        return view('perfil', ['user' => Auth::user()]);
    }

    /**
     * Mostra o formulário para editar o perfil.
     */
    public function edit()
    {
        return view('perfil-edit', ['user' => Auth::user()]);
    }

    /**
     * Atualiza as informações do perfil do usuário no banco de dados.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validação dos dados
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios')->ignore($user->id)],
            'telefone' => ['nullable', 'string', 'max:20'],
            'cidade' => ['nullable', 'string', 'max:100'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Imagem, max 2MB
        ]);

        // 2. Atualiza os dados simples
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefone = $request->telefone;
        $user->cidade = $request->cidade;

        // 3. Atualiza a senha APENAS se uma nova foi digitada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 4. Faz o upload da imagem de perfil APENAS se uma nova foi enviada
        if ($request->hasFile('profile_image')) {
            // Deleta a imagem antiga se existir
            // if ($user->profile_image) {
            //     Storage::disk('public')->delete($user->profile_image);
            // }
            $path = $request->file('profile_image')->store('profile-images', 'public');
            $user->profile_image = $path;
        }
        
        // 5. Salva todas as alterações no banco
        $user->save();

        // 6. Redireciona de volta para a página de perfil com uma mensagem de sucesso
        return redirect()->route('perfil.show')->with('success', 'Perfil atualizado com sucesso!');
    }
}