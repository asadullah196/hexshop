<?php
/**
 * The main template file for hexshop theme.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hexshop
 * @since 1.0.0
 */

    // Exit if accessed directly.
    defined( 'ABSPATH' ) || exit;
?>

<?php get_header(); ?>
    <?php wp_body_open(); ?>
    <!-- Calling from template functions -->
    <?php // hexshop_blog_archive(); ?>
<?php get_footer(); ?>