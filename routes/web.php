<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\LaudoController;
use App\Http\Controllers\MedicoController;

// Importe seu controller



// Rota para exibir o formulário de cadastro
Route::get('/cadastro', [CadastroController::class, 'create'])->name('cadastro.create');

// Rota para processar o formulário de cadastro
Route::post('/cadastro', [CadastroController::class, 'store'])->name('cadastro.store');

Route::get('/termos-de-servico', function () {
    return view('termos-de-servico'); 
});

// A rota '/' pode ser a home.blade.php agora
Route::get('/', function () {
    return view('home'); // <<-- Sugiro que a home seja a '/'
})->name('home'); // Nomeie a rota home para facilitar o acesso em links

// Rota para a home (pode ser redundante se a '/' já for a home)
Route::get('/home', function () {
    return redirect()->route('home'); 
});

Route::get('/area-user', function () {
    return redirect()->route('area-user'); 
});

Route::get('/area', function () {
    return view('area-user'); 
})->name('area-user'); 

Route::get('/sobre', function () {
    return redirect()->route('sobre'); 
});

Route::get('/sobre', function () {
    return view('sobre'); 
})->name('sobre'); 

Route::get('/termos', function () {
    return view('termos');
})->name('termos');

Route::get('/cadastrolaudo', function () {
    return view('cadastrolaudo');
})->name('cadastrolaudo');

Route::get('/recuperacao', function () {
    return view('recuperacao');
})->name('recuperacao');

Route::get('/redefinicao', function () {
    return view('redefinicao');
})->name('redefinicao');

// ... outras rotas
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Área do usuário (protegida)
Route::middleware('auth')->group(function () { // Corrigido: middleware 'auth'
    Route::get('/area-usuario', function () {
        return view('area-user');
    })->name('area.usuario');
 
    Route::get('/area', function () {
        return redirect()->route('area.usuario');
    })->name('area-user');

    Route::middleware('auth')->group(function () {
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
});
});



Route::get('/cadastromedico', function () {
    return view('cadastromedico');
})->name('cadastromedico');// <-- Adiciona o fechamento do grupo middleware
 
// ROTAS DE SALAS
Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
Route::get('/criar-salas', [SalaController::class, 'create'])->name('criar-salas');
Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
 
// Laudo
Route::post('/laudo', [LaudoController::class, 'store'])->name('laudo.store');
 
// Escolha
 
Route::get('/escolha', function () {
    return view('escolha');
})->name('escolha');
 
// Rota para exibir o formulário de cadastro
Route::get('/cadastromedico', [MedicoController::class, 'create'])->name('cadastromedico.create');
 
// Rota para processar o formulário de cadastro
Route::post('/cadastromedico', [MedicoController::class, 'store'])->name('cadastromedico.store');
 
Route::middleware('auth.medico')->group(function () {
    Route::get('/perfil-medico', function () {
        return view('perfil-medico');
    });
});




