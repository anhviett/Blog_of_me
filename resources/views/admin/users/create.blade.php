@extends('admin.layouts.master')
@section('title'){{'Create Users'}}@endsection
@section('content')
    {{--wrapper--}}
    <div class="wrapper">
    @include('admin.layouts.sideNav')
    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm người dùng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-warning">
                    {{ session()->get('error') }}
                </div>
        @endif
        <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card card-primary">
                            <div class="card-header">

                                <h3 class="card-title">Người dùng</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group text-center position-relative">
                                        <img class="imagesForm" width="100" height="80"
                                             src="{{asset('/backend/assets/img/avatar_pro.jpg')}}"/>
                                        <label class="formLabel" for="UserAvatarAdd"><i class="fas fa-pen"></i><input
                                                style="display: none" type="file" id="UserAvatarAdd" class="imagesAvatar"
                                                name="UserAvatarAdd"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputFirstname">Họ</label>
                                        <input type="text" id="inputFirstname" class="form-control" name="inputFirstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputLastname">Tên</label>
                                        <input type="text" id="inputLastname" class="form-control" name="inputLastname">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Email</label>
                                        <input type="email" id="inputEmail" class="form-control" name="inputEmail">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                               id="inputPassword">
                                    </div>

                                </div>


                                <div class="row">
                                    <button class="btn btn-success float-right mb-2  mx-auto">Thêm mới</button>
                                </div>

                                <!-- /.card-body -->
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    {{--/wrapper--}}
@endsection
@section('footer_script')
    <script>
        function read(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('.imagesForm').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $(".imagesAvatar").change(function() {
        read(this);
        });
    </script>
@endsection

