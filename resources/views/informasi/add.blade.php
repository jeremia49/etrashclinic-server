@php
$NAV="INFORMASI";
$TITLE="Tambah Informasi";
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
                    <h1 class="h3 mb-2 text-gray-800">Informasi Baru</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Informasi Baru</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("addinformasi.p")}}" enctype="multipart/form-data" >
                                @csrf

                                <div class="form-group">
                                    Judul : 
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        aria-describedby="judul" >
                                </div>

                                <div class="form-group">
                                    Upload Thumbnail Gambar : 
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    Konten : 
                                    <textarea id="editor" name="konten"></textarea>
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

