<?php

use App\Http\Controllers\Panel\MainController as PanelMain;
use App\Http\Controllers\Site\MainController as SiteMain;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# Rotas do Site
Route::name("site.")->group(function () {

     #Rotas do Controller Main
     Route::name("main.")->group(function () {

          #Rota Index do Site
          Route::get('/', [SiteMain::class, "index"])->name("index");
     });
});



Auth::routes();

# Rotas do Painel
Route::middleware("auth")->name("panel.")->group(function () {

     #Rotas do Controller Main
     Route::name("main.")->group(function () {

          #Rota Index do Painel
          Route::get('/painel-de-controle/', [PanelMain::class, "index"])->name("index");
     });
});




# Rotas do System
Route::name("system.")->group(function () {

     #Rotas do Controller Main
     Route::name("main.")->group(function () {

          #Rota Index do Controle de Sistema
          Route::get('/system/', [PanelMain::class, "index"])->name("index");
     });
});
