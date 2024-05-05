<?php
/**
 * Plugin Name: banner plugin
 * Description: this is plugin for banner in site
 * Version: 1.5.0
 * Author: Tilda!__!
 */

defined('ABSPATH') || exit;
define('BANNER_IMAGE_URL' , plugin_dir_url(__FILE__).'assets/images/');


function show_banner(){
    $banner_url= BANNER_IMAGE_URL. 'funnygifsbox.com-2020-01-14-13-40-05-61.gif';
    $banner_path= 'https://www.google.com';
    
    ?>
    
    <style>
        a.style-banner{
            display: block;
            position: fixed;
            background-color: white;
            left: 10px;
            bottom: 10px;
            z-index: 9;
            border-radius: 10px;
            box-shadow:0px 5px 10px #888888;
        }
    </style>
    
        <a class="style-banner" href="<?php echo $banner_path ?>">
            <img  src="<?php echo $banner_url ?>" alt="this is image" width="200px" height="200px">
        </a>

    <?php

}
add_action('wp_footer' , 'show_banner');




?>



