<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::guard('medico')->attempt($credentials)) {
        // Login bem-sucedido
        return redirect()->route('perfil-medico');
    }

    // Falha no login
    return back()->withErrors(['email' => 'Credenciais inválidas.']);
}


    public function store(Request $request)
    {
        // Validação dos dados
    $validated = $request->validate([
    'nome' => 'required|string|max:100',
    'cpf' => 'nullable|string|max:14|unique:medicos',
    'especialidade' => 'nullable|string|max:100',
    'crm' => 'nullable|string|max:20|unique:medicos',
    'telefone' => 'nullable|string|max:20',
    'email' => 'required|email|unique:medicos',
    'password' => 'required|string|min:6|confirmed', // O 'confirmed' pede um campo password_confirmation
    ]);

    // Criptografar a senha
    $validated['password'] = Hash::make($validated['password']);

    // Criar o médico
    $medico = Medico::create($validated);

    return redirect()->route('home')->with('success', 'Médico cadastrado com sucesso!');

    // Retornar resposta
    return response()->json([
        'message' => 'Médico cadastrado com sucesso!',
        'data' => $medico,
    ], 201);
    }
    public function create()
    {
        return view('cadastromedico');
    }


}