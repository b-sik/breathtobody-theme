<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function site_name()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'breathtobody');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'breathtobody'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'breathtobody');
        }
        return get_the_title();
    }

    public function hero_image_url()
    {
        $frontpage_id = get_option('page_on_front');
        return get_field('hero_image', $frontpage_id);
    }

    public function site_icon_url() {
        return get_site_icon_url();
    }
}
