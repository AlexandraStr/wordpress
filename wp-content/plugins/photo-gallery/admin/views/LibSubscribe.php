<?php $admin_data = wp_get_current_user();

$user_first_name = get_user_meta($admin_data->ID, "first_name", true);
$user_last_name = get_user_meta($admin_data->ID, "last_name", true);

$name = $user_first_name || $user_last_name ? $user_first_name . " " . $user_last_name : $admin_data->data->user_login;
?>
<script>
    jQuery(document).on("ready", function () {
        jQuery("#tenweb_subscribe_submit").on("click", function () {
            var error = 0;
            var inputs = {
                "user_name" : "<?php _e("Name is required.", BWG()->prefix); ?>",
                "user_email" : "<?php _e("Please enter a valid email.", BWG()->prefix); ?>"
            };
            for (var i in inputs) {
                var input =  jQuery("#<?php echo BWG()->prefix; ?>_" + i);
                if (input.val() == "" || (i == "user_email" && !tenWebSubscrineIsEmail(input.val()))) {
                    input.closest("p").addClass("error");
                    input.closest("p").find(".error_msg").html(inputs[i]);
                    error++;
                }
                else {
                    input.closest("p").removeClass("error");
                    input.closest("p").find(".error_msg").html("");
                }
            }
            if (error == 0 ) {
                jQuery(this).closest("form").submit();
            } else {
                return false;
            }
        });
    });
    function tenWebSubscrineIsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
</script>
<div id="tenweb_new_subscribe" class="tenweb_subscribe">
    <div class="tenweb_subscribe_container">
        <div class="tenweb_subscribe_content">
            <a id="tenweb_logo"></a>
            <h1 id="tenweb_title"><?php _e( "Get Free Ebook for Creating an Beautiful Gallery in 5 Minutes", BWG()->prefix ); ?></h1>
            <p id="tenweb_description"><?php _e( "Your gallery will look beautiful, load fast <br>and attract visitors.", BWG()->prefix ); ?></p>
            <div id="tablet_book">
                <img src="<?php echo BWG()->plugin_url; ?>/images/subscribe/book_768.png">
            </div>
            <form id="tenweb_form" method="get" action="admin.php?page=<?php echo BWG()->prefix; ?>_subscribe">
                <p>
                    <label for="user_name"><?php _e( "NAME", BWG()->prefix ); ?> <span>*</span></label>
                    <input type="text" name="<?php echo BWG()->prefix; ?>_user_name"  id="<?php echo BWG()->prefix; ?>_user_name" placeholder="Fill Your Name" value="<?php echo $name; ?>">
                    <span class='error_msg'></span>
                </p>
                <p>
                    <label for="user_name"><?php _e( "EMAIL ADDRESS", BWG()->prefix ); ?> <span>*</span></label>
                    <input type="text" name="<?php echo BWG()->prefix; ?>_user_email"  id="<?php echo BWG()->prefix; ?>_user_email" placeholder="Fill Your Email" value="<?php echo $admin_data->data->user_email; ?>">
                    <span class='error_msg'></span>
                </p>
                <div class="form_desc"><?php _e( "Submitting this form you agree that 10Web stores your name, email, and site URL. We won’t share your info with third parties. We are GDPR compliant.", BWG()->prefix ); ?></div>
                <div id="form_buttons">
                    <input type="hidden" name="<?php echo BWG()->prefix; ?>_sub_action" value="allow">
                    <input type="button" id="tenweb_subscribe_submit" value="RECEIVE EBOOK">
                    <a href="<?php echo "admin.php?page=" . BWG()->prefix . "_subscribe&" . BWG()->prefix . "_sub_action=skip" ;?>" class="skip more" ><?php _e( "Skip", BWG()->prefix ); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
