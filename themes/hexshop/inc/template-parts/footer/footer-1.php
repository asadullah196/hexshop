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
                        <?php hexshop_copyright(); ?>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!-- ***** Footer Ends ***** -->