<?php


use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

Route::get('/', [App\Http\Controllers\Main::class, 'index'])->name('index');

Route::get('/login/{erro?}', [App\Http\Controllers\Main::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Main::class, 'confirmation'])->name('login');

Route::middleware('validacao:padrao,visitante')->prefix('/app')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin::class, 'home'])->name('app.home');
    Route::get('/exit', [App\Http\Controllers\Admin::class, 'logOut'])->name('app.exit');
    Route::get('/admin', [App\Http\Controllers\Admin::class, 'principalAdmin'])->name('app.admin');

    Route::get('/train', [App\Http\Controllers\Main::class, 'train'])->name('app.training');
    Route::get('/evol', [App\Http\Controllers\Main::class, 'evol'])->name('app.evolution');

    Route::get('/resetpassword/{token}', [App\Http\Controllers\ResetPass::class, 'reset'])->name('app.resetpass');
    Route::post('/resetpassword/{token}', [App\Http\Controllers\ResetPass::class, 'definePass'])->name('app.definePass');

    Route::get('/form', [App\Http\Controllers\Forms::class, 'frm'])->name('app.form');
    Route::post('/form', [App\Http\Controllers\Forms::class, 'sendForm'])->name('app.sendform');
    Route::get('/formSearch', [App\Http\Controllers\Forms::class, 'search'])->name('app.formSearch');
    Route::get('/formConsult', [App\Http\Controllers\Forms::class, 'consult'])->name('app.formConsult');



    Route::get('/nutri', [App\Http\Controllers\Main::class, 'nutri'])->name('app.nutrition');
    Route::get('/nutriConsult', [App\Http\Controllers\Nutricao::class, 'formNutriConsult'])->name('app.formNutriConsult');
    Route::get('/nutriSearch/{id}', [App\Http\Controllers\Nutricao::class, 'formNutriSearch'])->name('app.nutriSearch');
    Route::get('/dadosBIOConsult/{id}', [App\Http\Controllers\Nutricao::class, 'dadosBIO'])->name('app.dadosBIOConsult');
    Route::get('/socio', [App\Http\Controllers\Nutricao::class, 'socio'])->name('app.socio');



    Route::post('storeFormNutri/{id}', [App\Http\Controllers\Nutricao::class, 'storeFormNutri'])->name('app.storeFormNutri');
    Route::get('/formNutrie/{id}', [App\Http\Controllers\Nutricao::class, 'formNutrie'])->name('app.formNutrie');
});

