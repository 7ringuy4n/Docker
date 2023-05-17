<?php

return [
    'url' => [
        'prefix_admin' => 'adminstrator',
        'prefix_login' => 'login',
        'prefix_frontend' => '',
    ],
    'format' => [
        'long_time' => 'H:m:s d/m/Y',
        'short_time' => 'd/m/Y',
    ],
    'template' => [
        'form_input' => [
            'class' => 'form-control col-md-6 col-xs-12'
        ],
        'form_label' => [
            'class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ],
        'form_label_full' => [
            'class' => 'control-label mr-2'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],
        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor',
            // 'id' => 'ckeditor'
        ],
        'form_datepicker' => [
            'class' => 'form-control col-md-6 col-xs-12 datepicker',
            'id' => 'ckeditor'
        ],
        'form_multi' => [
            'class' => 'form-control col-md-6 col-xs-12 select-multi',
            'multiple' => true
        ],
        'form_slug' => [
            'class' => 'form-control col-md-6 col-xs-12 slug'
        ],
        'form_currency' => [
            'class' => 'form-control col-md-6 col-xs-12 currency'
        ],
        'status' => [
            'all' => ['name' => 'All', 'class' => 'btn-success'],
            'active' => ['name' => 'Active', 'class' => 'btn-success'],
            'inactive' => ['name' => 'Inactive', 'class' => 'btn-info'],
            'block' => ['name' => 'Block', 'class' => 'btn-danger'],
            'default' => ['name' => 'Undefined', 'class' => 'btn-success'],
        ],
        'recall' => [
            'all' => ['name' => 'All', 'class' => 'btn-success'],
            'active' => ['name' => 'Contact', 'class' => 'btn-success'],
            'inactive' => ['name' => 'No contact', 'class' => 'btn-info'],
        ],
        'order' => [
            'all' => ['name' => 'All', 'class' => 'btn-success'],
            'active' => ['name' => 'Processed', 'class' => 'btn-success'],
            'inactive' => ['name' => 'No process', 'class' => 'btn-info'],
        ],
        'is_home' => [
            'yes' => ['name' => 'Show', 'class' => 'btn-primary'],
            'no' => ['name' => 'Hidden', 'class' => 'btn-warning']
        ],
        'bcc_contact' => [
            'active' => ['name' => 'On', 'class' => 'btn-primary'],
            'inactive' => ['name' => 'Off', 'class' => 'btn-warning']
        ],
        'bcc_order' => [
            'active' => ['name' => 'On', 'class' => 'btn-primary'],
            'inactive' => ['name' => 'Off', 'class' => 'btn-warning']
        ],
        'setting_position' => [
            'right' => 'Right',
            'left' => 'Left'
        ],
        'rating' => [
            1 => '★',
            2 => '★ ★',
            3 => '★ ★ ★',
            4 => '★ ★ ★ ★',
            5 => '★ ★ ★ ★ ★',
        ],
        'room_state' => [
            1 => 'Đang trống',
            2 => 'Đang đặt',
            3 => 'Đang ở'
        ],
        'display' => [
            'list' => ['name' => 'List'],
            'grid' => ['name' => 'Gird'],
        ],
        'type' => [
            'article' => ['name' => 'Article'],
            'video' => ['name' => 'Video'],
        ],
        'level' => [
            'admin' => ['name' => 'Manager'],
            'member' => ['name' => 'User'],
        ],
        'target' => [
            '_self' => 'Normal',
            '_blank' => 'New tab',
        ],
        'function_name'  => [
            'vnexpress'  => ['name' => 'vnexpress'],
            'dantri'     => ['name' => 'dantri'],
        ],
        'search' => [
            'all' => ['name' => 'Search All'],
            'id' => ['name' => 'Search by ID'],
            'name' => ['name' => 'Search by Name'],
            'username' => ['name' => 'Search by Username'],
            'fullname' => ['name' => 'Search by Fullname'],
            'email' => ['name' => 'Search by Email'],
            'description' => ['name' => 'Search by Description'],
            'link' => ['name' => 'Search by Path'],
            'content' => ['name' => 'Search by Content'],
        ],
        'button' => [
            'edit' => ['class' => 'btn-success', 'title' => 'Edit', 'icon' => 'fa-pencil', 'route-name' => '/form'],
            'delete' => ['class' => 'btn-danger btn-delete', 'title' => 'Delete', 'icon' => 'fa-trash', 'route-name' => '/delete'],
            'info' => ['class' => 'btn-info', 'title' => 'View', 'icon' => 'fa-pencil', 'route-name' => '/delete'],
        ],
        'header' => [
            'dashboard'  => 'Dashboard',
            'cateNews'   => 'Category News',
            'article'    => 'News',
            'cateProduct' => 'Category Product',
            'product'    => 'Product',
            'menuHeader' => 'Menu header',
            'menuMain'   => 'Menu main',
            'menuFooter' => 'Menu footer',
            'slider'     => 'Slider',
            'files'      => 'Image',
            'agencies'   => 'Branch',
            'recall'     => 'Recall',
            'cateFaq'    => 'Category FAQ',
            'faq'        => 'FAQ',
            'setting'    => 'Setting',
            'user'       => 'User',
            'comments'   => 'Comment',
            'category'   => 'Category',
            'contact'    => 'Contact',
            'order'      => 'Order',
            'customer'   => 'Customer',
            'menuLanding' => 'Landing',
            'teams'      => 'Teams',
            'banner'     => 'Banner',
            'usb'        => 'USB',
            'tags'       => 'Tag',
            'columns'    => 'Columns',
            'application'       => 'Applications & Solutions',
            'cateApplication'   => 'Danh mục Application & Slution',
            'emailSubscribe'    => 'Email subscribe',
            'room'      => 'Room',
            'media'     => 'Gallery',
            'facility'  => 'Facility',
            'benefit'  => 'Benefit',
            'cateConvenience'  => 'Convenience Category',
            'convenience'  => 'Convenience',
            'review'  => 'Review',
            'booking'  => 'Booking',
        ]
    ],
    'config' => [
        'search' => [
            'default' => ['all', 'id', 'name'],
            'slider' => ['all', 'id', 'name', 'description', 'link'],
            'cateNews' => ['all', 'name'],
            'cateProduct' => ['all', 'name'],
            'article' => ['all', 'name', 'content'],
        ],
        'button' => [
            'default'               => ['edit', 'delete'],
            'slider'                => ['edit', 'delete'],
            'category'              => ['edit', 'delete'],
            'article'               => ['edit', 'delete'],
            'comments'              => ['edit', 'delete'],
            'agencies'              => ['edit', 'delete'],
            'menuHeader'            => ['edit', 'delete'],
            'menuFooter'            => ['edit', 'delete'],
            'menuMain'              => ['edit', 'delete'],
            'cateNews'              => ['edit', 'delete'],
            'cateProduct'           => ['edit', 'delete'],
            'product'               => ['edit', 'delete'],
            'cateFaq'               => ['edit', 'delete'],
            'faq'                   => ['edit', 'delete'],
            'customer'              => ['edit', 'delete'],
            'teams'                 => ['edit', 'delete'],
            'portfolio'             => ['edit', 'delete'],
            'usb'                   => ['edit', 'delete'],
            'menuLanding'           => ['edit', 'delete'],
            'banner'                => ['edit', 'delete'],
            'tags'                  => ['edit', 'delete'],
            'columns'               => ['edit', 'delete'],
            'application'           => ['edit', 'delete'],
            'room'                  => ['edit', 'delete'],
            'emailBcc'              => ['delete'],
            'emailTemplate'         => ['delete'],
            'user'                  => ['edit'],
            'recall'                => ['delete'],
            'contact'               => ['delete'],
            'order'                 => ['delete'],
            'register'              => ['delete'],
            'emailSubscribe'        => ['delete'],
            'menuLandingSection'    => ['edit', 'delete'],
            'cateApplication'       => ['edit', 'delete'],
            'media'                 => ['edit', 'delete'],
            'facility'              => ['edit', 'delete'],
            'benefit'               => ['edit', 'delete'],
            'cateConvenience'       => ['edit', 'delete'],
            'convenience'           => ['edit', 'delete'],
            'review'                => ['edit', 'delete'],
            'booking'               => ['delete'],
        ]
    ]
];
