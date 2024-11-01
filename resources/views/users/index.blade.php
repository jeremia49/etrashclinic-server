@php
$NAV="PENGGUNA";
$TITLE="Daftar Pengguna";
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
                    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
                    <p class="mb-4">Lihat pengguna terdaftar</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No HP</th>
                                            <th>Balance (Coin)</th>
                                            <th>Balance (Saldo)</th>
                                            <th>Gambar</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                {{$user->email}}
                                                <br>
                                                <a title="Reset Password" href="{{route('resetpassword',  ['id'=>$user->id])}}" class="btn btn-info">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    Reset Password
                                                </a>
                                            </td>
                                            <td>{{$user->nohp}}</td>
                                            <td>
                                                {{$user->coinBalance}} 
                                                <a href="{{route('refundcoin',  ['id'=>$user->id])}}" class="btn btn-info">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                            </td>
                                            <td>
                                                {{$user->saldoBalance}}
                                                <a href="{{route('refundsaldo',  ['id'=>$user->id])}}" class="btn btn-info">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                            </td>
                                            <td><img src="{{$user->photoUrl}}" alt="" width="100px" height="100px"></td>
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
