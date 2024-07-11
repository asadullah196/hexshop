<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * This template is used to display a custom error message when a user
 * tries to access a page that does not exist. It provides suggestions
 * for navigation or search to help the user find what they are looking for.
 *
 * WordPress will automatically use this template for any 404 error.
 *
 * @link https://developer.wordpress.org/themes/functionality/404-pages/
 *
 * @package hexshop
 * @since 1.0.0
 */

    get_header();

    $error_page_image = get_theme_mod('hexshop_404_image', get_template_directory_uri() . '/assets/images/404.png');
    $error_page_heading = get_theme_mod('hexshop_404_heading','Whoops! This Page got Lost in conversation!');
    $error_page_btn_text = get_theme_mod('hexshop_404_button_text','Back to Home');
    $error_page_btn_url = get_theme_mod('hexshop_404_button_url', '#');
?>

<main>

    <!-- Error area start here -->
    <section class="error-area pt-120 pb-120">
        <div class="container">
            <div class="error__item">
                <?php if(!empty($error_page_image)) : ?>
                    <div class="image mb-60">
                        <img src="<?php echo esc_url($error_page_image); ?>" alt="image">
                    </div>
                <?php endif; ?>
                <h2><?php echo esc_html__($error_page_heading,'hexshop'); ?></h2>
                <div class="btn-two mt-50">
                    <span class="btn-circle">
                    </span>
                    <a href="<?php echo esc_url($error_page_btn_url); ?>" class="btn-inner">
                        <span class="btn-text"><?php echo esc_html__($error_page_btn_text, 'hexshop'); ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Error area end here -->
</main>

<?php get_footer(); ?>