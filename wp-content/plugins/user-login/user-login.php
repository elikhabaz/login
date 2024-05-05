<?php
 /**
* Plugin Name: Custom Login
* Author: Tilda !__!
* Description: this is custom Login for user in wordpress
* Version: 1.0.0
*/

defined('ABSPATH') || exit;

define('CUSTOM_LOGIN_ASSETS_URL' , plugin_dir_url(__FILE__) . 'assets/');
define('CUSTOM_LOGIN_CSS_URL' , CUSTOM_LOGIN_ASSETS_URL . 'css/');
define('CUSTOM_LOGIN_JS_URL' , CUSTOM_LOGIN_ASSETS_URL . 'js/');
define('CUSTOM_LOGIN_IMAHES_URL' , CUSTOM_LOGIN_ASSETS_URL . 'images/');


add_action('login_enqueue_scripts' , function(){
    wp_enqueue_style(
        'custom-login-style',  CUSTOM_LOGIN_CSS_URL .'login.css' );
});

?>