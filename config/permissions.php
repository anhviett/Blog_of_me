<?php
return [
    'access' => [
        'user_view' => 'user_view',
        'user_edit' => 'user_edit',
        'user_create' => 'user_create',
        'user_delete' => 'user_delete',
        'role_view' => 'role_view',
        'role_edit' => 'role_edit',
        'role_create' => 'role_create',
        'role_delete' => 'role_delete',
        'brand_view' => 'brand_view',
        'brand_edit' => 'brand_edit',
        'brand_create' => 'brand_create',
        'brand_delete' => 'brand_delete',
        'product_view' => 'product_view',
        'product_edit' => 'product_edit',
        'product_create' => 'product_create',
        'product_delete' => 'product_delete'
    ],
    'table_module' =>[
        'user',
        'role',
        'product',
        'brand',
        'product_category',
        'product_tag',
        'review',
        'review_tag',
        'size',
        'order',
        'customer',
        'permission',
        'slider',
        'style',
        'post',
        'post_category',
        'payment',
        'customer'
        ],
    'moduleChildren' => [
        'view',
        'create',
        'edit',
        'delete'
    ]
];
