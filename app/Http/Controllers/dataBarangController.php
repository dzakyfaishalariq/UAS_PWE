<?php

namespace App\Http\Controllers;

use App\Models\dataBarang;
use Illuminate\Http\Request;

class dataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah barang
        $dataBarang = new dataBarang;
        $dataBarang->nama_barang = $request->nama_barang;
        $harga_barang = $request->harga_barang;
        // ubah dari string ke float
        $dataBarang->harga_barang = floatval($harga_barang);
        $jumlah_barang = $request->jumlah_barang;
        // ubah dari string ke integer
        $dataBarang->jumlah_barang = intval($jumlah_barang);
        $dataBarang->merek_barang = $request->merek_barang;
        $dataBarang->keterangan_barang = $request->keterangan_barang;
        // simpan ke database
        $dataBarang->save();
        // tampilkan pesan berhasil menyimpan
        return redirect('/')->with('success', 'Data barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function show(dataBarang $dataBarang)
    {
        $data = $dataBarang;
        return view('editbarangdagang', ['title' => 'ubah Data Dagang', 'data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(dataBarang $dataBarang, Request $request)
    {
        //ubah data barang
        $dataBarang->nama_barang = $request->nama_barang;
        $harga_barang = $request->harga_barang;
        // ubah dari string ke float
        $dataBarang->harga_barang = floatval($harga_barang);
        $jumlah_barang = $request->jumlah_barang;
        // ubah dari string ke integer
        $dataBarang->jumlah_barang = intval($jumlah_barang);
        $dataBarang->merek_barang = $request->merek_barang;
        $dataBarang->keterangan_barang = $request->keterangan_barang;
        // simpan ke database
        $dataBarang->save();
        // tampilkan pesan berhasil menyimpan
        return redirect('/')->with('success', 'Data barang berhasil diubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dataBarang $dataBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dataBarang  $dataBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(dataBarang $dataBarang)
    {
        //
    }
    public function delete(dataBarang $dataBarang)
    {
        //hapus barang
        $dataBarang->delete();
        // tampilkan pesan berhasil menghapus
        return redirect('/')->with('success', 'Data barang berhasil dihapus');
    }
}
