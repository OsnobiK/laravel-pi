<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CreatesNewUsers; // Importa o Trait
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class CadastroController extends Controller
{
    use CreatesNewUsers;
    protected function validator(array $data)
{
    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'], // ou 'unique:users'
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => ['required', 'string', Rule::in(['user', 'medico'])], // <-- ADICIONE ESTA LINHA
    ]);
} // "Usa" o Trait dentro da classe

    public function create()
    
    {
        return view('cadastro');
    }

    protected function create(array $data)
{
    return User::create([ // ou return Usuario::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role'], // <-- ADICIONE ESTA LINHA
    ]);
}

   // Em app/Http/Controllers/CadastroController.php


public function store(Request $request)
{
    // A linha dd($request->all()); foi removida daqui.

    try {
        // Tenta chamar o método do Trait para validar e criar o usuário
        $usuario = $this->createUser($request);

        // Se der certo, faz o login
        Auth::login($usuario);

        // E redireciona com sucesso
        return redirect()->route('perfil.show')->with('success', 'Cadastro realizado com sucesso!!!');

    } catch (\Exception $e) {
        // 👇 SE ALGO DER ERRADO, O CÓDIGO VAI PARAR AQUI E MOSTRAR O ERRO REAL 👇
        dd($e->getMessage()); 

        // O código abaixo não será executado enquanto o dd() estiver ativo
        Log::error('Erro ao cadastrar usuário: ' . $e->getMessage());
        return back()->withInput()->withErrors(['cadastro' => ' Erro ao realizar cadastro. Por favor, tente novamente.']);
    }
}
}
