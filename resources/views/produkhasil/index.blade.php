@php
$NAV="PRODUKHASIL";
$TITLE="Produk Hasil";
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
                    <h1 class="h3 mb-2 text-gray-800">Produk Hasil</h1>
                    <p class="mb-4">Atur produk hasil apa yang akan ditampilkan di aplikasi</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Produk Hasil</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{route('addprodukhasil')}}" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Produk Hasil Baru</span>
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
                                            <th>Harga (Coin)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($produkhasils as $produkhasil)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$produkhasil->title}}</td>
                                            <td><img src="/storage/{{$produkhasil->imgUrl}} " width="100px" alt="Gambar produkhasil"></td>
                                            <td>{{$produkhasil->price}}</td>
                                            <td>
                                                <!-- <a href="{{route('editprodukhasil', ['id'=>$produkhasil->id])}}" class="btn btn-primary">
                                                        <span class="icon text-white-100">
                                                            <i class="fas fa-pen-square	"></i>
                                                        </span>
                                                </a> -->
                                                <a href="{{route('deleteprodukhasil',  ['id'=>$produkhasil->id])}}" class="btn btn-danger">
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
