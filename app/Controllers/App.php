<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    /**
     * ACF Content field.
     * @param array|bool
     */
    public $content;

    /**
     * ACF Content with image field.
     * @param array|bool
     */
    public $content_with_image;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->content = $this->fields['content'];
        $this->content_with_image = $this->fields['content_with_image'];
    }

    /**
     * Site name.
     */
    public function site_name()
    {
        return get_bloginfo('name');
    }

    /**
     * Tagline.
     */
    public function tagline()
    {
        return get_bloginfo('description');
    }

    public function frontpage_id()
    {
        return get_option('page_on_front');
    }

    /**
     * Page or post title.
     */
    public function title()
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

    /**
     * Hero image url, set on the home page.
     */
    public function hero_image_url()
    {
        if (function_exists('get_field')) {
            return get_field('hero_image', $this->frontpage_id);
        }
    }

    /**
     * Site icon image url.
     */
    public function site_icon_url()
    {
        return get_site_icon_url();
    }

    /**
     * All ACF fields.
     */
    public function fields()
    {
        return get_fields();
    }

    /**
     * ACF Content field.
     */
    public function content()
    {
        $fields = get_fields();
        return $fields['content'];
    }

    /**
     * ACF Content With Image field.
     */
    public function content_with_image_right()
    {
        $fields = get_fields();
        return $fields['content_with_image_right'];
    }

    /**
     * ACF Content With Image field.
     */
    public function content_with_image_left()
    {
        $fields = get_fields();
        return $fields['content_with_image_left'];
    }

    /**
     * About page content.
     */
    public function about_page_content()
    {
        $id = get_page_by_title('About');
        return get_fields($id);
    }

    /**
     * About page featured image.
     */
    public function about_page_image()
    {
        $id = get_page_by_title('About');
        return get_the_post_thumbnail($id, 'medium', array('class' => 'img-fluid rounded'));
    }
}
