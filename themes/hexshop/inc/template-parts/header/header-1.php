    <!-- ***** Preloader Start ***** -- unlocked preloader while submit the file
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
     ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                    
                        <!-- ***** Logo Start ***** -->
                        <?php hexshop_header_logo(); ?>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <!-- Calling from template functions file -->
                        <?php
                            if(has_nav_menu('primary-menu')) {
                                hexshop_primary_menus();
                            } else { ?>
                                <ul class="nav">
                                    <p><?php echo esc_html__('Sorry, the menu is not set yet!', 'hexshop'); ?></p>
                                </ul>
                            <?php
                            }
                        ?>
                        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Breadcrumb calling -->
    <?php hexshop_breadcrumb(); ?>