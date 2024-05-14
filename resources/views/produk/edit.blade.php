@extends('layouts.template')
@section('judulh1','Admin - Produk')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Produk</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('produk.update',$produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
              
                <div class="form-group">
                    <label for="nama">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{$produk->nama}}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{$produk->stok}}">
                </div>
              
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$produk->price}}">
                </div>
                <div class=" form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ $produk->deskripsi }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
       
                <button type="submit" class="btn btn-warning floatright">Ubah</button>
            </div>
        </form>
    </div>
</div>
@endsection