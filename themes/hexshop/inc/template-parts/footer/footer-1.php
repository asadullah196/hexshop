<?php

    // Fetching kirki value
    $social_switch = get_theme_mod('hexshop_social_switch', true);
    $facebook_switch = get_theme_mod('hexshop_facebook_switch', true);
    $facebook_url = get_theme_mod('hexshop_facebook_url', '#');
    $x_switch = get_theme_mod('hexshop_x_switch', true);
    $x_url = get_theme_mod('hexshop_x_url', '#');
    $instagram_switch = get_theme_mod('hexshop_instagram_switch', true);
    $instagram_url = get_theme_mod('hexshop_instagram_url', '#');
    $linkedin_switch = get_theme_mod('hexshop_linkedin_switch', true);
    $linkedin_url = get_theme_mod('hexshop_linkedin_url', '#');
    $youtube_switch = get_theme_mod('hexshop_youtube_switch', true);
    $youtube_url = get_theme_mod('hexshop_youtube_url', '');
    $pinterest_switch = get_theme_mod('hexshop_pinterest_switch', true);
    $pinterest_url = get_theme_mod('hexshop_pinterest_url', '');
    $other_switch = get_theme_mod('hexshop_other_switch', true);
    $other_url = get_theme_mod('hexshop_others_url', '');

?>

<!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                
                <?php if(is_active_sidebar('footer-1') or is_active_sidebar('footer-2') or is_active_sidebar('footer-3') or is_active_sidebar('footer-4')) : ?>
                <div class="col-lg-3">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
                <div class="col-lg-3">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                <div class="col-lg-3">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
                <div class="col-lg-3">
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                </div>
                <?php endif; ?>

                <div class="col-lg-12">
                    <div class="under-footer">
                        <!-- Calling from template functions -->
                        <?php hexshop_copyright(); ?>
                        <?php if ('true' == $social_switch) : ?>
                        <ul>
                            <?php if ('true' == $facebook_switch) : ?>
                            <li><a href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $x_switch) : ?>
                            <li><a href="<?php echo esc_url($x_url); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $instagram_switch) : ?>
                            <li><a href="<?php echo esc_url($instagram_url); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $linkedin_switch) : ?>
                            <li><a href="<?php echo esc_url($linkedin_url); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $youtube_switch) : ?>
                            <li><a href="<?php echo esc_url($youtube_url); ?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $pinterest_switch) : ?>
                            <li><a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if ('true' == $other_switch) : ?>
                            <li><a href="<?php echo esc_url($other_url); ?>"><i class="fa fa-external-link-square" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- ***** Footer Ends ***** -->