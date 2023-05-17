<?php

return [
    'admin' => [
        [
            'name' => 'Dashboard',
            'icon' => 'fa fa-home',
            'link' => 'dashboard',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Room',
            'icon' => 'fa fa-bed',
            'link' => 'room',
            'params' => [],
            'child' => []
        ],
        // [
        //     'name' => 'News',
        //     'icon' => 'fa fa-newspaper-o',
        //     'link' => '',
        //     'params' => [],
        //     'child' => [
        //         [
        //             'name' => 'Category',
        //             'icon' => 'fa fa-circle-o',
        //             'link' => 'cateNews',
        //             'params' => [],
        //             'child' => []
        //         ],
        //         [
        //             'name' => 'News',
        //             'icon' => 'fa fa-circle-o',
        //             'link' => 'article',
        //             'params' => [],
        //             'child' => []
        //         ],
        //     ],
        //     'arr_controller' => ['catenews', 'article']
        // ],
        [
            'name' => 'Slider',
            'icon' => 'fa fa-sliders',
            'link' => 'slider',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Facility',
            'icon' => 'fa fa-sliders',
            'link' => 'facility',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Benefit',
            'icon' => 'fa fa-sliders',
            'link' => 'benefit',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Convenience',
            'icon' => 'fa fa-newspaper-o',
            'link' => '',
            'params' => [],
            'child' => [
                [
                    'name' => 'Category',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'cateConvenience',
                    'params' => [],
                    'child' => []
                ],
                [
                    'name' => 'Convenience',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'convenience',
                    'params' => [],
                    'child' => []
                ],
            ],
            'arr_controller' => ['cateConvenience', 'convenience']
        ],
        [
            'name' => 'Images',
            'icon' => 'fa fa-folder-o',
            'link' => 'media',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Review',
            'icon' => 'fa fa-comments-o',
            'link' => 'review',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Contact',
            'icon' => 'fa fa-cloud',
            'link' => 'contact',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Booking',
            'icon' => 'fa fa-cloud',
            'link' => 'booking',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Change password',
            'icon' => 'fa fa-refresh',
            'link' => 'user/change-password',
            'params' => [],
            'child' => []
        ],
        [
            'name' => 'Settings',
            'icon' => 'fa fa-gears',
            'link' => '',
            'params' => [],
            'child' => [
                [
                    'name' => 'Info',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'settings/form',
                    'params' => ['key_value' => 'setting-main'],
                    'child' => []
                ],
                [
                    'name' => 'Email',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'settings/form',
                    'params' => ['key_value' => 'setting-email'],
                    'child' => []
                ],
                [
                    'name' => 'Social',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'settings/form',
                    'params' => ['key_value' => 'setting-social'],
                    'child' => []
                ],
                [
                    'name' => 'Script',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'settings/form',
                    'params' => ['key_value' => 'setting-script'],
                    'child' => []
                ],
                // [
                //     'name' => 'Chat',
                //     'icon' => 'fa fa-circle-o',
                //     'link' => 'settings/form',
                //     'params' => ['key_value' => 'setting-chat'],
                //     'child' => []
                // ],
                [
                    'name' => 'SEO',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'settings/form',
                    'params' => ['key_value' => 'setting-seo'],
                    'child' => []
                ],
            ],
            'arr_controller' => ['settings']
        ],
    ],
    'dev' => [
        [
            'name' => 'Users',
            'icon' => 'fa fa-user',
            'link' => 'user',
            'params' => [],
            'child' => []
        ],
    ],
    'editor' => [
        [
            'name' => 'News',
            'icon' => 'fa fa-newspaper-o',
            'link' => '',
            'params' => [],
            'child' => [
                [
                    'name' => 'Category',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'cateNews',
                    'params' => [],
                    'child' => []
                ],
                [
                    'name' => 'News',
                    'icon' => 'fa fa-circle-o',
                    'link' => 'article',
                    'params' => [],
                    'child' => []
                ],
            ],
            'arr_controller' => ['catenews', 'article']
        ]
    ]
];