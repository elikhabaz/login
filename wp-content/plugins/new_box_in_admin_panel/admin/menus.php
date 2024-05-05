<?php
defined('ABSPATH') || exit;


function funcForMenu_add_metabox(){
    $notice= false;
       
       if(isset($_POST['custom-style'])){
           
           $style= trim($_POST['custom-style']);
           $script= trim($_POST['custom-script']);
           
           $style_save=update_option('box-custom-style' , $style); //this is option name you can se in phpmyadmin wp-option
           $script_save=update_option('box-custom-script' , $script);
   
          if($style_save && $script_save){
           $notice=[
               'type'=>'success',
               'message'=>'تغییرات ذخیره شد'
           ];
          }else{
           $notice=[
               'type'=>'error',
               'message'=>'تغییرات ذخیره نشد'
           ];
          }
   
       }
       $customstyle=get_option('box-custom-style' ,'');
       $customscript=get_option('box-custom-script' ,'');

       include(CONTENT_ADDRESS_FOR_TEXT . 'body_for_plugin_page.php');
   }
   
   function funcForMenu(){
       $menu_suffix= add_menu_page(
           'custom style', //title for tab
           'js/css سفارشی',//title for menu
           'manage_options',//سطح دسترسی
           'box-custom-style', //slug
           'funcForMenu_add_metabox',//callback[on the top]   
           
            IMAGE_ADDRESS_FOR_PIC.'star.png',//image address
            65//priority for my menu in wordpress menu
   
       );
   
       add_submenu_page( 
           'box-in-admin-panel',
           'زیر منو سفارشی',
           'زیرمنو سفارشی',
           'manage_options',
           'amazing-submenu',//slug
           function(){
               include(CONTENT_ADDRESS_FOR_TEXT.'body_for_submenu.php');
           }      
       );
       add_submenu_page( 
           'edit.php?post_type=page',
           'زیر منو سفارشی',
           'زیرمنو سفارشی',
           'manage_options',
           'amazing-submenu',//slug
           function(){
               include(CONTENT_ADDRESS_FOR_TEXT.'body_for_submenu.php');
           }      
       );
   
   
   }
   
   
   add_action('admin_menu' , 'funcForMenu');
   
   
   
   //اضافه کردن منو به هدر ادمین بار وردپرس
   
   function show_header_menu($wp_admin_bar){
   
       $wp_admin_bar->add_menu([
           'parent'=>'new-content',
           'title'=>'زیرمنو سفارشی',
           'href'=>admin_url('admin.php?page=amazing-submenu'),
       ]);
   
       $wp_admin_bar->add_menu([
           'title'=>'زیرمنو سفارشی',
           'href'=>admin_url('admin.php?page=amazing-submenu'),
       ]);
   
       
   }
   add_action('admin_bar_menu','show_header_menu',99);

?>