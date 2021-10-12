@extends('admin.layouts.master')
@section('title'){{'Posts'}}@endsection
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
                            <a href="{{route('post.create')}}" class="btn btn-primary addBtn">Thêm danh mục

                            </a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            @if(!$posts->isEmpty())
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Hình ảnh
                                </th>
                                <th>
                                    Tiêu đề
                                </th>
                                <th>
                                    Tên người đăng
                                </th>

                                <th>
                                    Tóm tắt
                                </th>
                                <th>
                                    Danh mục bài viết
                                </th>
                                <th class="text-center">
                                    Trạng thái
                                </th>
                                <th class="text-right">
                                    Hành động
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key => $post)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td class="text-center"><img src="
                                        @if($post->image)
                                        {{asset('/uploads/').'/'.$post->image}}
                                        @else
                                        {{asset('/backend/assets/img/images.gif')}}
                                        @endif" alt="" width="100" height="100">
                                    </td>
                                    <td>
                                        {{$post->title}}
                                    </td>
                                    <td>
                                        {{$post->name}}
                                    </td>

                                    <td>
                                        {!! $post->summary !!}
                                    </td>

                                    <td>
                                        {{$post->category->name ?? ''}}

                                    </td>
                                    <td class="project-state">
                                        <input data-id="{{$post->id}}" class="toggle-class" type="checkbox"
                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                            {{ $post->status ? 'checked' : '' }}>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{route('post.edit',$post->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{route('post.delete',$post->id)}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>

                    <!-- /.card-body -->
                    <div class="pagination-area">
                        <div class="pagination-number">
                            {{$posts->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.card -->
                @else
                    <h2 class="text-center">Không có sản phẩm nào</h2>
                @endif
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    {{--/wrapper--}}
@endsection
@section('footer_script')
    <!--bootstrap-toggle-->
    <script
        src="http://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $('.toggle-class').on('change', function() {
            var status = $(this).prop('checked') == true ? 0 : 1;

            var post_id = $(this).data('id');

            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('postChangeStatus') }}',
                data: {
                    'status': status,
                    'post_id': post_id
                },
                success:function(data) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Status Updated Successfully');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            });
        });
    </script>

@endsection

