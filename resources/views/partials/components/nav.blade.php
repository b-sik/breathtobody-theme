@php
$menu_args_desktop = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'd-flex justify-content-center',
    'container_id' => '',
    'menu_class' => 'navbar-nav',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];

$menu_args_mobile = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse d-lg-none',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav d-flex justify-content-center align-items-center',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];
@endphp

<nav class="navbar sticky-top navbar-expand-lg bg-info text-secondary px-0 px-lg-4 py-2">
    <div class="container-fluid justify-content-center">
        <div class="row w-100">
            <div class="col-9 col-lg-5 d-flex align-items-center">
                <img src="{!! $site_icon_url !!}" class="d-none d-lg-inline-block img-fluid rounded mr-3" style="max-width:60px;height:auto;">
                <a href="#" class="h1 brand text-primary mb-0" alt="logo">{!! $site_name !!}</a>
            </div>
            <div class="col-7 d-none d-lg-flex align-items-center justify-content-end">
                {!! wp_nav_menu($menu_args_desktop) !!}
            </div>
            <div class="col-3 d-lg-none d-lg-flex align-items-center pr-0 pr-lg-3">
                <div class="container h-100 d-flex d-lg-none align-items-center">
                    <button class="navbar-toggle btn btn-secondary ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-12 mobile-menu d-lg-none">
                {!! wp_nav_menu($menu_args_mobile) !!}
            </div>
        </div>
    </div>
</nav>
