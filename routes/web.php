<?php

use App\Models\dataBarang;
use App\Http\Controllers\dataBarangController;
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
    //tampilkan data barang dan cari
    if (request()->has('cari')) {
        $dataBarang = dataBarang::where('nama_barang', 'LIKE', '%' . request('cari') . '%')->get();
    } else {
        $dataBarang = dataBarang::all();
    }
    //mengambil total harga barang di dataBrang
    $totalHarga = 0;
    foreach ($dataBarang as $barang) {
        $totalHarga += $barang->harga_barang * $barang->jumlah_barang;
    }
    //ubah format penulisan total harga menjadi format rupiah
    $totalHarga = number_format($totalHarga, 0, ',', '.');
    return view(
        'barangdagang',
        [
            'title' => 'Barang Dagang',
            'dataBarang' => $dataBarang,
            'totalHarga' => $totalHarga,
        ]
    );
});
Route::post('/simpandatabarang', [dataBarangController::class, 'store']);
Route::get('/hapusdatabarang/{dataBarang}', [dataBarangController::class, 'delete']);
Route::get('/editdatabarang/{dataBarang}', [dataBarangController::class, 'show']);
Route::put('/updatedatabarang/{dataBarang}', [dataBarangController::class, 'edit']);
