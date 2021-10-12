@extends('admin.layouts.master')
@section('title'){{'Edit Products'}}@endsection
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
                            <h1>Sửa sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                        <form action="{{route('product.update', $products->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group position-relative text-center">
                                    <img class="imagesForm mx-auto" width="100" height="100" src="
                            {{asset('/uploads/').'/'.$products->avatar}}"/>
                                    <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                            style="display: none" type="file" id="file" class="imageAvatar"
                                            name="inputAvatar"></label>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Tên sản phẩm</label>
                                    <input type="text" id="inputName" class="form-control" name="inputName" value="{{$products->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Mô tả sản phẩm</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="inputDescription">{{$products->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputContent">Nội dung sản phẩm</label>
                                    <textarea id="inputContent" class="form-control" rows="4" name="inputContent">{{$products->content}}</textarea>

                                </div>
                                <div class="form-group">
                                    <label for="inputBrands">Thương hiệu sản phẩm</label>
                                    <select name="inputBrands" id="inputBrands">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStyles">Thể loại sản phẩm</label>
                                    <select name="inputStyles" id="inputStyles">
                                        @foreach($styles as $style)
                                            <option value="{{$style->id}}">{{$style->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputCategories">Danh mục sản phẩm</label>
                                    <select name="inputCategories" id="inputCategories" class="form-control">
                                        <option value="{{$products->category->name}}">{{$products->category->name}}</option>
                                        {!! $html !!}
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPrice">Giá</label>
                                    <input id="inputPrice" class="form-control" name="inputPrice" value="{{$products->price}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="price_product">Album ảnh (tối đa 6 file)</label>
                                    <div class="multi-images">
                                        <input type="hidden" name="delete_img" value="0">
                                        <div class="img-item">
                                            <input type='file' class="imgInp imgInp1" multiple name="images[]" />
                                            <div class="img-list">
                                                @foreach($products->images as $img)
                                                    <img src="{{ asset('public/uploads/' . $img->path) }}"/>
                                                @endforeach
                                            </div>
                                            <p class="delete-img">Xóa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Trạng thái</label>
                                    <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                        <option selected disabled value="{{$products->status}}">
                                            @if($products->status == 1)
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
                                <button class="btn btn-success float-right mb-2  mx-auto">Lưu lại</button>
                            </div>

                            <!-- /.card-body -->
                        </form>
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

        /*Product Images*/
        function readURL(input, object) {
            if (input.files.length > 6) {
                alert('Tối đa upload 6 file');
                object.parents('.img-item').find('input[type=file]').val('');
                return  false;
            }
            if (input.files && input.files[0]) {

                for (i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        object.parents('.img-item').find('.img-list').append('<img src="'+e.target.result+'" />');

                    }

                    reader.readAsDataURL(input.files[i]); // convert to base64 string
                }
            }
        }

        $(".imgInp").change(function() {

            $(this).parents('.img-item').find('.img-list').html('');
            readURL(this, $(this));
        });

        $('.delete-img').click(function () {
            $('input[name=delete_img]').val('1');
            $(this).parents('.img-item').find('.img-list').html('');
            $(this).parents('.img-item').find('input[type=file]').val('');
        });
    </script>
@endsection
