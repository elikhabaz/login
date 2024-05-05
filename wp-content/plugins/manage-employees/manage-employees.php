<?php

/**
 * plugin Name: manage-employees
 * author: Tilda
 * Discription: This is for manage employees
 * version: 1.0.0
 */

defined('ABSPATH') || exit;
define('ADMIN_PATH' , plugin_dir_path(__FILE__) . 'admin/');
define('ADMIN_PATH_IMAGES' , plugin_dir_path(__FILE__) . 'assets/images/');
define('ADMIN_PATH_VIEW' , plugin_dir_path(__FILE__) . 'view/');


if(is_admin()){
    include(ADMIN_PATH . 'menus.php');
}

register_activation_hook(__FILE__ , 'dyme_activation');

function dyme_activation(){

    global $wpdb;
    $table_employee = $wpdb->prefix . 'employees';
    $table_colate = $wpdb->collate;

    $sql = "
    CREATE TABLE $table_employee (
        `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
        `first_name` varchar(50) NOT NULL,
        `last_name` varchar(50) NOT NULL,
        `birth_date` date NOT NULL,
        `avatar` varchar(250) NOT NULL,
        `weight` float NOT NULL,
        `mission` smallint(5) unsigned NOT NULL,
        `created_at` datetime NOT NULL DEFAULT current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=$table_colate COMMENT='this table about employees information'
      
    ";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

?>