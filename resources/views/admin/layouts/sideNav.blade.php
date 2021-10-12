<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home.page')}}" class="brand-link">
        <img src="{{asset('backend/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image float-none img-circle elevation-3" style="opacity: .8">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <p style="opacity: .8;    font-size: 1.25rem;
    line-height: 1.5;    color: rgba(255,255,255,.8);">
                Xin chào {{auth()->user()->firstname}}
            </p>

        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('home.page')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('home.page')}}" class="nav-link active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v1</p>
                        </a>
                    </li>

                </ul>
                <li class="nav-header">Quản lý</li>

                {{--Người dùng--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                           Người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('user_view')
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý người dùng</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                {{--Hết người dùng--}}
                {{--Sản phẩm--}}

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            @can('product_view')
                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý sản phẩm</p>
                            </a>
                        </li>
                        @endcan
                        @can('product_category_view')
                        <li class="nav-item">
                            <a href="{{route('product_category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý danh mục sản phẩm</p>
                            </a>
                        </li>
                        @endcan
                        @can('product_tag_view')
                        <li class="nav-item">
                            <a href="{{route('product_tag.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý Tag sản phẩm</p>
                            </a>
                        </li>
                        @endcan
                        {{--Thương hiệu--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Thương hiệu
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('brand_view')
                                <li class="nav-item">
                                    <a href="{{route('brand.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý thương hiệu</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        {{-- Hết thương hiệu--}}

                        {{--Reviews--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Reviews
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('review_view')
                                <li class="nav-item">
                                    <a href="{{route('review.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý reviews</p>
                                    </a>
                                </li>
                                    @endcan
                                    @can('review_tag_view')
                                <li class="nav-item">
                                    <a href="{{route('review_tag.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý tag reviews</p>
                                    </a>
                                </li>
                                    @endcan
                            </ul>
                        </li>
                        {{-- Hết reviews--}}

                        {{--Size--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Size
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('size.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý size</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Hết size--}}
                        {{--Thể loại--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Thể loại
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('style.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý thể loại</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        {{-- Hết thể loại--}}
                    </ul>
                </li>
                {{--Hết sản phẩm--}}

                {{--Khách hàng--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Khách hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('customer_view')
                        <li class="nav-item">
                            <a href="{{route('customer.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý khách hàng</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{route('product_category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý đặt hàng</p>
                            </a>
                        </li>




                        {{--Shipping--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Shipping
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('brand.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Quản lý shipping</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Hết shipping--}}

                        {{--Đặt hàng--}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>
                                    Chi tiết đặt hàng
                                    <i class="right fas fa-angle-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('order_detail.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chi tiết đặt hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Hết đặt hàng--}}
                    </ul>
                </li>
                {{--Hết khách hàng--}}
                {{--Mã giảm giá--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Mã giảm giá
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('coupon.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý mã giảm giá</p>
                            </a>
                        </li>


                    </ul>
                </li>
                {{--Hết mã giảm giá--}}
                {{--Thanh toán--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Thanh toán
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{--@can('payment_view')--}}
                        <li class="nav-item">
                            <a href="{{route('payment.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý thanh toán</p>
                            </a>
                        </li>
                        {{-- @endcan--}}
                        {{--@can('payment_view')--}}
                        <li class="nav-item">
                            <a href="{{route('payment_category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý danh mục thanh toán</p>
                            </a>
                        </li>
                        {{-- @endcan--}}
                    </ul>
                </li>
                {{-- Hết thanh toán--}}
                {{--Tin tức--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý bài đăng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post_category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý danh mục bài đăng</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- Hết tin tức--}}



                {{--Slider--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Sldier
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Hết Slider--}}

                {{--Menu Item--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Item Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('menu_item.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý Item Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('submenu_item.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý Sub Item Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Hết Menu Item--}}

                {{--Vận chuyển--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Vận chuyển
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('delivery.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý vận chuyển</p>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- Hết vận chuyển--}}

                <li class="nav-header">Phân quyền</li>
                {{--Quyền--}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <p>
                            Quyền và vai trò
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('role_view')
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý quyền</p>
                            </a>
                        </li>
                        @endcan
                            @can('permission_create')
                        <li class="nav-item">
                            <a href="{{route('permission.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý vai trò</p>
                            </a>
                        </li>
                                @endcan


                    </ul>
                </li>
                {{--Hết quyền--}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
