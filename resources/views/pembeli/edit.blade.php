@extends('layouts.template')
@section('judulh1','Admin - pembeli')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your
        input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data pembeli</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pembeli.update',$pembeli->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama pembeli</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="" value="{{ $pembeli->nama }}">
                <!-- </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $pembeli->email }}">
                </div> -->
                <div class="form-group">
                    <label for="hp">No Telepon</label>
                    <input type="text" class="form-control" id="hp" name="hp" value="{{ $pembeli->hp }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea id="alamat" name="alamat" class=" formcontrol" rows="4">{{ $pembeli->alamat }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-warning floatright">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection