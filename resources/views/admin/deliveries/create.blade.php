@extends('admin.layouts.master')
@section('title'){{'Create Vận chuyển'}}@endsection
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
                        <h1>Thêm Vận chuyển</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Thêm Vận chuyển</li>
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

                        <form action="{{route('delivery.insert')}}" method="POST">
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputCity">Chọn thành phố</label>
                                <select id="inputCity" class="form-control custom-select choose inputCity" name="inputCity">
                                    <option selected disabled>--Chọn tỉnh thành phố--</option>
                                    @foreach($city as $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputDistrict">Chọn quận huyện</label>
                                <select id="inputDistrict" class="form-control custom-select choose inputDistrict" name="inputDistrict">
                                    <option selected disabled value="">--Chọn quận huyện--</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputWards">Chọn xã phường</label>
                                <select id="inputWards" class="form-control custom-select inputWards" name="inputWards">
                                    <option selected disabled value="">--Chọn xã phường--</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputFeeShip">Phí vận chuyển: </label>
                                <input id="inputFeeShip" class="form-control inputFeeShip" name="inputFeeShip"/>
                            </div>
                        </div>

                            <div class="row">
                                <button class="btn btn-success float-right mb-2  mx-auto add_delivery">Thêm phí vận chuyển</button>
                            </div>
                        <!-- /.card-body -->
                        </form>

                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <div id="load_delivery">

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
        $(document).ready(function () {
            fetch_delivery();
            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{route("select.feeship")}}',
                    method: 'POST',
                    data: {
                        _token : _token
                    },
                    success: function (data) {
                       $('#load_delivery').html(data);
                    },

                });
            }
            $(document).on('blur', '.shippng_fee_edit', function () {
               var feeship_id = $(this).data('feeship_id');
               var fee_Value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{route("update.feeship")}}',
                    method: 'POST',
                    data: {
                        feeship_id : feeship_id,
                        fee_Value : fee_Value,
                        _token : _token
                    },
                    success: function (data) {
                        fetch_delivery();
                    },

                });
            });
            $('.add_delivery').click(function () {
                var city = $('.inputCity').val();
                var districts = $('.inputDistrict').val();
                var wards = $('.inputWards').val();
                var fee_ship = $('.inputFeeShip').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{route("delivery.insert")}}',
                    method: 'POST',
                    data: {
                        city : city,
                        districts : districts,
                        _token : _token,
                        wards : wards,
                        fee_ship : fee_ship
                    },
                    success: function (data) {
                        alert('Thêm phí thành công');
                    },

                });


            })
            $('.choose').on('change',function () {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';

                if(action === 'inputCity'){
                    result = 'inputDistrict';
                }else{
                    result = 'inputWards';
                }

                $.ajax({
                    url: '{{route("delivery.store")}}',
                    method: 'POST',
                    data: {
                        action : action,
                        ma_id : ma_id,
                        _token : _token
                    },
                    success: function (data) {
                        $('#' + result).html(data);
                    },

                });
            });
        })



    </script>
@endsection

