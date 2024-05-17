@extends('layouts.template')
    @section('tambahanCSS')
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    @endsection
    @section('judulh1','Admin - Pembeli')
    @section('konten')

    <div class="col-md-4">

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Input Pembeli</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pembeli.store') }}" method="POST">
            @csrf
            <div class=" card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder=" Nama Lengkap" required value="{{ old('nama') }}">
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder=" Alamat" required value="{{ old('alamat') }}">
                </div>

                
                <div class="form-group">
                    <label for="hp">No hp</label>
                    <input type="text" class="form-control" id="hp" name="hp" placeholder=" No telepon" required value="{{ old('hp') }}">
                </div>
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>


</div>

    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h2 class="card-title">Data Customer</h2>
                <!-- <a type="button" class="btn btn-success float-right" href="{{ route('pembeli.create') }}">
                    <i class=" fas fa-plus"></i>Tambah Customer
                </a> -->
            </div>
            <!-- /.card-header -->

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->alamat }}</td>
                            <td>{{ $dt->hp }}</td>
                            <td>
                                <div class="btn-group">
                                    <a type="button" class="btn btn-warning" href="{{ route('pembeli.edit',$dt->id) }}">
                                        <i class=" fas fa-edit"></i>
                                    </a>
                                    <a type="button" class="btn btn-success" href="{{ route('pembeli.show',$dt->id) }}">
                                        <i class=" fas fa-eye"></i>
                                    </a>
                                </div>


                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>


        </div>
    </div>
    @endsection

    @section('tambahanJS')
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @endsection

    @section('tambahScript')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "responsive": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        @if($message = Session::get('success'))
        toastr.success("{{ $message}}");
        @endif
        @if($message = Session::get('updated'))
        toastr.warning("{{ $message}}");
        @endif
    </script>
    @endsection

</body>

</html>