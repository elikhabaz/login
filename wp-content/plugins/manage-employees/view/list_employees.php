<?php
defined('ABSPATH') || exit;
//employee
// global $wpdb;
// $table_name = $wpdb->prefix . 'employees';
// $var=$wpdb->get_var(
//     "SELECT first_name FROM $table_name WHERE ID = 1"
// );
// var_dump($var);
// global $wpdb;
// $table_name = $wpdb->prefix . 'employees';
// $var=$wpdb->get_row(
//     "SELECT * FROM $table_name WHERE ID = 1"
// );
//var_dump($var);
// global $wpdb;
// $table_name = $wpdb->prefix . 'employees';
// $var=$wpdb->get_col(
//     "SELECT first_name FROM $table_name"
// );
// var_dump($var);
?>
<table class="widefat">
    <thead>
        <th>#</th>
        <th>نام </th>
        <th>تعداد ماموریت</th>
        <th>وزن</th>
        <th>تاریخ تولد</th>
        <th>تاریخ ثبت</th>
        <th>operations</th>
    </thead>

    <tbody>
        <?php if ($employees) : ?>
            <?php foreach ($employees as $employee) : ?>
                <tr>
                    <th scope="row"><?php echo $employee->ID; ?></th>
                    <td>
                        <a href="<?php echo admin_url('admin.php?page=employees_create&employee_id=' . $employee->ID); ?>">
                            <?php echo $employee->first_name . ' ' . $employee->last_name; ?>
                        </a>
                    </td>
                    <td><?php echo $employee->mission; ?></td>
                    <td><?php echo $employee->weight; ?></td>
                    <td><?php echo $employee->birth_date; ?></td>
                    <td><?php echo $employee->created_at; ?></td>
                    <td>
                        <button class="btn btn-warning">
                            <a href="<?php echo admin_url('admin.php?page=employees_create&employee_id='.$employee->ID); ?>">ویرایش</a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="<?php echo admin_url('admin.php?page=employees_create&employee_id='.$employee->ID); ?>">حذف</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <th colspan="7">کارمندی یافت نشد</th>
            </tr>
        <?php endif; ?>
    </tbody>
</table>