<?php
defined('ABSPATH') || exit;

add_action('admin_menu', 'funcForMenu1');
function funcForMenu1()
{
    $menu_suffix = add_menu_page(
        'کارمندان', //title for tab
        'کارمندان', //title for menu
        'manage_options', //سطح دسترسی
        'employees', //slug
        'main_page' 
    );

    add_submenu_page(
        'employees',
        'ایجاد کارمند',
        'ایجاد کارمند',
        'manage_options',
        'employees_create', //slug
        'edit_data'
    );
}

function edit_data(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'employees';
        $employee =false;
        if(isset($_GET['employee_id'])){
            $employee_id = absint($_GET['employee_id']);
            if($employee_id){
                $employee = $wpdb->get_row(
                    "SELECT * FROM $table_name  WHERE ID=$employee_id"
                );
            }

        }
        //print_r($employee);
        include ADMIN_PATH_VIEW . 'form_employees.php';

}

function main_page() { 
    global $wpdb;
    $table_name = $wpdb->prefix . 'employees';
    $employees = $wpdb->get_results(
        "SELECT * FROM $table_name ORDER BY created_at DESC"
    );
    include ADMIN_PATH_VIEW . 'list_employees.php';
}


add_action('admin_init', 'submit_callback');
function submit_callback()
{ 
    global $pagenow;
    if ($pagenow == 'admin.php' && isset($_GET['page']) && $_GET['page'] == 'employees_create') {
        if (isset($_POST['save_employees'])) {
            $employee_id = absint($_GET['employee_id']);
            $data = [
                'first_name' => sanitize_text_field($_POST['first_name']),
                'last_name' => sanitize_text_field($_POST['last_name']),
                'birth_date' => sanitize_text_field($_POST['birth_date']),
                'avatar' => esc_url_raw($_POST['avatar']),
                'mission' => absint($_POST['mission']),
                'weight' => floatval($_POST['weight']),
            ];
           // var_dump($data);

            global $wpdb;
            $table_name = $wpdb->prefix . 'employees';

            if( $employee_id ){
                //echo 'hiii';
                $updated_rows = $wpdb->update(
                    $table_name,
                    $data,
                    ['ID'    => $employee_id,]
                );
                if($updated_rows===false){
                    //
                }else{
                    wp_redirect(admin_url('/admin.php?page=employees_create&employee_id=' .$employee_id));
                    exit();
                }
            }
            if( $employee_id ){
                $select_rows = $wpdb->select(
                    $table_name,
                    $data,
                    ['ID'    => $employee_id,]
                );
               
            }
            $data['created_at'] = current_time('mysql');

            $inserted = $wpdb->insert(
                $table_name,
                $data
            );
            if($inserted){
                wp_get_admin_notice('success');
            }
            
        }
    }
}
