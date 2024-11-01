@php
$NAV="PENGGUNA";
$TITLE="Reset Password Pengguna";
@endphp
@include('partials.header')
<script>
    function tampilkanpassword() {
        var x = document.getElementById("newpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
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
                    <h1 class="h3 mb-2 text-gray-800">Reset Password</h1>
                    <p class="mb-4">Reset password pengguna</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reset Password</h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("resetpassword.p",['id'=>$user->id])}}" >
                                @csrf

                                <div class="form-group">
                                    Nama : 
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$user->name}}"
                                        aria-describedby="nama" readonly >
                                </div>

                                <div class="form-group">
                                    Email : 
                                    <input type="text" class="form-control" id="email" name="email"
                                        aria-describedby="email" value="{{$user->email}}" readonly >
                                </div>

                                <div class="form-group">
                                   Password Baru : 
                                    <input type="password" class="form-control" id="newpassword" name="newpassword"
                                        aria-describedby="newpassword" required>
                                    
                                    @error('newpassword')
                                        <span>
                                            <div class="text-danger">{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" onclick="tampilkanpassword()" id="showpasswd">
                                    <label for="showpasswd">Tampilkan Password</label>
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

