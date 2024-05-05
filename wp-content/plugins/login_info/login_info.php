<?php
    /**
     * Plugin Name: login info
     * description: this is for gebug login error or login success and get message in telegram
     * Author: Tilda!__!
     * version: 5.0.2
     */
    include(plugin_dir_path(__FILE__) . 'libs/notificator.php');

    add_action('wp_login_failed' , function($username , $error){
        notificator_send_message('login_error for:' . $username . $error->get_error_message());
    }, 10,2);


    add_action('wp_login' , function($user_login , $user){
        notificator_send_message('login for:' . $user_login .PHP_EOL.'the name is:'. $user->first_name);
    }, 10,2);


    function freeFunn($user_admin,$title){
        echo $user_admin.'<hr>';
        ?>
            <h3>
                <?php
                     echo $title;
                ?>
            </h3>
        <?php
    }
    add_action('sidebar_action_2','freeFunn',10,2)

    
?>