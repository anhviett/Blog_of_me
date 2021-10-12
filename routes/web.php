<?php

use Illuminate\Support\Facades\Route;

    Route::get('get-api', function (){

    });

    Route::group(['prefix' => 'admin'], function (){

        //Login
        Route::get('/login','App\Http\Controllers\Backend\Authentication\LoginController@index')->name('login');
        Route::post('/check-login','App\Http\Controllers\Backend\Authentication\LoginController@store')->name('loginCheck');

        //Register
        Route::get('/register','App\Http\Controllers\Backend\Authentication\RegisterController@create')
            ->name('register');
        Route::post('/check-register','App\Http\Controllers\Backend\Authentication\RegisterController@store')->name('registerCheck');

        //Logout
        Route::post('/login', 'App\Http\Controllers\Backend\Authentication\LoginController@destroy')
            ->name('exit');

        //Forgot Password
        Route::get('/forgot-password', 'App\Http\Controllers\Backend\Authentication\Password\ForgotPasswordController@create')
            ->name('forgot.create');
        Route::post('/forgot-password', 'App\Http\Controllers\Backend\Authentication\Password\ForgotPasswordController@store')
        ->name('forgot.store');

        //Reset Password
        Route::get('/reset-password/{email}/{token}', 'App\Http\Controllers\Backend\Authentication\Password\ResetPasswordController@index')
            ->name('reset.index');
        Route::post('/reset-password/{email}/{token}', 'App\Http\Controllers\Backend\Authentication\Password\ResetPasswordController@reset')
            ->name('reset.update');

        //Resend
        Route::get('resend', 'App\Http\Controllers\Backend\Email\VerificationController@create')->name('resend');
        Route::post('resend', 'App\Http\Controllers\Backend\Email\VerificationController@resend');
        Route::get('/verifyEmailUser/{token}', 'App\Http\Controllers\Backend\Email\VerificationController@verifyEmailUser')->name('verify');


    });


