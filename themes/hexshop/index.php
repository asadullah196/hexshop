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

    <br/><br/>
    <section class="our-services">
        <div class="container">
            <div class="row">
                <?php if ( have_posts() ) : ?>
                    <?php while( have_posts()  ) : the_post(); ?>
                    <div class="col-lg-4"><br/>
                        <div class="service-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/service-01.jpg" alt="">
                            <br/><br/>
                            <h4>Synther Vaporware</h4>
                            <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                            <a href="#">Read Full Blog</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>