<?php
/**
 * Plugin Name: change menu position in wordpress dashboard
 * author: Tilda !--!
 */

function search($slug){
    global $menu;
    foreach($menu as $position=>$menu_item){
        if($menu_item[2] == $slug){
            return $position;
        }
    }
    return false;
}


function change_proccess(){
    global $menu;
    $commentpos = search('edit-comments.php');
    $postpos = search('edit.php');

    if($commentpos === FALSE || $postpos === FALSE){
        return;
    }
    
    $commentBackup = $menu[$commentpos];
    $menu[$commentpos] = $menu[$postpos];
    $menu[$postpos] = $commentBackup;

}

    add_action('admin_menu' , 'change_proccess',999);

?>