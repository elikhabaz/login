<?php
/**
 * Plugin Name: elahe first
 * Plugin URI: http://test.local/plugins/elahe-first //دیدن خانه افزونه
 * Description: this is plugin for myself //توضیحات
 * Version: 1.0.0
 * Requires as least: 5.0.1
 * Author: Tilda!__!
 */

 include("libs/notificator.php");

#adress in wordpress
// wp_die(
    // plugin_dir_path(__FILE__)
    // plugins_url('/uploads/img',__FILE__)
    // plugin_dir_url( __FILE__ )
    // content_url('/images/image')
    // admin_url('ajax.php')
    // home_url()
// );

#its better if you want get the address you're prepare define!!
// define('TEST_PLUGIN' , home_url());

function elahe_activation(){

    $myphpVersion='8.1';
    if(version_compare(PHP_VERSION , $myphpVersion , '<')){
        wp_die(
        sprintf('you have php 8.1.0')
        );
    }

    $mywordpressversion='6.4.2';
    global $wp_version;
    if(version_compare($wp_version , $mywordpressversion, '<')){
        wp_die(
            sprintf('you have wordpress 6.4.2')
        );
    }

    notificator_send_message('plugin is active'); //this is one method from notificator for telegram message

    add_option('elahe-plugin' , 'eli');//this is a option method from wordpress the first args is KEY and the second one is value 

    $path1 = plugin_dir_path(__FILE__) .'log.txt';
    file_put_contents($path1 , date('Y-m-d H:i:s').':Plugin active!'.PHP_EOL , FILE_APPEND );
}

#this is a wordpress method for deactivation
register_activation_hook(__FILE__ , 'elahe_activation');


#this is function for deactivation plugin 
function elahe_deactivation(){

    notificator_send_message('plugin is deactive');//this is one method from notificator for telegram message

    $path1 = plugin_dir_path(__FILE__) .'log.txt';
    file_put_contents($path1 , date('Y-m-d H:i:s').':Plugin deactive!'.PHP_EOL , FILE_APPEND );
}

#first solution for delete plugin by option and function
// function plugin_unistall(){
//     delete_option('elahe-plugin'); //this is a option method from wordpress it just gets the KEY from add_option
// }

#this is a wordpress method for deactivation 
// register_deactivation_hook(__FILE__ , 'elahe_deactivation'); //I commnted it cause I want use unistall.php


add_filter('show_admin_bar' , function(){
    return true;
    // return false;

});


