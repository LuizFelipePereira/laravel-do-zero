<?php

use App\Http\Controllers\Panel\MainController as PanelMain;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Site\MainController as SiteMain;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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


#Insert global variables
view()->composer('*', function ($view) {
     $routeCurrent = Route::getCurrentRoute();
     $titleBreadCrumb = isset($routeCurrent->wheres["titleBreadCrumb"]) ? $routeCurrent->wheres["titleBreadCrumb"] : "Sem Titulo de BreadCrumb";
     $routeActive = Route::currentRouteName();
     $route = explode(".", $routeActive);
     $routeAmbient = $route[0] ?? null;
     $routeCrud = $route[1] ?? null;
     $routeMethod = $route[2] ?? null;

     // GIT BRANCH ACTIVE

     $fileGit = file("../.git/HEAD", FILE_USE_INCLUDE_PATH);
     $firstLine = $fileGit[0];
     $explodeGit = explode("/", $firstLine, 3);
     $branch = ucfirst(str_replace(["\n"], [""], $explodeGit[2]));
     //

     $view
          ->with("routeCurrent", $routeCurrent)
          ->with("routeActive", $routeActive)
          ->with("routeAmbient", $routeAmbient)
          ->with("routeCrud", $routeCrud)
          ->with("routeMethod", $routeMethod)
          ->with("branch", $branch)
          ->with("titleBreadCrumb", $titleBreadCrumb);
});

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
          Route::get('/painel-de-controle/', [PanelMain::class, "index"])
               ->name("index")
               ->setWheres([
                    "titleBreadCrumb" => "Pagina Principal"
               ]);
     });
     #Rota de lista de usuario
     Route::name("user.")->group(function () {

          #Rota dos Dados dos usuarios
          Route::get('/usuarios/show/{id?}', [UserController::class, "show"])
               ->name("show")
               ->setWheres([
                    "titleBreadCrumb" => "Dados dos Usuários"
               ]);

          #Rota da lista de usuarios
          Route::get('/usuarios/', [UserController::class, "index"])
               ->name("index")
               ->setWheres([
                    "titleBreadCrumb" => "Lista de Usuários"
               ]);

          #Rota de gravação de usuarios
          Route::post('/usuarios/cadastro', [UserController::class, "store"])
               ->name("store")
               ->setWheres([
                    "titleBreadCrumb" => "Gravação de Usuários"
               ]);
          #Rota de edição de usuarios
          Route::put('/usuarios/edicao', [UserController::class, "update"])
               ->name("update")
               ->setWheres([
                    "titleBreadCrumb" => "Edição de Usuários"
               ]);
          #Rota de exclusão de usuarios
          Route::delete('/usuarios/exclusao/{id}', [UserController::class, "delete"])
               ->name("delete")
               ->setWheres([
                    "titleBreadCrumb" => "Exclusão de Usuários"
               ]);
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
