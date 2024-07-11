<?php
/**
 * The footer of the Hexshop theme.
 *
 * This file serves as the footer template for Hexshop WordPress theme.
 * It contains the opening HTML document structure, <footer> section, and
 * the ending of the <body> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hexshop
 * @since 1.0.0
 */
?>

    <?php hexshop_footer_parts(); ?>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

    <?php wp_footer(); ?>
</body>

</html>