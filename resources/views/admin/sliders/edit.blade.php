@extends('admin.layouts.master')
@section('title'){{'Create Sldiers'}}@endsection
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
                            <h1>Sửa slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa slider</li>
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

                            <form action="{{route('slider.update',$sliders->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputTitle">Tiêu đề</label>
                                        <input type="text" id="inputTitle" class="form-control" name="inputTitle"
                                        value="{{$sliders->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContent">Nội dung</label>
                                        <input type="text" id="inputContent" class="form-control" name="inputContent"
                                        value="{{$sliders->content}}">
                                    </div>
                                    <div class="form-group position-relative text-center">
                                        <div style="position: absolute;  left: 0;">Ảnh sản phẩm :</div>
                                        <img class="imagesForm" width="100" height="100" src="
                            {{asset('/uploads/').'/'.$sliders->image_product}}"/>
                                        <label class="formLabel" for="file-1"><i class="fas fa-pen">
                                            </i><input style="" type="file" id="file-1" class="imagesAvatar d-none"
                                                       name="inputImageProduct"></label>
                                    </div>
                                    <div class="form-group position-relative text-center">
                                        <div style="position: absolute;  left: 0;">Ảnh định giá :</div>
                                        <img class="imageForm" width="100" height="100" src="
                            {{asset('/uploads/').'/'.$sliders->image_pricing}}"/>
                                        <label class="formLabel" for="file-2"><i class="fas fa-pen"></i><input
                                                style="" type="file" id="file-2" class="imageAvatar d-none"
                                                name="inputImagePricing"></label>
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

