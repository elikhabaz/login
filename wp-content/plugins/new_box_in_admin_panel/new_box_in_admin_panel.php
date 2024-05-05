<?php
/**
 * Plugin Name: new field in admin menu
 * author: Tilda!__!
 * version: 8.0.0
 * description: this is just for set a field for training
 */
defined('ABSPATH') || exit;
define('PLUGIN_FOR_CHANGE_STYLE', plugin_dir_path(__FILE__) .'admin/');
define('CONTENT_ADDRESS_FOR_TEXT', plugin_dir_path(__FILE__) .'view/');
define('IMAGE_ADDRESS_FOR_PIC', plugin_dir_url(__FILE__) .'assets/images/');

if( is_admin() ){
    include( PLUGIN_FOR_CHANGE_STYLE . 'menus.php');
}else{
    add_action('wp_head', function(){
        $style_save = get_option('box-custom-style' , '');
        printf('<style>%s</style>' , $style_save);
    } , 999);

    add_action('wp_footer', function(){
        $script_save = get_option('box-custom-script' , '');
        printf('<script>%s</script>' , $script_save);
    } , 999);
}

?>