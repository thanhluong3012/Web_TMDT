<?php

use App\Http\Controllers\Admin\ControllerLogin;
use App\Http\Controllers\loaiTBController;
use App\Http\Controllers\thietbiController;
use App\Models\loaiTB;
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


//login
Route::get('user/login', function () {
    return view('user.login');
})->middleware('checkLogin')->name('admin.login');
Route::post('admin/login', [ControllerLogin::class , 'login'])->name('login');

//register
Route::get('user/register', function () {
    return view('user.register');
})->middleware('checkLogin')->name('admin.register');
Route::post('admin/register', [ControllerLogin::class , 'register'])->name('register');

Route::post('logout', [ControllerLogin::class, 'logout'])->name('logout');
Route::get('logout', function(){
    $error404 = '404';
    return view('home',compact('error404'));
});

Route::get('/index', function () {
    return view('home');
})->name('admin');
Route::post('/index/search', [loaiTBController::class,'search'])->name('search');


Route::prefix('')->group(function(){
    Route::get('/', function () {
        return view('home');
    })->middleware('checkAccount')->name('admin'); 
    // Loại thiết bị(Thêm, sửa, xóa)
    Route::get('/loaiTB', [loaiTBController::class,'index'])->name('loaiTB');
    Route::get('/loaiTB/them', [loaiTBController::class,'create'])->name('loaiTB.them'); 
    Route::post('/loaiTB/them', [loaiTBController::class,'store'])->name('loaiTB.add'); 
    Route::delete('/loaiTB/delete/{id}', [loaiTBController::class,'delete'])->name('loaiTB.delete'); //{id truyền 1 id vào đường URL}
    Route::get('/loaiTB/Edit/{id}', [loaiTBController::class,'edit'])->name('loaiTB.Edit');
    Route::put('/loaiTB/update/{id}', [loaiTBController::class,'update'])->name('loaiTB.update');

    //Thiết bị 
    Route::get('/thietbi', [thietbiController::class,'index'])->name('thietbi');
    Route::get('thietbi/them',[thietbiController::class, 'create'])->name('ThietBi.add');
    Route::post('/thietbi/them', [thietbiController::class,'store'])->name('thietbi.add'); 
    Route::delete('/thietbi/delete/{id}', [thietbiController::class,'delete'])->name('thietbi.delete'); //{id truyền 1 id vào đường URL}
    Route::get('/thietbi/edit/{id}', [thietbiController::class,'edit'])->name('Thietbi.edit'); 
    Route::put('/thietbi/update/{id}', [thietbiController::class,'update'])->name('thietbi.update');

})->middleware('checkAccount');

// Route::get('/WarmGuysGym', function () {
//     return view('Home.index');
// })->name('Home');
// // Route::get('/WarmGuysGym', [thietbiController::class,'index'])->name('device');
