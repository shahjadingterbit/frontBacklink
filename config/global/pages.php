<?php
return array(
    '' => array(
        'title'       => 'Dashboard',
        'description' => '',
        'view'        => 'index',
        'layout'      => array(
            'page-title' => array(
                'description' => true,
                'breadcrumb'  => false,
            ),
        ),
        'assets'      => array(
            'custom' => array(
                'js' => array(),
            ),
        ),
    ),



    'locations'  => array(
        'title' => 'Location List',
        '*' => array(
            'title' => 'List Location',
            'path'  => '/locations/create',
            'buttonName' => 'Create Location',
            'create' => array(
                'title' => 'Create Location',
                'path'  => '/location',
                'buttonName' => 'List Location',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/location-details.js',
                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Location',
                'path'  => '/locations',
                'buttonName' => 'List Location',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/location-details.js',
                        ),
                    ),
                ),
            ),
        ),
        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),

    'googleAnalytics'  => array(
        'title' => 'Google Analytics List',
        '*' => array(
            'title' => 'List',
            'buttonName' => '',
            'domainUrl' => 'domainUrl',
        ),
        'assets' => array(
            'custom' => array(
                'css' => array(),
                'js'  => array(
                    'js/custom/admin/google-analytics.js',
                ),
            ),
        ),
    ),

    'googleSearchConsole'  => array(
        'title' => 'Google Search Console',
        '*' => array(
            'title' => 'List',
            'buttonName' => '',
            'domainUrl' => 'domainUrl',
        ),
        'assets' => array(
            'custom' => array(
                'css' => array(),
                'js'  => array(
                    'js/custom/admin/google-searchConsole.js',
                ),
            ),
        ),
    ),



    'roles'  => array(
        'title' => 'Role List',
        '*' => array(
            'title' => 'List Role',
            'path'  => '/roles/create',
            'buttonName' => 'Create Role',
            'create' => array(
                'title' => 'Create Role',
                'path'  => '/roles',
                'buttonName' => 'List Role',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/role-details.js',
                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Roles',
                'path'  => '/roles',
                'buttonName' => 'List Role',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/role-details.js',
                        ),
                    ),
                ),
            ),
        ),

        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),



    'permissions'  => array(
        'title' => 'Permission List',
        '*' => array(
            'title' => 'List Permission',
            'path'  => '/permissions/create',
            'buttonName' => 'Create Permission',
            'create' => array(
                'title' => 'Create Permission',
                'path'  => '/permissions',
                'buttonName' => 'List Permission',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/permission-details.js',
                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Permission',
                'path'  => '/permissions',
                'buttonName' => 'List Permission',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/permission-details.js',
                        ),
                    ),
                ),
            ),
        ),

        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),

    'groups'  => array(
        'title' => 'Groups List',
        '*' => array(
            'title' => 'Groups List',
            'path'  => '/groups/create',
            'buttonName' => 'Create Group',
            'create' => array(
                'title' => 'Create Groups',
                'path'  => '/groups',
                'buttonName' => 'Groups List',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/groups-details.js',
                            'js/custom/admin/jquery.repeater.js',
                            'js/custom/admin/form-repeater.js',

                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Groups',
                'path'  => '/groups',
                'buttonName' => 'List Groups',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/groups-details.js',
                            'js/custom/admin/jquery.repeater.js',
                            'js/custom/admin/form-repeater.js',

                        ),
                    ),
                ),
            ),
            'backlinks' => array(
                'title' => 'Group Backlinks',
                'path'  => '/groups/backlinks/assign',
                'buttonName' => '',
            ),
        ),

        'assets' => array(
            'custom' => array(
                'css' => array(
                    'plugins/custom/datatables/datatables.bundle.css',
                ),
                'js'  => array(
                    'plugins/custom/datatables/datatables.bundle.js',
                ),
            ),
        ),
    ),

    'backlinks'  => array(
        'title' => 'Backlink List',
        '*' => array(
            'title' => 'Backlink List',
            'path'  => '/backlinks/create',
            'buttonName' => 'Create Backlink',
            'create' => array(
                'title' => 'Create Backlink',
                'path'  => '/backlinks',
                'buttonName' => 'Backlink List',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/backlink-details.js',
                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Backlinks',
                'path'  => '/backlinks',
                'buttonName' => 'List Backlinks',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/backlink-details.js',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'users'  => array(
        'title' => 'User List',
        '*' => array(
            'title' => 'List Users',
            'path'  => '/users/create',
            'buttonName' => 'Create Users',
            'create' => array(
                'title' => 'Create User',
                'path'  => '/users',
                'buttonName' => 'List Users',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/profile-details.js',

                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit User',
                'path'  => '/users',
                'buttonName' => 'List Users',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/profile-edit-details.js',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'roles'  => array(
        'title' => 'Role List',
        '*' => array(
            'title' => 'List Role',
            'path'  => '/roles/create',
            'buttonName' => 'Create Role',
            'create' => array(
                'title' => 'Create Role',
                'path'  => '/roles',
                'buttonName' => 'List Role',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/role-details.js',
                        ),
                    ),
                ),
            ),
            'edit' => array(
                'title' => 'Edit Role',
                'path'  => '/roles',
                'buttonName' => 'List Role',
                'assets' => array(
                    'custom' => array(
                        'js'  => array(
                            'js/custom/admin/role-details.js',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'login'           => array(
        'title'  => 'Login',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-in/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'register'        => array(
        'title'  => 'Register',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/sign-up/general.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),
    'forgot-password' => array(
        'title'  => 'Forgot Password',
        'assets' => array(
            'custom' => array(
                'js' => array(
                    'js/custom/authentication/password-reset/password-reset.js',
                ),
            ),
        ),
        'layout' => array(
            'main' => array(
                'type' => 'blank', // Set blank layout
                'body' => array(
                    'class' => theme()->isDarkMode() ? '' : 'bg-body',
                ),
            ),
        ),
    ),

    'log' => array(
        'audit'  => array(
            'title'  => 'Audit Log',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
        'system' => array(
            'title'  => 'System Log',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js'  => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
        ),
    ),

    'account' => array(
        'overview' => array(
            'title'  => 'Account Overview',
            'view'   => 'account/overview/overview',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/widgets.js',
                    ),
                ),
            ),
        ),

        // 'settings' => array(
        //     'title'  => 'Account Settings',
        //     'assets' => array(
        //         'custom' => array(
        //             'js' => array(
        //                 'js/custom/account/settings/profile-details.js',
        //                 'js/custom/account/settings/signin-methods.js',
        //                 'js/custom/modals/two-factor-authentication.js',
        //             ),
        //         ),
        //     ),
        // ),
    ),
);
