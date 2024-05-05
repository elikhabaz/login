<?php
defined('ABSPATH') || exit;
global $title;

$ID = 0;
$first_name= '';
$last_name= '';
$mission = 0;
$weight = 0;
$birth_date = '';
$avatar ='';   

if($employee){
    $ID = $employee->ID;
    $first_name= $employee->first_name;
    $last_name= $employee->last_name;
    $mission = $employee->mission;
    $weight = $employee->weight;
    $birth_date =$employee->birth_date;
    $avatar =$employee->avatar;
}
 
?>
 
<h1><?php echo $title; ?></h1>
  
<form action="" method="POST">   
    <table class="form-table">
        <tbody>  
            <tr>
                <th scope="row">
                    <label for="first_name">نام  </label>
                </th>
                <td>
                    <input type="text" name="first_name"  id="first_name" value="<?php echo $employee->first_name; ?>">    
                </td> 
            </tr>
            <tr>
                <th scope="row">
                    <label for="last_name">نام خانوادگی  </label>  
                </th>
                <td>
                    <input type="text" name="last_name"  id="last_name" value="<?php echo $employee->last_name; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="mission"> تعداد ماموریت </label>
                </th>
                <td>
                    <input type="number" name="mission"  id="mission" value="<?php echo $employee->mission; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="weight"> وزن  </label>
                </th>
                <td>
                    <input type="number" name="weight" step="0.1" id="weight" value="<?php echo  $employee->weight; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="birth_date"> تاریخ تولد  </label>
                </th>
                <td>
                    <input type="date" name="birth_date"  id="birth_date" value="<?php echo $employee->birth_date; ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="avatar"> تصویر   </label>
                </th>
                <td>
                    <input type="url" name="avatar"  id="avatar" value="<?php echo $employee->avatar; ?>">
                    <button type="button" id="employee_avatar_select">انتخاب عکس</button>
                </td>
            </tr>

        </tbody>
    </table>

    <p class="submit">
        <input type="hidden" name="ID" value="<?php echo esc_attr($ID); ?>">
        <button class="button button-primary" name="save_employees">
        <?php 
            if(isset($employee)){
                echo 'ویرایش';
            }else{
                echo 'ثبت';
            }
        ?>
        </button>
    </p>

</form>