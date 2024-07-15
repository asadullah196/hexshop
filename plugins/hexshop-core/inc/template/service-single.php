<?php get_header(); ?>
    
    <br/><br/>
    <section class="section" id="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="right-content">
                        <?php if ( is_active_sidebar( 'hexshop-sidebar-service' ) ) : ?>
                            <?php get_sidebar(); ?>
                        <?php else : ?>
                            <h3><?php echo esc_html__('No Sidebar Added','sadaka'); ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="service-item">
                        <?php if(has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_html(the_post_thumbnail_url()); ?>" alt="" class="single-blog-thumbnail">
                        <br/><br/>
                        <?php endif; ?>
                        <h4><?php the_title(); ?></h4>
                        <?php the_content( ); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>