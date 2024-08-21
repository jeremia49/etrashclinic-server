@php
$NAV="SAMPAH";
$TITLE="Edit Sampah";
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
                    <h1 class="h3 mb-2 text-gray-800">Edit Sampah</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Sampah</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("addsampah.p")}}" enctype="multipart/form-data" >
                                @csrf

                                <div class="form-group">
                                    Nama : 
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        aria-describedby="nama"  required>
                                </div>

                                <div class="form-group">
                                    Upload Thumbnail Gambar : 
                                    <input type="file" class="form-control" name="image" required>
                                </div>

                                <div class="form-group">
                                    Satuan : 
                                    <input type="text" class="form-control" id="satuan" name="satuan"
                                        aria-describedby="satuan" placeholder="kg, lembar, unit" required >
                                </div>

                                <div class="form-group">
                                    Harga Rupiah : 
                                    <input type="number" class="form-control" id="rupiah" name="rupiah"
                                        aria-describedby="rupiah" required >
                                </div>

                                <!-- <div class="form-group">
                                    Harga Saldo : 
                                    <input type="number" class="form-control" id="maxprice" name="maxprice"
                                        aria-describedby="maxprice" >
                                </div> -->

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

