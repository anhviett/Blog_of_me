@extends('admin.layouts.master')
@section('title'){{'Edit Roles'}}@endsection
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
                            <h1>Sửa quyền</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa quyền</li>
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

                                <h3 class="card-title">Quyền</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('role.update',$role->id)}}" method="POST" style="width: 100%">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            @csrf
                                            <div class="form-group">
                                                <label for="role_name">Tên quyền:</label>
                                                <input type="text" name="role_name" class="form-control" id="role_name_edit" value="{{$role->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="display_name">Mô tả vai trò</label>
                                                <textarea class="form-control" name="display_name"
                                                          id="" cols="30" rows="10" style="height: 41px"> {{$role->display_name}}
                                        </textarea>

                                            </div>
                                            <button class="btn btn-primary">Sửa</button>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="role__right">
                                                <label style="margin-top: 30px">
                                                    <input
                                                        style='margin-right: 5px;' class="perAll"
                                                        type='checkbox'> Check all
                                                </label>
                                                @foreach($permissionsParent as $permissionParent)
                                                    <div class="parentCheck">
                                                        <label class="input-check">
                                                            <input
                                                                style='margin-right: 5px; margin-left: 30px' class="wrapperChecked"
                                                                type='checkbox'
                                                                value="{{$permissionParent->id}}">{{$permissionParent->display_name}}
                                                        </label>
                                                        @foreach($permissionParent->permissionChildren as $permissionChild)

                                                            <label
                                                                style="display: inline-block; width: 100%; margin-left: 60px">
                                                                <input class="childrenCheck" style="margin-right: 5px;"
                                                                       name="permission_id[]"
                                                                       {{$permissionChecked->contains('id',$permissionChild->id) ? 'checked' : ""}}
                                                                       type="checkbox"
                                                                       value="{{$permissionChild->id}}">{{$permissionChild->display_name}}
                                                            </label>

                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div></div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2_init').select2({

            'placeholder': 'Chọn vai trò'
        })


        $('.wrapperChecked').on('click', function () {
            $(this).parents('.parentCheck').find('.childrenCheck').prop('checked', $(this).prop('checked'));
        })
        $('.perAll').on('click', function () {
            $(this).parents().find('.childrenCheck').prop('checked', $(this).prop('checked'));
            $(this).parents().find('.wrapperChecked').prop('checked', $(this).prop('checked'));
        })

    </script>
@endsection


