@extends('admin.layouts.master')
@section('title'){{'Edit Coupons'}}@endsection
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
                            <h1>Sửa mã giảm giá</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa mã giảm giá</li>
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

                            <form action="{{route('coupon.update',$coupons->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Tên mã giảm giá</label>
                                        <input type="text" id="inputName" class="form-control" name="inputName"
                                               value="{{$coupons->coupon_name}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCode">Mã giảm giá</label>
                                        <input type="text" id="inputCode" class="form-control" name="inputCode"
                                               value="{{$coupons->coupon_code}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCount">Số lượng mã</label>
                                        <input type="text" id="inputCount" class="form-control" name="inputCount"
                                               value="{{$coupons->coupon_count}}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCondition">Tính năng mã</label>
                                        <select id="inputCondition" class="form-control custom-select" name="inputCondition">
                                            <option selected disabled value="0">---Chọn---</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCountPrice">Nhập số % hoặc số tiền giảm</label>
                                        <textarea rows="8" style="resize: none; height: calc(2.25rem + 2px)" type="text" id="inputCountPrice" class="form-control" name="inputCountPrice">
                                    </textarea>
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

