<?php

use App\Models\dataBarang;
use App\Http\Controllers\dataBarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| TUBES UAS WEB PWE
|--------------------------------------------------------------------------
|
|Anggota :
|1. Dzaky Faishalariq
|2. Robby Mahendra
|3. Wiki Netra Juansyah
|4. Nabila Aulya Zalfa putri
|5. Wiwit Selasti
|6. M.Jumli Gazali
*/

Route::get('/', function () {
    //tampilkan data barang dan cari
    if (request()->has('cari')) {
        $dataBarang = dataBarang::where('nama_barang', 'LIKE', '%' . request('cari') . '%')->get();
    } else {
        $dataBarang = dataBarang::latest()->get();
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
