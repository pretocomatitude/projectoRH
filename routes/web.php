<?php
    use App\Http\Controllers\FuncionarioController;
    use App\Models\Funcionario;
    use App\Http\Controllers\RecrutamentoController;
    use App\Models\Recrutamento;
    use App\Models\Feria;
    use App\Http\Controllers\FeriaController;
    use Illuminate\support\facades\Route;
    use App\Http\Controllers\UserController;

Route::get("sair", function () {
    Auth::logout();
    return view('auth.login');
})->name('sair');
 Route::group(['middleware'=>'auth'], function(){
    Route::get('/', function () {
        $nome = 56;
        return view('page.inicio',compact('nome', )); 
        });
        Route::get('user', [UserController::class,'index' ])->name('usuario');
        Route::post('user', [UserController::class,'store' ])->name('user.store');
        Route::get('apagar/{id}', [UserController::class,'apagar' ])->name('user.apagar');

        Route::get('funcionario', [FuncionarioController::class,'index' ])->name('funcionario');
        Route::post('funcionario', [FuncionarioController::class,'store' ])->name('funcionario.store');
        Route::get('apagar/{id}/funcionario', [FuncionarioController::class,'apagar' ])->name('funcionario.apagar');
        
        Route::get('recrutamento', [RecrutamentoController::class, 'index'])->name('recrutamento');     
        Route::post('recrutamento', [RecrutamentoController::class, 'store'])->name('recrutamento.store');
        Route::get('apagar/{id}/recrutamento', [RecrutamentoController::class, 'apagar'])->name('recrutamento.apagar');
    
        Route::get('feria', [FeriaController::class, 'index'])->name('feria');     
        Route::post('feria', [FeriaController::class, 'store'])->name('feria.store');
        Route::get('apagar/{id}/feria', [FeriaController::class, 'apagar'])->name('feria.apagar');
        Route::get('aprovado/{id}', [FeriaController::class, 'aprovado'])->name('feria.aprovado');
        Route::get('recusado/{id}', [FeriaController::class, 'recusado'])->name('feria.recusado');
});
    
    Auth::routes();
    Route::get('/home', function () {
        return redirect('/');
    })->name('home');
