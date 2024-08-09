@php
$NAV="INFORMASI";
$TITLE="Daftar Informasi";
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
                    <h1 class="h3 mb-2 text-gray-800">Informasi</h1>
                    <p class="mb-4">Atur informasi yang akan ditampilkan di aplikasi</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addinformasi')}}" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Informasi Baru</span>
                            </a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($informasis as $informasi)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$informasi->title}}</td>
                                            <td><img src="/storage/{{$informasi->imgUrl}} " width="100px" alt="Gambar Informasi"></td>
                                            <td>
                                                <a href="{{route('viewinformasi', ['id'=>$informasi->id])}}" class="btn btn-success" target="_blank">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                </a>
                                                <!-- <a href="{{route('editinformasi', ['id'=>$informasi->id])}}" class="btn btn-primary">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-pen-square	"></i>
                                                        </span>
                                                </a> -->
                                                <a href="{{route('deleteinformasi',  ['id'=>$informasi->id])}}" class="btn btn-danger">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" align="center">Belum ada data !</td>
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
