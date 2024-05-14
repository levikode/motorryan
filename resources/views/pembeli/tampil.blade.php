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
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data pembeli</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method=" POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama pembeli</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $pembeli->nama }}" disabled>
                </div>
                <!-- <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $pembeli->email }}" disabled>
                </div> -->
                <div class="form-group">
                    <label for="phone">No Telepon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $pembeli->hp }}" disabled>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" class=" formcontrol" rows="4" disabled>{{ $pembeli->alamat }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
        </form>
    </div>
</div>
@endsection