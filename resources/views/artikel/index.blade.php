@php
$NAV="ARTIKEL";
$TITLE="Daftar artikel";
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
                    <h1 class="h3 mb-2 text-gray-800">Artikel</h1>
                    <p class="mb-4">Atur Artikel yang akan ditampilkan di aplikasi</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Artikel</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addartikel')}}" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Artikel Baru</span>
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
                                            <th>isVideo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($artikels as $artikel)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$artikel->title}}</td>
                                            <td><img src="/storage/{{$artikel->imgUrl}} " width="100px" alt="Gambar Artikel"></td>
                                            <td>{{$artikel->isVideo ? "Ya" : "Tidak"}}</td>
                                            <td>
                                                <a href="{{route('viewartikel', ['id'=>$artikel->id])}}" class="btn btn-success" target="_blank">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-eye"></i>
                                                        </span>
                                                </a>
                                                <!-- <a href="{{route('editartikel', ['id'=>$artikel->id])}}" class="btn btn-primary">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-pen-square	"></i>
                                                        </span>
                                                </a> -->
                                                <a href="{{route('deleteartikel',  ['id'=>$artikel->id])}}" class="btn btn-danger">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" align="center">Belum ada data !</td>
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
