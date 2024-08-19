@php
$NAV="SAMPAH";
$TITLE="Sampah";
@endphp
@include('partials.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('partials.topbar')


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Sampah Pengguna</h1>
                    <p class="mb-4">Validasi Sampah Pengguna</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sampah</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addsampah')}}" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Sampah Baru</span>
                            </a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Gambar</th>
                                            <th>Satuan</th>
                                            <th>Total</th>
                                            <th>Harga (Rupiah)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sampahpenggunas as $sampah)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$sampah->title}}</td>
                                            <td><img src="{{$sampah->imgUrl}} " width="100px" alt="Gambar sampah"></td>
                                            <td>{{$sampah->satuan}}</td>
                                            <td>{{$sampah->total}}</td>
                                            <td>{{$sampah->rupiah}}</td>
                                            <td>
                                                <a href="{{route('approvesampahpengguna', ['id'=>$sampah->id])}}" class="btn btn-success">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-check	"></i>
                                                        </span>
                                                </a>
                                                <a href="{{route('deletesampahpengguna',  ['id'=>$sampah->id])}}" class="btn btn-danger">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" align="center">Belum ada data !</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('partials.footer')
