<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title   = $title ?: __('Sage &rsaquo; Error', 'breathtobody');
    $footer  = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'breathtobody'), __('Invalid PHP version', 'breathtobody'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'breathtobody'), __('Invalid WordPress version', 'breathtobody'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'breathtobody'),
            __('Autoloader not found.', 'breathtobody')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(
    function ($file) use ($sage_error) {
        $file = "../app/{$file}.php";
        if (!locate_template($file, true, true)) {
            $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'breathtobody'), $file), 'File not found');
        }
    },
    array('helpers', 'setup', 'filters', 'admin')
);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    array('theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'),
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf(
        'config',
        function () {
            return new Config(
                array(
                    'assets' => require dirname(__DIR__) . '/config/assets.php',
                    'theme'  => require dirname(__DIR__) . '/config/theme.php',
                    'view'   => require dirname(__DIR__) . '/config/view.php',
                )
            );
        },
        true
    );


/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

/**
 * Fixes nav menu anchor links.
 */
function nav_menu_fix_anchor_link($items, $args)
{
    $items = explode('href="#', $items);
    $items = $items[0] . 'href="' . get_site_url() . '/#' . $items[1];

    return $items;
}

add_filter('wp_nav_menu_items', 'nav_menu_fix_anchor_link', 10, 2);

/**
 * Disable Gutenberg everywhere except Gallery.
 */
function enable_block_editor_for_gallery($use_block_editor, $post)
{
    $gallery = get_page_by_title('Gallery');
    if ($gallery->ID === $post->ID) {
        return true;
    }
    return false;
}

add_filter('use_block_editor_for_post', 'enable_block_editor_for_gallery', 10, 2);

/**
 * Allow only Gallery block.
 */
function allowed_block_types($block_editor_context, $editor_context)
{
    if (!empty($editor_context->post)) {
        return array(
            'core/gallery',
        );
    }
    return $block_editor_context;
}

add_filter('allowed_block_types_all', 'allowed_block_types', 10, 2);


function remove_editor_from_pages()
{
    remove_post_type_support('page', 'editor');
}
add_action('init', 'remove_editor_from_pages');
