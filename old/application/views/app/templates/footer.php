        <footer class="row">
        </footer>
        

        <?php if ((ENVIRONMENT == 'local') || (ENVIRONMENT == 'development')) { ?>
            <script src="<?php print_r(base_url()) ?>assets/app/js/vendor/jquery-1.12.0.min.js"></script>
            <script src="<?php print_r(base_url()) ?>assets/app/css/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="<?php print_r(base_url()) ?>assets/app/js/vendor/slick.min.js"></script>
            <script src="<?php print_r(base_url()) ?>assets/app/js/vendor/imagesloaded.pkgd.min.js"></script>
            <script src="<?php print_r(base_url()) ?>assets/app/js/vendor/isotope.pkgd.min.js"></script>
            <script src="<?php print_r(base_url()) ?>assets/app/js/vendor/jquery.swipebox.min.js"></script>

            <script src="<?php get_asset_no_cache('assets/app/js/plugins.js') ?>"></script>
            <script src="<?php get_asset_no_cache('assets/app/js/main.js') ?>"></script>
        
        <?php } else { 

            echo '<script type="text/javascript" defer="defer">';
            $js_en_linea = get_asset_string('assets/app/dist-js/scripts-bottom-build.min.js', $this->config->item('base_url'));
            print_r($js_en_linea); 
            echo '</script>';
        } ?>
        

    </body>
</html>