Route::group(['prefix' => '',  'middleware' => 'auth'], function (){
    Route::get('/admin/home', 'App\Http\Controllers\Backend\DashboardController@index')->name('home.page');
    /*--/Users--*/
    Route::prefix('admin')->group(function (){
        Route::get('/users',[
            'as' =>'user.index',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@index',
            'middleware' => 'can:user_view'
        ]);
        Route::get('/user-create',[
            'as' =>'user.create',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@create',
            'middleware' => 'can:user_create'
        ]);
        Route::post('/user-store',[
            'as' =>'user.store',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@store'
        ]);
        Route::get('/user-edit/{user}',[
            'as' =>'user.edit',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@edit',
             'middleware' => 'can:user_edit'
        ]);
        Route::post('/user-update/{user}',[
            'as' =>'user.update',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@update'
        ]);
        Route::get('/user-delete/{user}',[
            'as' =>'user.delete',
            'uses' => 'App\Http\Controllers\Backend\Users\UserController@delete',
             'middleware' => 'can:user_delete'
        ]);
        Route::get('userChangeStatus','App\Http\Controllers\Backend\Users\UserController@userChangeStatus')
            ->name('userChangeStatus');
    });
    /*----------*/
    //--/User Profile--//
    Route::prefix('admin')->group(function (){
        Route::get('/userProfile',[
            'as' =>'userProfile.info',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@info',
            'middleware' => 'can:userProfile_view'
        ]);

        Route::post('/userProfile-store',[
            'as' =>'userProfile.store',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@store'
        ]);
        Route::get('/userProfile-edit/{userProfile}',[
            'as' =>'userProfile.edit',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@edit',
             'middleware' => 'can:userProfile_edit'
        ]);
        Route::post('/userProfile-update/{userProfile}',[
            'as' =>'userProfile.update',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@update'
        ]);
        Route::get('/userProfile-delete/{userProfile}',[
            'as' =>'userProfile.delete',
            'uses' => 'App\Http\Controllers\Backend\Users\UserProfileController@delete',
             'middleware' => 'can:userProfile_delete'
        ]);
        Route::get('userProfileChangeStatus','App\Http\Controllers\Backend\Users\UserProfileController@userProfileChangeStatus')
            ->name('userProfileChangeStatus');
    });
    /*----------*/

    /*--/Brands--*/
    Route::prefix('admin')->group(function (){
        Route::get('/brands',[
            'as' =>'brand.index',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@index',
            'middleware' => 'can:brand_view'
        ]);
        Route::get('/brand-create',[
            'as' =>'brand.create',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@create',
            'middleware' => 'can:brand_create'
        ]);
        Route::post('/brand-store',[
            'as' =>'brand.store',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@store'
        ]);
        Route::get('/brand-edit/{brand}',[
            'as' =>'brand.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@edit',
             'middleware' => 'can:brand_edit'
        ]);
        Route::post('/brand-update/{brand}',[
            'as' =>'brand.update',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@update'
        ]);
        Route::get('/brand-delete/{brand}',[
            'as' =>'brand.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\BrandController@delete',
             'middleware' => 'can:brand_delete'
        ]);
        Route::get('brandChangeStatus','App\Http\Controllers\Backend\Products\BrandController@brandChangeStatus')
            ->name('brandChangeStatus');
    });
    /*----------*/

    /*--/Coupon--*/
    Route::prefix('admin')->group(function (){
        Route::get('/coupons',[
            'as' =>'coupon.index',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@index',
            /*'middleware' => 'can:coupon_view'*/
        ]);
        Route::get('/coupon-create',[
            'as' =>'coupon.create',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@create',
//            'middleware' => 'can:coupon_create'
        ]);
        Route::post('/coupon-store',[
            'as' =>'coupon.store',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@store'
        ]);
        Route::get('/coupon-edit/{coupon}',[
            'as' =>'coupon.edit',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@edit',
//            'middleware' => 'can:coupon_edit'
        ]);
        Route::post('/coupon-update/{coupon}',[
            'as' =>'coupon.update',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@update'
        ]);
        Route::get('/coupon-delete/{coupon}',[
            'as' =>'coupon.delete',
            'uses' => 'App\Http\Controllers\Backend\Coupons\CouponController@delete',
//            /*'middleware' => 'can:coupon_delete'*/
        ]);
        Route::get('couponChangeStatus','App\Http\Controllers\Backend\Coupons\CouponController@couponChangeStatus')
            ->name('couponChangeStatus');
    });
    /*----------*/

    /*--/posts--*/
    Route::prefix('admin')->group(function (){
        Route::get('/posts',[
            'as' =>'post.index',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@index',
            /*'middleware' => 'can:post_view'*/
        ]);
        Route::get('/post-create',[
            'as' =>'post.create',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@create',
            /*'middleware' => 'can:post_create'*/
        ]);
        Route::post('/post-store',[
            'as' =>'post.store',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@store'
        ]);
        Route::get('/post-edit/{post}',[
            'as' =>'post.edit',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@edit',
            'middleware' => 'can:post_edit'
        ]);
        Route::post('/post-update/{post}',[
            'as' =>'post.update',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@update'
        ]);
        Route::get('/post-delete/{post}',[
            'as' =>'post.delete',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostController@delete',
            /*'middleware' => 'can:post_delete'*/
        ]);
        Route::get('postChangeStatus','App\Http\Controllers\Backend\Blog\PostController@postChangeStatus')
            ->name('postChangeStatus');
    });
    /*----------*/

    /*--/post category--*/
    Route::prefix('admin')->group(function (){
        Route::get('/post_categories',[
            'as' =>'post_category.index',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@index',
            'middleware' => 'can:post_category_view'
        ]);
        Route::get('/post_category-create',[
            'as' =>'post_category.create',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@create',
            'middleware' => 'can:post_category_create'
        ]);
        Route::post('/post_category-store',[
            'as' =>'post_category.store',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@store'
        ]);
        Route::get('/post_category-edit/{post_category}',[
            'as' =>'post_category.edit',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@edit',
            'middleware' => 'can:post_category_edit'
        ]);
        Route::post('/post_category-update/{post_category}',[
            'as' =>'post_category.update',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@update'
        ]);
        Route::get('/post_category-delete/{post_category}',[
            'as' =>'post_category.delete',
            'uses' => 'App\Http\Controllers\Backend\Blog\PostCategoryController@delete',
            'middleware' => 'can:post_category_delete'
        ]);
        Route::get('post_categoryChangeStatus','App\Http\Controllers\Backend\Blog\PostCategoryController@post_categoryChangeStatus')
            ->name('post_categoryChangeStatus');
    });
    /*----------*/

    /*--/styles--*/
    Route::prefix('admin')->group(function (){
        Route::get('/styles',[
            'as' =>'style.index',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@index',
            'middleware' => 'can:style_view'
        ]);
        Route::get('/style-create',[
            'as' =>'style.create',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@create',
            'middleware' => 'can:style_create'
        ]);
        Route::post('/style-store',[
            'as' =>'style.store',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@store'
        ]);
        Route::get('/style-edit/{brand}',[
            'as' =>'style.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@edit',
            'middleware' => 'can:style_edit'
        ]);
        Route::post('/style-update/{style}',[
            'as' =>'style.update',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@update'
        ]);
        Route::get('/style-delete/{style}',[
            'as' =>'style.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\StyleController@delete',
            'middleware' => 'can:style_delete'
        ]);
        Route::get('styleChangeStatus','App\Http\Controllers\Backend\Products\StyleController@styleChangeStatus')
            ->name('styleChangeStatus');
    });
    /*----------*/

    /*Products*/
    Route::prefix('admin')->group(function (){
        Route::get('/products',[
            'as' =>'product.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@index',
            'middleware' => 'can:product_view'
        ]);
        Route::get('/product-create',[
            'as' =>'product.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@create',
            'middleware' => 'can:product_create'
        ]);
        Route::post('/product-store',[
            'as' =>'product.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@store'
        ]);
        Route::get('/product-edit/{products}',[
            'as' =>'product.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@edit',
             'middleware' => 'can:product_edit'
        ]);
        Route::post('/product-update/{products}',[
            'as' =>'product.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@update'
        ]);
        Route::get('/product-delete/{products}',[
            'as' =>'product.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductController@delete',
             'middleware' => 'can:product_delete'
        ]);
        Route::get('productChangeStatus','App\Http\Controllers\Backend\Products\ProductController@productChangeStatus')
            ->name('productChangeStatus');

    });
    /*-------*/

    /*ProductCategory*/
    Route::prefix('admin')->group(function (){
        Route::get('/product_categories',[
            'as' =>'product_category.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@index',
            'middleware' => 'can:product_category_view'
        ]);
        Route::get('/product_category-create',[
            'as' =>'product_category.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@create',
            'middleware' => 'can:product_category_create'
        ]);
        Route::post('/product_category-store',[
            'as' =>'product_category.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@store'
        ]);
        Route::get('/product_category-edit/{product_category}',[
            'as' =>'product_category.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@edit',
            'middleware' => 'can:product_category_edit'
        ]);
        Route::post('/product_category-update/{product_category}',[
            'as' =>'product_category.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@update'
        ]);
        Route::get('/product_category-delete/{product_category}',[
            'as' =>'product_category.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductCategoryController@delete',
            'middleware' => 'can:product_category_delete'
        ]);
        Route::get('product_categoryChangeStatus','App\Http\Controllers\Backend\Products\ProductCategoryController@product_categoryChangeStatus')
            ->name('product_categoryChangeStatus');

    });
    /*-------*

    /*ProductTag*/
    Route::prefix('admin')->group(function (){
        Route::get('/product_tags',[
            'as' =>'product_tag.index',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/product_tag-create',[
            'as' =>'product_tag.create',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/product_tag-store',[
            'as' =>'product_tag.store',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@store'
        ]);
        Route::get('/product_tag-edit/{product_tag}',[
            'as' =>'product_tag.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/product_tag-update/{product_tag}',[
            'as' =>'product_tag.update',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@update'
        ]);
        Route::get('/product_tag-delete/{product_tag}',[
            'as' =>'product_tag.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\ProductTagController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('product_tagChangeStatus','App\Http\Controllers\Backend\Products\ProductTagController@product_tagChangeStatus')
            ->name('product_tagChangeStatus');

    });
    /*-------*/

    /*Size*/
    Route::prefix('admin')->group(function (){
        Route::get('/sizes',[
            'as' =>'size.index',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/size-create',[
            'as' =>'size.create',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/size-store',[
            'as' =>'size.store',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@store'
        ]);
        Route::get('/size-edit/{size}',[
            'as' =>'size.edit',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/size-update/{size}',[
            'as' =>'size.update',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@update'
        ]);
        Route::get('/size-delete/{size}',[
            'as' =>'size.delete',
            'uses' => 'App\Http\Controllers\Backend\Products\SizeController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('sizeChangeStatus','App\Http\Controllers\Backend\Products\SizeController@sizeChangeStatus')
            ->name('sizeChangeStatus');

    });
    /*-------*/

    /*Menu Item*/
    Route::prefix('admin')->group(function (){
        Route::get('/menu_items',[
            'as' =>'menu_item.index',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/menu_item-create',[
            'as' =>'menu_item.create',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/menu_item-store',[
            'as' =>'menu_item.store',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@store'
        ]);
        Route::get('/menu_item-edit/{menu_item}',[
            'as' =>'menu_item.edit',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/menu_item-update/{menu_item}',[
            'as' =>'menu_item.update',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@update'
        ]);
        Route::get('/menu_item-delete/{menu_item}',[
            'as' =>'menu_item.delete',
            'uses' => 'App\Http\Controllers\Backend\Header\MenuItemController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('menu_itemChangeStatus','App\Http\Controllers\Backend\Header\MenuItemController@menu_itemChangeStatus')
            ->name('menu_itemChangeStatus');

    });
    /*-------*/

    /*Sub Menu Item*/
    Route::prefix('admin')->group(function (){
        Route::get('/submenu_items',[
            'as' =>'submenu_item.index',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/submenu_item-create',[
            'as' =>'submenu_item.create',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/submenu_item-store',[
            'as' =>'submenu_item.store',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@store'
        ]);
        Route::get('/submenu_item-edit/{submenu_item}',[
            'as' =>'submenu_item.edit',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/submenu_item-update/{submenu_item}',[
            'as' =>'submenu_item.update',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@update'
        ]);
        Route::get('/submenu_item-delete/{submenu_item}',[
            'as' =>'submenu_item.delete',
            'uses' => 'App\Http\Controllers\Backend\Header\SubMenuItemController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('submenu_itemChangeStatus','App\Http\Controllers\Backend\Header\SubMenuItemController@submenu_itemChangeStatus')
            ->name('submenu_itemChangeStatus');

    });
    /*-------*/

    /*Slider*/
    Route::prefix('admin')->group(function (){
        Route::get('/sliders',[
            'as' =>'slider.index',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/slider-create',[
            'as' =>'slider.create',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/slider-store',[
            'as' =>'slider.store',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@store'
        ]);
        Route::get('/slider-edit/{slider}',[
            'as' =>'slider.edit',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/slider-update/{slider}',[
            'as' =>'slider.update',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@update'
        ]);
        Route::get('/slider-delete/{slider}',[
            'as' =>'slider.delete',
            'uses' => 'App\Http\Controllers\Backend\Banner\SliderController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('sliderChangeStatus','App\Http\Controllers\Backend\Banner\SliderController@sliderChangeStatus')
            ->name('sliderChangeStatus');

    });
    /*-------*/

    /*Customers*/
    Route::prefix('admin')->group(function (){
        Route::get('/customers',[
            'as' =>'customer.index',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/customer-create',[
            'as' =>'customer.create',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/customer-store',[
            'as' =>'customer.store',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@store'
        ]);
        Route::get('/customer-edit/{customer}',[
            'as' =>'customer.edit',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/customer-update/{customer}',[
            'as' =>'customer.update',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@update'
        ]);
        Route::get('/customer-delete/{customer}',[
            'as' =>'customer.delete',
            'uses' => 'App\Http\Controllers\Backend\Orders\CustomerController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('customerChangeStatus','App\Http\Controllers\Backend\Orders\CustomerController@customerChangeStatus')
            ->name('customerChangeStatus');

    });
    /*-------*/

    /*Payments*/
    Route::prefix('admin')->group(function (){
        Route::get('/payments',[
            'as' =>'payment.index',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@index',
            /*'middleware' => 'can:payment_view'*/
        ]);
        Route::get('/payment-create',[
            'as' =>'payment.create',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@create',
            /*'middleware' => 'can:payment_create'*/
        ]);
        Route::post('/payment-store',[
            'as' =>'payment.store',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@store'
        ]);
        Route::get('/payment-edit/{payment}',[
            'as' =>'payment.edit',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@edit',
            /* 'middleware' => 'can:payment_edit'*/
        ]);
        Route::post('/payment-update/{payment}',[
            'as' =>'payment.update',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@update'
        ]);
        Route::get('/payment-delete/{payment}',[
            'as' =>'payment.delete',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentController@delete',
            /* 'middleware' => 'can:payment_delete'*/
        ]);
        Route::get('paymentChangeStatus','App\Http\Controllers\Backend\Payments\PaymentController@paymentChangeStatus')
            ->name('paymentChangeStatus');

    });
    /*-------*/

    /*Payment Categories*/
    Route::prefix('admin')->group(function (){
        Route::get('/payment_categories',[
            'as' =>'payment_category.index',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@index',
            /*'middleware' => 'can:payment_view'*/
        ]);
        Route::get('/payment_category-create',[
            'as' =>'payment_category.create',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@create',
            /*'middleware' => 'can:payment_create'*/
        ]);
        Route::post('/payment_category-store',[
            'as' =>'payment_category.store',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@store'
        ]);
        Route::get('/payment_category-edit/{payment_category}',[
            'as' =>'payment_category.edit',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@edit',
            /* 'middleware' => 'can:payment_edit'*/
        ]);
        Route::post('/payment_category-update/{payment}',[
            'as' =>'payment_category.update',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@update'
        ]);
        Route::get('/payment_category-delete/{payment_category}',[
            'as' =>'payment_category.delete',
            'uses' => 'App\Http\Controllers\Backend\Payments\PaymentCategoryController@delete',
            /* 'middleware' => 'can:payment_delete'*/
        ]);
        Route::get('payment_categoryChangeStatus','App\Http\Controllers\Backend\Payments\PaymentCategoryController@payment_categoryChangeStatus')
            ->name('payment_categoryChangeStatus');

    });
    /*-------*/

    /*Reviews*/
    Route::prefix('admin')->group(function (){
        Route::get('/reviews',[
            'as' =>'review.index',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@index',
            'middleware' => 'can:review_view'
        ]);
        Route::get('/review-create',[
            'as' =>'review.create',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@create',
            'middleware' => 'can:review_create'
        ]);
        Route::post('/review-store',[
            'as' =>'review.store',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@store'
        ]);
        Route::get('/review-edit/{review}',[
            'as' =>'review.edit',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@edit',
            'middleware' => 'can:review_edit'
        ]);
        Route::post('/review-update/{review}',[
            'as' =>'review.update',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@update'
        ]);
        Route::get('/review-delete/{review}',[
            'as' =>'review.delete',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewController@delete',
             'middleware' => 'can:review_delete'
        ]);
        Route::get('reviewChangeStatus','App\Http\Controllers\Backend\Reviews\ReviewController@reviewChangeStatus')
            ->name('reviewChangeStatus');

    });
    /*-------*/

    /*Review Tag*/
    Route::prefix('admin')->group(function (){
        Route::get('/review_tags',[
            'as' =>'review_tag.index',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@index',
            'middleware' => 'can:review_tag_view'
        ]);
        Route::get('/review_tag-create',[
            'as' =>'review_tag.create',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@create',
            'middleware' => 'can:review_tag_create'
        ]);
        Route::post('/review_tag-store',[
            'as' =>'review_tag.store',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@store'
        ]);
        Route::get('/review_tag-edit/{review_category}',[
            'as' =>'review_tag.edit',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@edit',
             'middleware' => 'can:review_tag_edit'
        ]);
        Route::post('/review_tag-update/{review_category}',[
            'as' =>'review_tag.update',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@update'
        ]);
        Route::get('/review_tag-delete/{review_category}',[
            'as' =>'review_tag.delete',
            'uses' => 'App\Http\Controllers\Backend\Reviews\ReviewTagController@delete',
             'middleware' => 'can:review_tag_delete'
        ]);
        Route::get('review_tagChangeStatus','App\Http\Controllers\Backend\Reviews\ReviewTagController@review_tagChangeStatus')
            ->name('review_tagChangeStatus');

    });
    /*-------*/

    /*Order Detail*/
    Route::prefix('admin')->group(function (){
        Route::get('/order_detail',[
            'as' =>'order_detail.index',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/order_detail-create',[
            'as' =>'order_detail.create',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@create',
            /*'middleware' => 'can:brand_create'*/
        ]);
        Route::post('/order_detail-store',[
            'as' =>'order_detail.store',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@store'
        ]);
        Route::get('/order_detail-edit/{order_detail}',[
            'as' =>'order_detail.edit',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@edit',
            /* 'middleware' => 'can:brand_edit'*/
        ]);
        Route::post('/order_detail-update/{order_detail}',[
            'as' =>'order_detail.update',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@update'
        ]);
        Route::get('/order_detail-delete/{order_detail}',[
            'as' =>'order_detail.delete',
            'uses' => 'App\Http\Controllers\Backend\Orders\OrderDetailController@delete',
            /* 'middleware' => 'can:brand_delete'*/
        ]);
        Route::get('order_detailChangeStatus','App\Http\Controllers\Backend\Orders\OrderDetailController@order_detailChangeStatus')
            ->name('order_detailChangeStatus');

    });
    /*-------*/

    /*Menu Item*/
    Route::prefix('admin')->group(function (){
        Route::get('/deliveries',[
            'as' =>'delivery.index',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@index',
            /*'middleware' => 'can:brand_view'*/
        ]);
        Route::get('/delivery-create',[
            'as' =>'delivery.create',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@create',
            /*'middleware' => 'can:delivery_create'*/
        ]);
        Route::post('/delivery-store',[
            'as' =>'delivery.store',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@store'
        ]);
        Route::post('/delivery-store',[
            'as' =>'delivery.store',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@store'
        ]);

        Route::get('/delivery-edit/{delivery}',[
            'as' =>'delivery.edit',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@edit',
            /* 'middleware' => 'can:delivery_edit'*/
        ]);
        Route::post('/delivery-update/{delivery}',[
            'as' =>'delivery.update',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@update'
        ]);
        Route::get('/delivery-delete/{delivery}',[
            'as' =>'delivery.delete',
            'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@delete',
            /* 'middleware' => 'can:delivery_delete'*/
        ]);
        Route::get('deliveryChangeStatus','App\Http\Controllers\Backend\Deliveries\DeliveryController@deliveryChangeStatus')
            ->name('deliveryChangeStatus');

    });
    /*-------*/

    /*Feeship*/
    Route::post('/select-feeship',[
        'as' =>'select.feeship',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@select_feeship'
    ]);
    Route::post('/update-feeship',[
        'as' =>'update.feeship',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@update_feeship'
    ]);
    Route::post('/delivery-insert',[
        'as' =>'delivery.insert',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@insert'
    ]);
    Route::post('/delivery-index',[
        'as' =>'delivery.insert',
        'uses' => 'App\Http\Controllers\Backend\Deliveries\DeliveryController@insert'
    ]);
    /*-------*/

    /*Roles*/
    Route::prefix('admin')->group(function (){
        Route::get('/roles',[
            'as' =>'role.index',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@index',
            'middleware' => 'can:role_view'
        ]);
        Route::get('/role-create',[
            'as' =>'role.create',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@create',
           'middleware' => 'can:role_create'
        ]);
        Route::post('/role-store',[
            'as' =>'role.store',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@store'
        ]);
        Route::get('/role-edit/{Role}',[
            'as' =>'role.edit',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@edit',
            'middleware' => 'can:role_edit'
        ]);
        Route::post('/role-update/{Role}',[
            'as' =>'role.update',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@update'
        ]);
        Route::get('/role-delete/{Role}',[
            'as' =>'role.delete',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\RoleController@delete',
            'middleware' => 'can:role_delete'
        ]);
        Route::get('roleChangeStatus','App\Http\Controllers\Backend\PermissionRole\RoleController@roleChangeStatus')
            ->name('roleChangeStatus');
    });
    /*-------*/
    /*Permissions*/
    Route::prefix('permissions')->group(function (){
        Route::get('/create',[
            'as' =>'permission.create',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@create',
            'middleware' => 'can:permission_create'
        ]);
        Route::post('/store',[
            'as' =>'permission.store',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@store'
        ]);
        Route::post('/edit/{Permission}',[
            'as' =>'permission.edit',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@edit',
            'middleware' => 'can:permission_edit'
        ]);
        Route::post('/update/{Permission}',[
            'as' =>'permission.update',
            'uses' => 'App\Http\Controllers\Backend\PermissionRole\PermissionController@update'

        ]);
    });
    /*-------*/

    //Login facebook
    Route::get('/login-facebook','App\Http\Controllers\Backend\Authentication\LoginController@login_facebook')->name('login.facebook');
    Route::get('/admin/callback','App\Http\Controllers\Backend\Authentication\LoginController@callback_facebook');

});





/*-----Frontend-----*/
Route::prefix('site')->group(function (){
    Route::get('/home','App\Http\Controllers\Site\HomeController@index')
        ->name('home.index');


    //---------------------Start Blog---------------------------
    Route::get('/blog_list/{slug}','App\Http\Controllers\Site\Blog\BlogListController@index')
        ->name('blog_list.index');

    Route::get('/blog-single/{slug}','App\Http\Controllers\Site\Blog\BlogSingleController@index')
        ->name('blog_single.index');

   /* Route::get('/blog-single/{id}','App\Http\Controllers\Site\Blog\BlogSingleController@show')
        ->name('blog-single.show');*/

    //---------------------End Blog---------------------------
    Route::get('/shop', 'App\Http\Controllers\Site\ShopController@index')
        ->name('product.site');
    Route::get('/shop/{slug}', 'App\Http\Controllers\Site\ShopController@index')
        ->name('product.categories');
    //---------------------Start Checkout---------------------------
    Route::get('/checkout','App\Http\Controllers\Site\CheckOutController@index')
        ->name('checkout.index');

    Route::post('/save_checkout','App\Http\Controllers\Site\CheckOutController@save_checkout')
        ->name('save_checkout');

    Route::post('/login-customer','App\Http\Controllers\Site\CheckOutController@login_customer')
        ->name('login_customer');

    Route::post('/add-customer','App\Http\Controllers\Site\CheckOutController@store')
        ->name('add_customer.store');

    //-------------------End Checkout---------------------------------

    //-------------------Start Payment---------------------------------
    Route::get('/payment','App\Http\Controllers\Site\CheckOutController@payment')
        ->name('payment');
    Route::post('/order-place/store','App\Http\Controllers\Site\CheckOutController@store')
        ->name('order_place.store');
    Route::post('/order-place','App\Http\Controllers\Site\CheckOutController@order_place')
        ->name('order_place');
    //-------------------End Payment---------------------------------

    //-------------------Start Cart---------------------------------

    Route::get('/cart','App\Http\Controllers\Site\CartController@cart')
        ->name('cart.index');
    Route::get('/update-to-cart','App\Http\Controllers\Site\CartController@updateCart')
        ->name('cart.update');
    Route::get('/add-to-cart/{id}','App\Http\Controllers\Site\CartController@add')
        ->name('cart.add');

    Route::get('/delete-to-cart/{id}','App\Http\Controllers\Site\CartController@deleteCart')
        ->name('cart.delete');
    Route::get('/delete-all-cart','App\Http\Controllers\Site\CartController@deleteAllCart')
        ->name('cart.deleteAll');
    Route::get('/unset-coupon','App\Http\Controllers\Site\CartController@unsetCoupon')
        ->name('unset.coupon');
    //-------------------End Cart---------------------------------

    //-------------------Start Coupon---------------------------------
    Route::post('/check-coupon','App\Http\Controllers\Site\CartController@check_coupon')
        ->name('check.coupon');
    //-------------------End Coupon---------------------------------

    //---------------Start Product Detail---------------------------------
    Route::get('/product-details','App\Http\Controllers\Site\ProductDetailController@show')
        ->name('product-details.show');
    Route::get('/product-details/{id}','App\Http\Controllers\Site\ProductDetailController@index')
        ->name('product-details.index');
    //-------------------End Product Detail---------------------------------

    //----------------Authentication Customer---------------------------------
    Route::get('/login-register','App\Http\Controllers\Site\Auth\AuthenticationController@login_register')
        ->name('login_register');

    Route::post('/login', 'App\Http\Controllers\Site\Auth\LoginController@login_customer')
        ->name('login_customer');

    Route::post('/register','App\Http\Controllers\Site\Auth\RegisterController@register_customer')
        ->name('register_customer');

    Route::get('/logout','App\Http\Controllers\Site\Auth\AuthenticationController@logout')
        ->name('logout');

    //Resend
    Route::get('resend-customer', 'App\Http\Controllers\Site\Auth\AuthenticationController@create')->name('resend.customer');
    Route::post('resend', 'App\Http\Controllers\Site\Auth\AuthenticationController@resend');
    Route::get('/verifyEmailCustomer/{token}', 'App\Http\Controllers\Site\Auth\AuthenticationController@verifyEmailCustomer')->name('verify.customer');

    //----------------End Authentication Customer---------------------------------
    //-------------------Reviews--------------------
    Route::get('customer/review/{order_item_id}', 'App\Http\Controllers\Site\CustomerReviewController@index')
        ->name('customer.review');
    Route::post('customer/review/addReview/{id}', 'App\Http\Livewire\Customer\CustomerReviewComponent@addReview')
        ->name('addReview');

    //-------------------End Reviews---------------
    //-------------------Errors--------------------
    Route::get('/error/404', 'App\Http\Controllers\Site\Errors\ErrorController@index')
    ->name('404.index');
    //-------------------End Errors----------------

    //-------------------Contact--------------------
    Route::get('/contact', 'App\Http\Controllers\Site\ContactController@index')
        ->name('contact');
    //-------------------End Contact----------------
});



