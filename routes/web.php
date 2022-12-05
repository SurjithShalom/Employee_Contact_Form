<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ImportController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/',[EmployeeController::class,'index']);
Route::get('/employee/create',[EmployeeController::class,'create']);
Route::post('/employee/store',[EmployeeController::class,'store']);
Route::get('/employee/edit/{id}',[EmployeeController::class,'edit']);
Route::post('/employee/update/{id}',[EmployeeController::class,'update']);
Route::get('/employee/delete/{id}/{q_id}/{e_id}/{d_id}',[EmployeeController::class,'delete']);
Route::get('/employee/pdf',[EmployeeController::class,'PDF']);
Route::get('/chart',[EmployeeController::class,'chart']);

Route::post('file-import', [ImportController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [ImportController::class, 'fileexport'])->name('file-export');
Route::get('file-pdf', [ImportController::class, 'filepdf'])->name('file-pdf');
