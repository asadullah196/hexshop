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
                            <?php if(has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_html(the_post_thumbnail_url()); ?>" alt="">
                            <br/><br/>
                            <?php endif; ?>
                            <h4><a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a></h4>
                            <p>
                                <?php 
                                    $post_content = get_the_content();
                                    $word_limit = !empty($blog_archive_description) ? $blog_archive_description : 20;
                                    $trimmed_content = wp_trim_words($post_content, $word_limit);
                                    echo $trimmed_content;
                                ?>
                            </p>
                            <a href="<?php the_permalink( ); ?>">Read Full Blog</a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>