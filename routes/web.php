<?php

use App\Http\Controllers\VideoFiles;
use App\Models\VideoFileModel;
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
    $data['list'] = VideoFileModel::get();
    return view('welcome')->with($data);
});


Route::get('/upload-file', [VideoFiles::class, 'createForm'])->name('createForm');

Route::post('/upload-file', [VideoFiles::class, 'fileUpload'])->name('fileUpload');
