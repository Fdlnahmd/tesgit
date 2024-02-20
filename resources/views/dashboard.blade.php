<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>

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
                        <div class="col-sm-12 mb-2" style="padding-left: 34px;">
                            <h1>Data Laporan Pengaduan Sekolah</h1>
                        </div>
                        <div class="row px-4">

                            {{-- CATEGORY --}}
                            <div class="col-md-4">
                                <label for="kategoriFilter">Filter by Category:</label>
                                <select id="kategoriFilter" class="form-select" onchange="applyFilter()">
                                    <option value="all">All Categories</option>
                                    <option value="kebersihan">Kebersihan</option>
                                    <option value="keamanan">Keamanan</option>
                                    <option value="ketertiban">Ketertiban</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            {{-- CATEGORY --}}

                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content px-5">
                <!-- Default box -->
                <div class="table-responsive">
                    <table class="table text-center" id="laporanTable">
                        <thead>
                            <tr>
                                <th class="px-3">NO</th>
                                <th class="px-2">Status</th>
                                <th class="px-2">Kategori</th>
                                <th class="px-2">Nama</th>
                                <th class="px-2">NIS</th>
                                <th class="px-2">Kelas</th>
                                <th class="px-2">Aspirasi</th>
                                <th class="px-2">Keterangan</th>
                                <th class="px-2">Gambar</th>
                                <th class="px-2">Tanggal</th>
                                <th class="px-2" colspan="3">Action</th>
                            </tr>
                        </thead>

                        <tbody id="laporanTableBody" class="px-4">
                            @forelse ($laporan as $key => $data)
                                <tr data-category="{{ strtolower($data->kategori) }}">
                                    <td class="px-3">{{ $key + 1 }}</td>
                                    <td class="px-2">
                                        <b>
                                            <span class="text-align: center;
                                                    @if ($data->status == 'menunggu')
                                                    @elseif($data->status == 'proses') 
                                                    @elseif($data->status == 'selesai!') @endif">
                                            {{ $data->status }}
                                            </span>
                                        </b>
                                    </td>
                                    <td class="px-2">{{ $data->kategori }}</td>
                                    <td class="px-2">{{ $data->name }}</td>
                                    <td class="px-2">{{ $data->nis }}</td>
                                    <td class="px-2">{{ $data->kelas }}</td>
                                    <td class="px-2">{{ $data->aspirasi }}</td>
                                    <td class="px-2">{{ $data->keterangan }}</td>
                                    <td class="px-2">
                                        <img src="{{ asset($data->gambar_kejadian) }}" alt=""
                                            width="50">
                                    </td>
                                    <td class="px-2">{{ $data->created_at->format('d F Y') }}</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('laporan.show', ['id' => $data->id]) }}"
                                                class="btn btn-info">View</a>
                                            <form action="{{ route('laporan.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr id="table-none">
                                    <td class="px-2" colspan="10">
                                        <div class="container">
                                            <div class="row d-flex justify-content-center align-items-center text-align-center"
                                                style="height: 55vh;">
                                                <h3 class="text-secondary">Data Kosong !</h3>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
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
@include('script')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectElement = document.getElementById("kategoriFilter");

        selectElement.addEventListener("change", function() {
            var selectedCategory = selectElement.value;
            var tableRows = document.querySelectorAll("#laporanTableBody tr");

            tableRows.forEach(function(row) {
                var rowCategory = row.getAttribute("data-category");

                // Check if the selected category is "all" or matches the row's data-category attribute
                if (selectedCategory === "all" || selectedCategory === rowCategory) {
                    row.style.display = ""; // Display the row
                } else {
                    row.style.display = "none"; // Hide the row
                }
            });
        });
    });
</script>


</html>


{{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                    </div> --}}