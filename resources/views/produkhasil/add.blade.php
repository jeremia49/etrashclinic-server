@php
$NAV="PRODUKHASIL";
$TITLE="Tambah Produk Hasil";
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
                    <h1 class="h3 mb-2 text-gray-800">Produk Hasil Baru</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Produk Hasil Baru</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("addprodukhasil.p")}}" enctype="multipart/form-data" >
                                @csrf

                                <div class="form-group">
                                    Nama : 
                                    <input type="text" class="form-control" id="title" name="title"
                                        aria-describedby="title" >
                                </div>

                                <div class="form-group">
                                    Upload Thumbnail Gambar : 
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    Harga (Coin): 
                                    <input type="number" class="form-control" name="price">
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

