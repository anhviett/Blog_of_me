@extends('admin.layouts.master')
@section('title'){{'Edit Permissions'}}@endsection
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
                            <h1>Sửa vai trò</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa vai trò</li>
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

                                <h3 class="card-title">Vai trò</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('permission.update',$permission->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="permissionCreate">Chọn tên module :</label>
                                    <select name="module_parent" id="permissionEdit" class="form-control">
                                        <option value="">Chọn tên module</option>
                                        @foreach(config('permissions.table_module') as $moduleItem)
                                            <option value="{{$moduleItem}}">{{$moduleItem}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        @foreach(config('permissions.moduleChildren') as $moduleItemChildren)
                                            <div class="col-md-3">
                                                <label for="moduleChildren">
                                                    <input type="checkbox" value="{{$moduleItemChildren}}" name="moduleChildren[]">
                                                    {{$moduleItemChildren}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Lưu</button>
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


