<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;
use App\Http\Controllers\Admin;
use App\Http\Controllers\ResetPass;
use App\Http\Controllers\Forms;
use App\Http\Controllers\Nutricao;
use App\Http\Controllers\PersonalTrainerContr;

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

Route::get('/', [Main::class, 'index'])->name('index');
Route::get('/login/{erro?}', [Main::class, 'login'])->name('login');
Route::post('/login', [Main::class, 'confirmation'])->name('login');

Route::get('/showForgotPasswordForm', [ResetPass::class, 'showForgotPasswordForm'])->name('showForgotPasswordForm');
Route::post('/generateNewToken', [ResetPass::class, 'generateNewToken'])->name('generateNewToken');


// Route::middleware('validacao:padrao,visitante')->prefix('/app')->group(function () {
Route::get('/home', [Admin::class, 'home'])->name('app.home');
Route::get('/exit', [Admin::class, 'logOut'])->name('app.exit');
Route::get('/admin', [Admin::class, 'principalAdmin'])->name('app.admin');

Route::get('/train', [Main::class, 'train'])->name('app.training');
Route::get('/evol', [Main::class, 'evol'])->name('app.evolution');

Route::get('/resetpassword/{token}', [ResetPass::class, 'reset'])->name('app.resetpass');
Route::post('/resetpassword/{token}', [ResetPass::class, 'definePass'])->name('app.definePass');

Route::get('/form', [Forms::class, 'frm'])->name('app.form');
Route::post('/form', [Forms::class, 'sendForm'])->name('app.sendform');
Route::get('/formSearch', [Forms::class, 'search'])->name('app.formSearch');
Route::get('/formConsult', [Forms::class, 'consult'])->name('app.formConsult');
Route::get('/consultColabor', [Forms::class, 'consultColabor'])->name('app.consultColabor');
Route::get('/pesquiCola', [Forms::class, 'pesquiCola'])->name('app.pesquiCola');
Route::get('/searchCola/{id}', [Forms::class, 'searchCola'])->name('app.searchCola');

Route::get('/editNutricao/{profile}/{id}', [Forms::class, 'editNutricao'])->name('app.editNutricao');
Route::get('/editTreino/{profile}/{id}', [Forms::class, 'editTreino'])->name('app.editTreino');
Route::get('/menuEdit/{profile}/{id}', [Forms::class, 'menuEdit'])->name('app.menuEdit');
Route::get('/edit/{profile}/{id}', [Forms::class, 'edit'])->name('app.edit');
Route::put('/updatePNutricao/{profile}/{id}', [Forms::class, 'updatePNutricao'])->name('app.updatePNutricao');
Route::put('/update/{profile}/{id}', [Forms::class, 'update'])->name('app.update');
Route::get('/delete/{id}', [Forms::class, 'delete'])->name('app.delete');

Route::get('/nutri', [Main::class, 'nutri'])->name('app.nutrition');
Route::get('/nutriConsult', [Nutricao::class, 'formNutriConsult'])->name('app.formNutriConsult');
Route::get('/nutriSearch/{id}', [Nutricao::class, 'formNutriSearch'])->name('app.nutriSearch');
Route::get('/dadosBIOConsult/{id}', [Nutricao::class, 'dadosBIO'])->name('app.dadosBIOConsult');
Route::get('/socio', [Nutricao::class, 'socio'])->name('app.socio');
Route::get('/formNutrie/{id}', [Nutricao::class, 'formNutrie'])->name('app.formNutrie');
Route::post('/storeFormNutri/{id}', [Nutricao::class, 'storeFormNutri'])->name('app.storeFormNutri');

Route::get('/planNutrie/{id}', [Nutricao::class, 'planNutrie'])->name('app.planNutrie');
Route::post('/storePlanNutrie/{id}', [Nutricao::class, 'storePlanNutrie'])->name('app.storePlanNutrie');
Route::post('/dadosPlanNutrie/{id}', [Nutricao::class, 'dadosPlanNutrie'])->name('app.dadosPlanNutrie');
Route::get('/selectPlanNutrie/{id}', [Nutricao::class, 'selectPlanNutrie'])->name('app.selectPlanNutrie');
Route::get('/evolnutri/{id}', [Nutricao::class, 'evolnutri'])->name('app.evolnutri');

Route::get('/planTrain/{id}', [PersonalTrainerContr::class, 'planTrain'])->name('app.planTrain');
Route::get('/morePlanTrain/{id}/{plan_ID}', [PersonalTrainerContr::class, 'morePlanTrain'])->name('app.morePlanTrain');
Route::post('/storePlanTrain/{id}/{plan_ID}', [PersonalTrainerContr::class, 'storePlanTrain'])->name('app.storePlanTrain');
Route::get('/selectPlantrainer/{id}', [PersonalTrainerContr::class, 'selectPlantrainer'])->name('app.selectPlantrainer');
Route::post('/dadosPlanTrain/{id}', [PersonalTrainerContr::class, 'dadosPlanTrain'])->name('app.dadosPlanTrain');
// });
