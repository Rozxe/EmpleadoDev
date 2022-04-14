<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadoController;

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

Route::get('/', function () {
    return redirect("/empleado");
});


// Route::get('/empleado', function () {
//     return view('empleado/listaEmpleado');
// });

Route::get('/empleado', [empleadoController::class, 'vistaListarEmpleados']);
Route::get('/modificarEmpleado/{emp}', [empleadoController::class, 'vistaModificarEmpleado']);
Route::post('/modificarEmpleado', [empleadoController::class, 'ModificarEmpleado'])->name('modificarEmpleado');
Route::get('/eliminarEmpleado/{emp}', [empleadoController::class, 'eliminarEmpleado']);
Route::get('/crearEmpleado', [empleadoController::class, 'vistaCrearEmpleado']);
Route::post('/crearEmpleado', [empleadoController::class, 'crearEmpleado']);
