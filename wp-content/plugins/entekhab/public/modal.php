<?php 

#this file for login modal 
defined('ABSPATH') || exit;

add_action('wp_footer', 'entekhab_sms_login_modal');
function entekhab_sms_login_modal()
{
     if (!is_user_logged_in()) {
          include(ENTEKHAB_SMS_LOGIN_VIEW . 'sms_login_modal.php');
     }
}
