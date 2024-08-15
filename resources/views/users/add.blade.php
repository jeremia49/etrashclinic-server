@php
$NAV="SAMPAH";
$TITLE="Tambah Sampah";
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
                    <h1 class="h3 mb-2 text-gray-800">Sampah Baru</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Sampah Baru</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("addsampah.p")}}" enctype="multipart/form-data" >
                                @csrf

                                <div class="form-group">
                                    Nama : 
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        aria-describedby="nama" >
                                </div>

                                <div class="form-group">
                                    Upload Thumbnail Gambar : 
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    Satuan : 
                                    <input type="text" class="form-control" id="satuan" name="satuan"
                                        aria-describedby="satuan" value="kg" readonly >
                                </div>

                                <div class="form-group">
                                    Harga Minimal (Coin) : 
                                    <input type="number" class="form-control" id="minprice" name="minprice"
                                        aria-describedby="minprice" >
                                </div>

                                <div class="form-group">
                                    Harga Maksimal (Coin) : 
                                    <input type="number" class="form-control" id="maxprice" name="maxprice"
                                        aria-describedby="maxprice" >
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
            
            
@section("js")
    <script> 
        const editor = Jodit.make('#editor',{
            "uploader": {
                "insertImageAsBase64URI": true
            }
        });
    </script>
@endsection

            @include('partials.footer')
