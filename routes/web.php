<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

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



Route::get('/login', function () {
    return view('login'); 
})->name('login');


Route::get('/perfil', function () {
    return view('perfil'); // <<-- Sugiro que a home seja a '/'
})->name('perfil');// <-- Adiciona o fechamento do grupo middleware

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// ROTAS DE LOGIN PERSONALIZADAS
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// LOGOUT (encerra sessão e redireciona para Home)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');


// ROTA PARA ÁREA DO USUÁRIO (protegida por autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/area-usuario', function () {
        return view('area-user');
    })->name('area.usuario');
 
    Route::get('/area', function () {
        return redirect()->route('area.usuario');
    })->name('area-user');
});




// Se você não for usar o sistema de autenticação padrão do Laravel (Breeze/Jetstream)
// e vai gerenciar usuários apenas pela tabela 'usuarios', você pode *remover* ou comentar
// as rotas de autenticação padrão do Breeze/Jetstream, pois elas ainda apontariam para o Model User
// e a tabela users.
// require __DIR__.'/auth.php'; // Comente ou remova esta linha se não precisar mais.