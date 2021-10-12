@extends('admin.layouts.master')
@section('title'){{'Slider'}}@endsection
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
                            <a href="{{route('slider.create')}}" class="btn btn-primary addBtn">Thêm Slider

                            </a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Slider</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Slider</h3>

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
                                    Tiêu đề
                                </th>
                                <th>
                                    Ảnh sản phẩm
                                </th>
                                <th>
                                    Ảnh định giá
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
                            @foreach($sliders as $key => $slider)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        {{$slider->title}}
                                    </td>

                                    <td class="text-center"><img src="
                                        @if($slider->image_product)
                                        {{asset('/uploads/').'/'.$slider->image_product}}
                                        @else
                                        {{asset('/backend/assets/img/images.gif')}}
                                        @endif"
                                                                 alt="" width="100" height="100"></td>

                                    <td class="text-center"><img src="
                                        @if($slider->image_pricing)
                                        {{asset('/uploads/').'/'.$slider->image_pricing}}
                                        @else
                                        {{asset('/backend/assets/img/images.gif')}}
                                        @endif"
                                                                 alt="" width="100" height="100"></td>



                                    <td class="project-state">
                                        <input data-id="{{$slider->id}}" class="toggle-class" type="checkbox"
                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive"
                                            {{ $slider->status ? 'checked' : '' }}>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{route('slider.edit',$slider->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{route('slider.delete',$slider->id)}}">
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
                </div>
                <!-- /.card -->

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

            var slider_id = $(this).data('id');

            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: '{{ route('sliderChangeStatus') }}',
                data: {
                    'status': status,
                    'slider_id': slider_id
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

