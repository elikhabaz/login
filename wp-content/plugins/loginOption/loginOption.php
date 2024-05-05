<?php
    /**
     * Plugin name: loginOption
     * Author: tilda !__!
     * Plugin Version: 5.2.0
     */

     #add a field for login form
     function OptionForm(){
        ?>
            <p>
				<label for="optionform">Optional</label>
				<input type="text" name="log" id="optionform" class="input" value="" size="20"  />
			</p>
        <?php
     }

     add_action('login_form','OptionForm',3);
     add_action('comment_form','OptionForm',1);

     
?>