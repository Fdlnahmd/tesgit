<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">
    <link rel="icon" type="image/x-icon"
        href="https://tse4.mm.bing.net/th?id=OIP.OM69Jyj-FOKepA5Ng2K6FQAAAA&pid=Api&P=0&h=180">
        @include('link')
</head>

<body class="hold-transition sidebar-mini">
    @include('headerdash')
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 d-flex justify-content-center align-items-center">
                        <div class="col-sm-6">
                            <h1>Data Laporan Pengaduan Sekolah</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content px-5">
                <!-- Default box -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 shadow px-5 py-5">
                            <form method="post" action="{{ route('laporan.updateStatus', $laporan->id) }}">
                                @csrf
                                @method('patch')
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="select-form">
                                    <option value="pending" @if ($laporan->status == 'menunggu') selected @endif>Menunggu</option>
                                    <option value="progress" @if ($laporan->status == 'proses') selected @endif>Proses</option>
                                    <option value="done" @if ($laporan->status == 'selesai!') selected @endif>Selesai!</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-danger mt-3">Update Status</button>
                            </form>
                            <h6 class="my-3">Kategori Laporan : {{ $laporan->kategori }}</h6>
                            <h6 class="my-4">Nama : {{ $laporan->name }}</h6>
                            <h6 class="my-4">NIS : {{ $laporan->nis }}</h6>
                            <h6 class="my-4">Kelas : {{ $laporan->kelas }}</h6>
                            <h6 class="my-4">Isi Aspirasi : {{ $laporan->aspirasi }}</h6>
                            <h6 class="my-4">Keterangan : {{ $laporan->keterangan }}</h6>
                            <h6 class="my-4">Gambar Kejadian : <br><img src="{{ url($laporan->gambar_kejadian) }}"
                                    alt="gambar" width="300" class="my-4"></h6>

                            <a href="/dashboard"><button class="btn btn-outline-info" style="float: right;">Kembali
                                    <b>-></b></button></a>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
{{-- ------------------------------------------------------------------------------------- --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</html>


{{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                    </div> --}}
