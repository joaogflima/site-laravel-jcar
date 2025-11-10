<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoPublicoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\VeiculoController;

// Área Pública (site)
Route::get('/', [VeiculoPublicoController::class, 'index'])->name('site.home');
Route::get('/veiculos/{id}', [VeiculoPublicoController::class, 'show'])->name('site.veiculo');
Route::view('/sobre', 'site.sobre.index')->name('site.sobre');

// Área Administrativa
Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', function(){
        return redirect()->route('veiculos.index');
    });
    Route::resource('marcas', MarcaController::class);
    Route::resource('modelos', ModeloController::class);
    Route::resource('cores', CorController::class);
    Route::resource('veiculos', VeiculoController::class);
});

Route::get('/dashboard', function() {
    return redirect()->route('site.home');
})->middleware(['auth']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
