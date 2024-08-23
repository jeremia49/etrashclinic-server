@php
$NAV="PENGGUNA";
$TITLE="Tukar Saldo Pengguna";
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
                    <h1 class="h3 mb-2 text-gray-800">Tukar Saldo</h1>
                    <p class="mb-4">Tukar saldo pengguna</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tukar Saldo Pengguna</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("refundsaldo.p",['id'=>$user->id])}}" >
                                @csrf

                                <div class="form-group">
                                    Nama : 
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$user->name}}"
                                        aria-describedby="nama" readonly >
                                </div>

                                <div class="form-group">
                                    Saldo Saat Ini : 
                                    <input type="text" class="form-control" id="saldo" name="saldo"
                                        aria-describedby="saldo" value="{{$user->saldoBalance}}" readonly >
                                </div>

                                <div class="form-group">
                                    Saldo yang ingin ditukar : 
                                    <input type="number" class="form-control" id="change" name="change"
                                        aria-describedby="change" max="{{$user->saldoBalance}}" min="1"  required>
                                </div>

                                
                                <div class="form-group">
                                    Alasan : 
                                    <input type="text" class="form-control" id="reason" name="reason"
                                        aria-describedby="reason"  required>
                                </div>

                                <div class="form-group">
                                    <input type="submit"  class="btn btn-primary btn-user btn-block"
                                       value="Simpan">
                                </div>
                                <hr>
                            </form>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
        

            @include('partials.footer')

