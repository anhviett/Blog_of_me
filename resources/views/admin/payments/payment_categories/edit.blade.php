@extends('admin.layouts.master')
@section('title'){{'Edit Payment Categories'}}@endsection
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
                            <h1>Thêm danh mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa danh mục</li>
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

                                <h3 class="card-title">General</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <form action="{{route('payment_category.update',$payment_categories->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Tên danh mục</label>
                                        <input type="text" id="inputName" class="form-control" name="inputName" value="{{$payment_categories->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Mô tả danh mục</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" name="inputDescription">{{$payment_categories->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Trạng thái</label>
                                        <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                            <option selected disabled value="{{$payment_categories->status}}">
                                                @if($payment_categories->status == 1)
                                                    Active
                                                @else
                                                    InActive
                                                @endif
                                            </option>
                                            <option value="0">InActive</option>
                                            <option value="1">Active</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-success float-right mb-2  mx-auto">Sửa</button>
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

