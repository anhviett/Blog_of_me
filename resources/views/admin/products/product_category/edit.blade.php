@extends('admin.layouts.master')
@section('title'){{'Edit Product Categories'}}@endsection
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

                            <form action="{{route('product_category.update',$product_categories->id)}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Tên danh mục</label>
                                        <input type="text" id="slug" class="form-control" name="inputName" onkeyup="ChangeToSlug();" value="{{$product_categories->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSlug">Slug danh mục</label>
                                        <input type="text" id="convert_slug" class="form-control" name="inputSlug"  value="{{$product_categories->slug}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Mô tả danh mục</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" name="inputDescription">{{$product_categories->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMeta">Từ khóa danh mục </label>
                                        <textarea id="inputMeta" class="form-control" rows="4" name="inputMeta">{{$product_categories->meta_keywords}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputParentCategories">Chọn làm danh mục cha :</label>
                                        <input name="inputParentCategories" id="inputParentCategories" class="form-control" value="{{$product_categories->name}}"/>


                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Trạng thái</label>
                                        <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                            <option selected disabled value="{{$product_categories->status}}">
                                                @if($product_categories->status == 1)
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
@section('footer_script')
    <script>
        //Ckeditor
        CKEDITOR.replace('inputDescription');
        // validate form jquery
        $(document).ready(function() {

            $('#product_category').submit(function(e) {
                e.preventDefault();
                var inputName = $('#inputName').val();


                $(".error").remove();

                if (inputName.length < 1) {
                    $('#inputName').after('<span class="error">Vui lòng nhập tên sản phẩm</span>');
                }

            });

        });

        function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }


    </script>
@endsection
