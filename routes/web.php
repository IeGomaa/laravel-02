<?php

use App\Http\Controllers\DepartmentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('department/all',[DepartmentController::class,'index'])->name('department.index');
Route::get('department/insert',[DepartmentController::class,'insert'])->name('department.insert');
Route::post('department/create',[DepartmentController::class,'create'])->name('department.create');
Route::delete('department/delete',[DepartmentController::class,'delete'])->name('department.delete');

Route::post('department/edit',[DepartmentController::class,'edit'])->name('department.edit');
Route::put('department/update',[DepartmentController::class,'update'])->name('department.update');
