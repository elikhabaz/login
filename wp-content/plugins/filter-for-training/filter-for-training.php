<?php
    /**
     * Plugin Name: filter for training
     * version: 7.0.1
     * Description: this is just for training
     * author: Tilda !__!
     */

     //this is for show or hide admin bar
     add_filter('show_admin_bar' , function(){
        return true;
        // return false;
    });
    
    //this is for add a text to tab name if you want
    add_filter('wp_title' , function($wp_title){
    
        $wp_title = 'بلاگ'.' '. $wp_title;
        return $wp_title;
    });

    //this is a filter for change some words in content and title
    function replace_content($text){
        $content= str_replace('هکرها', 'هکر های محبوب' , $text);
        return $content;
    }
    add_filter('the_content' , 'replace_content');
    add_filter('the_title' , 'replace_content');

    



?>