@extends('mytemplate.main')
@section('content')
<br>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="card">
    <div class="card-header text-center bg-danger text-white">
        <h3>Barang Dagang</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center text-white bg-danger">
                        <h4>Tambah data</h4>
                    </div>
                    <div class="card-body">
                        <!---cari barang --->
                        <form action="/">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="cari" class="form-control" placeholder="Cari barang...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-danger" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="/simpandatabarang" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_Barang">Nama Barang</label>
                                <input type="text" id="nama_Barang" name="nama_barang" class="form-control" placeholder="Nama barang" required>
                            </div>
                            <div class="form-group">
                                <label for="harga_Barang">Harga Barang</label>
                                <input type="number" id="harga_Barang" name="harga_barang" class="form-control" placeholder="Harga barang" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlah_Barang">Jumlah Barang</label>
                                        <input type="number" id="jumlah_Barang" name="jumlah_barang" class="form-control" placeholder="Jumlah barang" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="satuan_Barang">Merek Barang</label>
                                        <input type="text" id="satuan_Barang" name="merek_barang" class="form-control" placeholder="Merek Barang" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan_Barang">Keterangan Barang</label>
                                <textarea name="keterangan_barang" id="keterangan_Barang" cols="30" rows="10" class="form-control" placeholder="Keterangan barang" required></textarea>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class=" btn btn-primary">Upload</button>
                                </div>
                                <div class="col-6">
                                    <p>data akan di upload ke database</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    <div class="card-header text-center bg-danger text-white">
                        <h4>Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex">
                            @foreach($dataBarang as $brg)
                            <div class="col-4 flex-col">
                                <div class="card" >
                                    <img src="https://source.unsplash.com/500x400?{{ $brg->nama_barang }}" class="card-img-top" alt="{{ $brg->nama_barang }}">
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $brg->nama_barang }}</h5>
                                    <p class="card-text">{{ $brg->keterangan_barang }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item">harga Rp {{ $brg->harga_barang }}</li>
                                    <li class="list-group-item">Stok {{ $brg->jumlah_barang }}</li>
                                    <li class="list-group-item">Merek {{ $brg->merek_barang }}</li>
                                    </ul>
                                    <div class="card-body">
                                    <a href="/editdatabarang/{{ $brg->id }}" class="card-link btn btn-warning">Edit</a>
                                    <a href="/hapusdatabarang/{{ $brg->id }}" class="card-link btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <h1>Total Harga Seluruhnya</h1>
                    <h4>
                        Rp.{{ $totalHarga }},00
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection