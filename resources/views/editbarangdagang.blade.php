@extends('mytemplate.main')
@section('content')
<br>
<div class="container">
    <div class="card">
        <div class="card-header bg-danger text-center text-white">
            <h3>Edit Data Barang</h3>
        </div>
        <div class="card-body">
            <form action="/updatedatabarang/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama_Barang">Nama Barang</label>
                            <input type="text" id="nama_Barang" name="nama_barang" value="{{ $data->nama_barang }}" class="form-control" placeholder="Nama barang" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="harga_Barang">Harga Barang</label>
                            <input type="number" id="harga_Barang" name="harga_barang" value="{{ $data->harga_barang }}" class="form-control" placeholder="Harga barang" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jumlah_Barang">Jumlah Barang</label>
                            <input type="number" id="jumlah_Barang" name="jumlah_barang" value="{{ $data->jumlah_barang }}" class="form-control" placeholder="Jumlah barang" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="satuan_Barang">Merek Barang</label>
                            <input type="text" id="satuan_Barang" name="merek_barang" value="{{ $data->merek_barang }}" class="form-control" placeholder="Merek Barang" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="keterangan_Barang">Keterangan Barang</label>
                            <textarea name="keterangan_barang" id="keterangan_Barang" cols="30" rows="10" class="form-control" placeholder="Keterangan barang" required>{{ $data->keterangan_barang }}</textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class=" btn btn-success">Simpan</button>
                <a href="/" class="btn btn-dark">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection