<?php


namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicy(){
        $this->defineGateUser();
        $this->defineGateRole();
        $this->defineGateProduct();
        $this->defineGateProductCategory();
        $this->defineGateProductTag();
        $this->defineGatePost();
        $this->defineGatePostCategory();
        $this->defineGateReview();
        $this->defineGateReviewTag();
        $this->defineGatePermission();
        $this->defineGateBrand();
        $this->defineGateOrder();
        $this->defineGateCustomer();
        $this->defineGateSize();
        $this->defineGateStyle();
        $this->defineGateShipping();
        $this->defineGatePayment();
    }
    public function defineGateUser(){
        Gate::define('user_view', 'App\Policies\UserPolicy@view');
        Gate::define('user_create', 'App\Policies\UserPolicy@create');
        Gate::define('user_edit', 'App\Policies\UserPolicy@update');
        Gate::define('user_delete', 'App\Policies\UserPolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('role_view', 'App\Policies\RolePolicy@view');
        Gate::define('role_create', 'App\Policies\RolePolicy@create');
        Gate::define('role_edit', 'App\Policies\RolePolicy@update');
        Gate::define('role_delete', 'App\Policies\RolePolicy@delete');
    }

    public function defineGateProduct(){
        Gate::define('product_view', 'App\Policies\ProductPolicy@view');
        Gate::define('product_create', 'App\Policies\ProductPolicy@create');
        Gate::define('product_edit', 'App\Policies\ProductPolicy@update');
        Gate::define('product_delete', 'App\Policies\ProductPolicy@delete');
    }

    public function defineGateProductCategory(){
        Gate::define('product_category_view', 'App\Policies\ProductCategoryPolicy@view');
        Gate::define('product_category_create', 'App\Policies\ProductCategoryPolicy@create');
        Gate::define('product_category_edit', 'App\Policies\ProductCategoryPolicy@update');
        Gate::define('product_category_delete', 'App\Policies\ProductCategoryPolicy@delete');
    }

    public function defineGateProductTag(){
        Gate::define('product_tag_view', 'App\Policies\ProductTagPolicy@view');
        Gate::define('product_tag_create', 'App\Policies\ProductTagPolicy@create');
        Gate::define('product_tag_edit', 'App\Policies\ProductTagPolicy@update');
        Gate::define('product_tag_delete', 'App\Policies\ProductTagPolicy@delete');
    }

    public function defineGatePost(){
        Gate::define('post_view', 'App\Policies\PostPolicy@view');
        Gate::define('post_create', 'App\Policies\PostPolicy@create');
        Gate::define('post_edit', 'App\Policies\PostPolicy@update');
        Gate::define('post_delete', 'App\Policies\PostPolicy@delete');
    }

    public function defineGatePostCategory(){
        Gate::define('post_category_view', 'App\Policies\PostCategoryPolicy@view');
        Gate::define('post_category_create', 'App\Policies\PostCategoryPolicy@create');
        Gate::define('post_category_edit', 'App\Policies\PostCategoryPolicy@update');
        Gate::define('post_category_delete', 'App\Policies\PostCategoryPolicy@delete');
    }

    public function defineGateReview(){
        Gate::define('review_view', 'App\Policies\ReviewPolicy@view');
        Gate::define('review_create', 'App\Policies\ReviewPolicy@create');
        Gate::define('review_edit', 'App\Policies\ReviewPolicy@update');
        Gate::define('review_delete', 'App\Policies\ReviewPolicy@delete');
    }

    public function defineGateReviewTag(){
        Gate::define('review_tag_view', 'App\Policies\ReviewTagPolicy@view');
        Gate::define('review_tag_create', 'App\Policies\ReviewTagPolicy@create');
        Gate::define('review_tag_edit', 'App\Policies\ReviewTagPolicy@update');
        Gate::define('review_tag_delete', 'App\Policies\ReviewTagPolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permission_view', 'App\Policies\PermissionPolicy@view');
        Gate::define('permission_create', 'App\Policies\PermissionPolicy@create');
        Gate::define('permission_edit', 'App\Policies\PermissionPolicy@update');
        Gate::define('permission_delete', 'App\Policies\PermissionPolicy@delete');
    }

    public function defineGateSize(){
        Gate::define('size_view', 'App\Policies\SizePolicy@view');
        Gate::define('size_create', 'App\Policies\SizePolicy@create');
        Gate::define('size_edit', 'App\Policies\SizePolicy@update');
        Gate::define('size_delete', 'App\Policies\SizePolicy@delete');
    }

    public function defineGateStyle(){
        Gate::define('style_view', 'App\Policies\StylePolicy@view');
        Gate::define('style_create', 'App\Policies\StylePolicy@create');
        Gate::define('style_edit', 'App\Policies\StylePolicy@update');
        Gate::define('style_delete', 'App\Policies\StylePolicy@delete');
    }

    public function defineGateBrand(){
        Gate::define('brand_view', 'App\Policies\BrandPolicy@view');
        Gate::define('brand_create', 'App\Policies\BrandPolicy@create');
        Gate::define('brand_edit', 'App\Policies\BrandPolicy@update');
        Gate::define('brand_delete', 'App\Policies\BrandPolicy@delete');
    }

    public function defineGateCustomer(){
        Gate::define('customer_view', 'App\Policies\CustomerPolicy@view');
        Gate::define('customer_create', 'App\Policies\CustomerPolicy@create');
        Gate::define('customer_edit', 'App\Policies\CustomerPolicy@update');
        Gate::define('customer_delete', 'App\Policies\CustomerPolicy@delete');
    }

    public function defineGateOrder(){
        Gate::define('order_view', 'App\Policies\OrderPolicy@view');
        Gate::define('order_create', 'App\Policies\OrderPolicy@create');
        Gate::define('order_edit', 'App\Policies\OrderPolicy@update');
        Gate::define('order_delete', 'App\Policies\OrderPolicy@delete');
    }

    public function defineGateShipping(){
        Gate::define('shipping_view', 'App\Policies\ShippingPolicy@view');
        Gate::define('shipping_create', 'App\Policies\ShippingPolicy@create');
        Gate::define('shipping_edit', 'App\Policies\ShippingPolicy@update');
        Gate::define('shipping_delete', 'App\Policies\ShippingPolicy@delete');
    }

    public function defineGatePayment(){
        Gate::define('payment_view', 'App\Policies\PaymentPolicy@view');
        Gate::define('payment_create', 'App\Policies\PaymentPolicy@create');
        Gate::define('payment_edit', 'App\Policies\PaymentPolicy@update');
        Gate::define('payment_delete', 'App\Policies\PaymentPolicy@delete');
    }
}
