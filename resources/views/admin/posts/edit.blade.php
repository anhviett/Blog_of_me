@extends('admin.layouts.master')
@section('title'){{'Edit Posts'}}@endsection
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
                            <h1>Sửa bài đăng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa bài đăng</li>
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

                            <form action="{{route('post.update', $posts->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group position-relative text-center">
                                        <img class="imagesForm" width="100" height="100" src="
                                            {{asset('/uploads/').'/'.$posts->image}}"
                                        />
                                        <label class="formLabel" for="file"><i class="fas fa-pen"></i><input
                                                style="display: none" type="file" id="file" class="imagesAvatar"
                                                name="inputAvatar"></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Tên bài đăng</label>
                                        <input type="text" class="form-control" id="slug" onkeyup="ChangeToSlug();" name="inputTitle"
                                               value="{{$posts->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSlug">Slug danh mục</label>
                                        <input type="text" id="convert_slug" class="form-control" name="inputSlug"
                                               value="{{$posts->slug}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tên người đăng</label>
                                        <input type="text" id="inputName" class="form-control" name="inputName"
                                               value="{{$posts->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputContent">Nội dung bài viết</label>
                                        <textarea rows="8" style="resize: none" id="inputContent" class="form-control" name="inputContent">{{$posts->content}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMetaKeywords">Meta từ khóa</label>
                                        <textarea rows="4" style="resize: none" id="inputMetaKeywords" class="form-control" name="inputMetaKeywords">
                                            {{$posts->meta_keywords}}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMetaDesc">Meta nội dung</label>
                                        <textarea rows="8" style="resize: none" id="inputMetaDesc" class="form-control" name="inputMetaDesc">
                                            {{$posts->meta_desc}}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSummary">Tóm tắt</label>
                                        <textarea id="inputSummary" rows="8" style="resize: none" class="form-control" name="inputSummary">
                                            {{$posts->summary}}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPosts">Danh mục sản phẩm</label>
                                        <select name="inputPosts" id="inputPosts" class="form-control">

                                            {!! $html !!}

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Trạng thái</label>
                                        <select id="inputStatus" class="form-control custom-select" name="inputStatus">
                                            <option selected disabled value="{{$posts->status}}">
                                                @if($posts->status == 1)
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
        CKEDITOR.replace('inputContent');
        CKEDITOR.replace('inputSummary');
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
        //Slug danh mục
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
