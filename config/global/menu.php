<?php

return array(

    // Main menu
    'main'          => array(
        //// Dashboard
        array(
            'title' => 'Dashboard',
            'path'  => '',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span>',
        ),

        // Account
        // array(
        //     'title'      => 'Account',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-person fs-2"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'  => 'Overview',
        //                 'path'   => 'account/overview',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'Settings',
        //                 'path'   => 'account/settings',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'      => 'Security',
        //                 'path'       => '#',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //                 'attributes' => array(
        //                     'link' => array(
        //                         "title"             => "Coming soon",
        //                         "data-bs-toggle"    => "tooltip",
        //                         "data-bs-trigger"   => "hover",
        //                         "data-bs-dismiss"   => "click",
        //                         "data-bs-placement" => "right",
        //                     ),
        //                 ),
        //             ),
        //         ),
        //     ),
        // ),

        // System
        // array(
        //     'title'      => 'System',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-layers fs-3"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'      => 'Settings',
        //                 'path'       => '#',
        //                 'bullet'     => '<span class="bullet bullet-dot"></span>',
        //                 'attributes' => array(
        //                     'link' => array(
        //                         "title"             => "Coming soon",
        //                         "data-bs-toggle"    => "tooltip",
        //                         "data-bs-trigger"   => "hover",
        //                         "data-bs-dismiss"   => "click",
        //                         "data-bs-placement" => "right",
        //                     ),
        //                 ),
        //             ),
        //             array(
        //                 'title'  => 'Audit Log',
        //                 'path'   => 'log/audit',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'System Log',
        //                 'path'   => 'log/system',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),
        //     ),
        // ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
        ),
    ),

    // Horizontal menu
    'horizontal'    => array(
        // Backlink
        array(
            'title'   => 'Dashboard',
            'path'    => '',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Users
        array(
            'title'   => 'Users',
            'path'    => 'users',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Users
        array(
            'title'   => 'Roles',
            'path'    => 'roles',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // CMS Domain
        array(
            'title'      => 'CMS Domain',
            'path'    => 'domains',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Backlink
        array(
            'title'      => 'Backlinks',
            'path'    => 'backlinks',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Groups
        array(
            'title'      => 'Groups',
            'path'    => 'groups',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Google Analytics
        // array(
        //     'title'      => 'Google analytics',
        //     'path'    => 'googleAnalytics',
        //     'classes' => array('item' => 'me-lg-1'),
        // ),

        // Google 
        //  array(
        //     'title'      => 'Google console',
        //     'path'    => 'googleSearchConsole',
        //     'classes' => array('item' => 'me-lg-1'),
        // ),
    ),
);
