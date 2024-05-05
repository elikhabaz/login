<?php
    /**
     * Plugin Name: filter test
     * Description: this is for test filter and I want see some thing
     * Author: Tilda !__!
     * Version: none version
     */


function login_filter($user){

    if($user instanceof WP_User){
        if($user->ID == 1){
            return new WP_Error('invalid_login','نمیتونی واردبشی پدرسوخته');
        }
    }
    return $user;
}

add_filter('authenticate' , 'login_filter' ,999);