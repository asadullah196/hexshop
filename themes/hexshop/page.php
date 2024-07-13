<?php get_header(); ?>
    
    <br/><br/>
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
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