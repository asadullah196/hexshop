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
                        
                        <!--
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Men's</a></li>
                            <li class="scroll-to-section"><a href="#women">Women's</a></li>
                            <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="products.html">Products</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#explore">Explore</a></li>
                        </ul> 
                        -->       
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