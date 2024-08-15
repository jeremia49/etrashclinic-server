@php
$NAV="LOGQRCODE";
$TITLE="Log QRCode";

use Carbon\Carbon;
Carbon::setLocale('id');
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
                    <h1 class="h3 mb-2 text-gray-800">Semua Log QRCode</h1>
                    <p class="mb-4">Lihat Semua Log QRCode</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QRCode</h6>
                        </div>
                        <div class="card-body">
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama QRCode</th>
                                            <th>Nama Pengguna</th>
                                            <th>Email</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($logs as $log)
                                        <tr>
                                            <td align="center">{{$loop->index+1}}</td>
                                            <td>{{$log->title}}</td>
                                            <td>{{$log->name}}</td>
                                            <td>{{$log->email}}</td>
                                            <td>@php
                                                    $parsed = Carbon::parse($log->created_at, 'UTC');
                                                    $parsed->setTimezone('Asia/Jakarta');
                                                    $formattedDate = $parsed->translatedFormat('l, d F Y H:i:s');
                                                @endphp
                                            {{$formattedDate}}
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
