
<h1>افزونه برای تزریق استایل سفارشی</h1>

<?php
    if($notice):
?>
<div class="notice notice-<?php echo $notice['type']; ?>">
        <p><?php echo $notice['message']; ?> </p>
</div>
<?php
    endif;
?>

<form action="" method="POST">
        <table class="form-table">
                <tbody>
                        <tr>
                                <th scope="row">
                                        <label for="custom-style">اضافه کردن استایل</label>
                                </th>
                                <td>
                                <textarea name="custom-style" rows="10" cols="50" id="custom-style" class="large-text code" placeholder="pls enter your custom style..."> <?php echo $customstyle ?>
                                    </textarea> 
                                </td>
                        </tr>

                        <tr>
                                <th scope="row">
                                        <label for="custom-script">اضافه کردن اسکریپت</label>
                                </th>
                                <td>
                                <textarea name="custom-script" rows="10" cols="50" id="custom-script" class="large-text code" placeholder="pls enter your custom script..."> <?php  echo $customscript ?>
                                </textarea>
                                </td>
                        </tr>

                </tbody>
        </table>

        <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="ذخیرهٔ تغییرات">
        </p>

</form>

