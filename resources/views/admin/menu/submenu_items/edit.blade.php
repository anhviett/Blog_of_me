@extends('admin.layouts.master')
@section('title'){{'Create Products'}}@endsection
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
                            <h1>Sửa sub menu </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa sub menu </li>
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

                            <form action="{{route('submenu_item.update',$submenu_items->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên sub menu</label>
                                    <input type="text" id="inputName" class="form-control" name="inputName"
                                    value="{{$submenu_items->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputLink">Link Sub Item :</label>
                                    <input type="text" id="inputLink" class="form-control" name="inputLink"
                                           value="{{$submenu_items->link}}">
                                </div>
                                <div class="form-group">

                                    <label for="submenuItem">Select Menu Item Link</label>
                                    <select name="submenu_item_id" required class="form-control" id="submenuItem">
                                        @foreach($menu_items as $item)
                                            <option value="{{$item->id}}">
                                                {{$item->name}}
                                            </option>
                                        @endforeach
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

