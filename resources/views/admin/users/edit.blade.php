@extends('admin.layouts.master')
@section('title'){{'Edit Users'}}@endsection
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
                            <h1>Sửa người dùng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa người dùng</li>
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

                            <form action="{{route('user.update',$users->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group text-center position-relative">
                                        <img class="imagesForm" width="100" height="80" src="
                            @if($users->avatar)
                                        {{asset('uploads').'/'.$users->avatar}}
                                        @else
                                        {{asset('backend/assets/img/avatar_pro.jpg')}}
                                        @endif"/>
                                        <label class="formLabel" for="userAvatarEdit"><i class="fas fa-pen"></i>
                                            <input style="display: none" type="file" id="userAvatarEdit" class="imagesAvatar"
                                                   name="userAvatarEdit"></label>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputFirstname">Họ</label>
                                        <input type="text" name="inputFirstname" placeholder="Firstname" class="form-control  {{ $errors->has('firstname') ? 'error' : '' }}" id="inputFirstname"
                                               value="{{$users->firstname}}">
                                        <!-- Error -->
                                        @if ($errors->has('firstname'))
                                            <div class="error">
                                                {{ $errors->first('firstname') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputLastname">Tên</label>
                                        <input type="text" name="inputLastname" placeholder="Lastname" class="form-control  {{ $errors->has('lastname') ? 'error' : '' }}" id="inputLastname"
                                               value="{{$users->lastname}}">
                                        <!-- Error -->
                                        @if ($errors->has('lastname'))
                                            <div class="error">
                                                {{ $errors->first('lastname') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email"
                                               name="inputEmail"
                                               value="{{$users->email}}">
                                        <!-- Error -->
                                        @if ($errors->has('email'))
                                            <div class="error">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword">Mật khẩu</label>
                                        <input type="password" name="inputPassword" class="form-control {{ $errors->has('password') ? 'error' : '' }}"
                                               id="inputPassword"
                                               value="{{$users->password}}">
                                        <!-- Error -->
                                        @if ($errors->has('password'))
                                            <div class="error">
                                                {{ $errors->first('password') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="inputRoleAdd">Tên vai trò: </label>
                                        <select type="text" name="role_id[] {{ $errors->has('confirm_password') ? 'error' : '' }}" class="form-control"
                                                id="inputRoleAdd" >
                                            @foreach($roles as $role)
                                                <option
                                                    @if($users->roles->contains($role))
                                                    selected
                                                    @endif
                                                    value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <!-- Error -->
                                        @if ($errors->has('role'))
                                            <div class="error">
                                                {{ $errors->first('role') }}
                                            </div>
                                        @endif
                                    </div>

                                    <button class="btn btn-primary">Sửa</button>
                                </div>
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

