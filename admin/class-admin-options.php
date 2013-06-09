<?php

class DoifdAdminOptions {

    public function __construct() {
        
    }

    public static function options_page() {

        global $wpdb;

        ?>

        <!--Begin HTML markup-->

        <div class="wrap">

            <div id="icon-options-general" class="icon32"></div>

            <h2>Settings</h2>

            <?php include DOUBLE_OPT_IN_FOR_DOWNLOAD_DIR . 'views/view-admin-header.php'; ?>

            <!--Save Options Button-->

            <form action="options.php" method="post">

                <?php

                settings_fields ( 'doifd_lab_options' );

                do_settings_sections ( 'doifd_lab' );

                ?>

                <input class='button-primary' name="Submit" type="submit" value="Save Changes">

            </form>

        </div> <!--Wrap End--> 

        <?php

    }

    public static function allowed_downloads() {

        /* Get options from options table */

        $options = get_option ( 'doifd_lab_options' );

        /* Get maximum number of downloads and assign to variable */

        $downloads_allowed = $options[ 'downloads_allowed' ];

        echo '<div id="doifd_lab_admin_options">';
        echo '<select name="doifd_lab_options[downloads_allowed]" id="downloads_allowed">';
        echo "<option value='{$options[ 'downloads_allowed' ]}'>";
        echo esc_attr ( __ ( 'Select Maximum Downloads' ) );
        echo '</option>';
        echo '<option value="1" ' . (($downloads_allowed == 1 ) ? 'selected="selected"' : "") . '>1</option>';
        echo '<option value="2" ' . (($downloads_allowed == 2 ) ? 'selected="selected"' : "") . '>2</option>';
        echo '<option value="3" ' . (($downloads_allowed == 3 ) ? 'selected="selected"' : "") . '>3</option>';
        echo '<option value="4" ' . (($downloads_allowed == 4 ) ? 'selected="selected"' : "") . '>4</option>';
        echo '<option value="5" ' . (($downloads_allowed == 5 ) ? 'selected="selected"' : "") . '>5</option>';
        echo '<option value="6" ' . (($downloads_allowed == 6 ) ? 'selected="selected"' : "") . '>6</option>';
        echo '<option value="7" ' . (($downloads_allowed == 7 ) ? 'selected="selected"' : "") . '>7</option>';
        echo '<option value="8" ' . (($downloads_allowed == 8 ) ? 'selected="selected"' : "") . '>8</option>';
        echo '<option value="9" ' . (($downloads_allowed == 9 ) ? 'selected="selected"' : "") . '>9</option>';
        echo '<option value="10" ' . (($downloads_allowed == 10 ) ? 'selected="selected"' : "") . '>10</option>';
        echo '</select>';
        _e ( '<p>Select the maximum number of times a subscriber can download an item. The default is <b>1</b>.', 'Double-Opt-In-For-Download' );
        echo '</div>';

    }

    public static function select_landing_page() {

        /* Get options from options table */
        
        $options = get_option ( 'doifd_lab_options' );

        /* Assign landing page option to variable */
        
        $landing_page = $options[ 'landing_page' ];

        /* Echo drop down select menu */
        
        echo '<div id="doifd_lab_admin_options">';
        echo '<select name="doifd_lab_options[landing_page]" id="landing_page">';
        echo "<option value='{$options[ 'landing_page' ]}'>";
        echo esc_attr ( __ ( 'Select Landing Page' ) );
        echo '</option>';
        $pages = get_pages ();
        foreach ( $pages as $page ) {
            $option = '<option value="' . $page->ID . '" ' . (($landing_page == $page->ID ) ? 'selected="selected"' : "") . '>';
            $option .= $page->post_title;
            $option .= '</option>';
            echo $option;
        }
        echo '</select>';
        _e ( '<p>Select the landing page for your subscribers. This will be the page your subscribers will come to after they have clicked the link in their verification email. Once you have selected your landing page, place this shortcode <b>[lab_landing_page]</b> on that page.</p>', 'Double-Opt-In-For-Download' );
        echo '</div>';

    }

    public static function add_to_user_table() {

        /* Get options from options table */

        $options = get_option ( 'doifd_lab_options' );

        /* Assign add_to_wpusers option to variable */

        $add_to_wp_user = $options[ 'add_to_wpusers' ];

        /* Echo radio select button */
        
        echo '<input type="radio" id="add_to_wpusers" name="doifd_lab_options[add_to_wpusers]" ' . ((isset ( $add_to_wp_user ) && ($add_to_wp_user) == '1' ) ? 'checked="checked"' : "") . ' value="1" /> Yes ';
        echo '<input type="radio" id="add_to_wpusers" name="doifd_lab_options[add_to_wpusers]" ' . (isset ( $add_to_wp_user ) && ($add_to_wp_user == '0' ) ? 'checked="checked"' : "") . ' value="0" /> No ';
        _e ( '<p>If you want to add the subscribers to the wordress user table, check yes. Otherwise they will only be added to the plugins subscriber table.</p>', 'Double-Opt-In-For-Download' );

    }

    public static function add_promo_link() {

        /* Get options from options table */

        $options = get_option ( 'doifd_lab_options' );

        /* Assign promo link option to variable */

        if ( isset ( $options[ 'promo_link' ] ) ) {

            $add_promo_link = $options[ 'promo_link' ];
        }

        /* Echo radio select button */
        
        echo '<input type="radio" id="promo_link" name="doifd_lab_options[promo_link]" ' . ((isset ( $add_promo_link ) && ( $add_promo_link ) == '1' ) ? 'checked="checked"' : "") . ' value="1" /> Yes ';
        echo '<input type="radio" id="promo_link" name="doifd_lab_options[promo_link]" ' . (isset ( $add_promo_link ) && ( $add_promo_link == '0' ) ? 'checked="checked"' : "") . ' value="0" /> No ';
        _e ( '<p>If you check "YES", this will add a small promotional link at the bottom of the registration forms.</p>', 'Double-Opt-In-For-Download' );

    }

    /* This function creates the email address field */
    
    public static function from_email_address_field() {

        /* Get options from options table */

        $email_options = get_option ( 'doifd_lab_options' );

        /* Get from email and assign to variable */

        $from_email = $email_options[ 'from_email' ];

        /* Echo the from email address field */
        
        echo '<div id="doifd_lab_admin_options">';
        echo '<input type="text" name="doifd_lab_options[from_email]" id="from_email" value="' . $from_email . '">';
        _e ( '<p>This is the email address that shows in the <b>From</b> field in the verification email. If this is left blank it will default to the admin email address</p>', 'Double-Opt-In-For-Download' );
        echo '</div>';

    }

    /* This function creates the from email name field */
    
    public static function from_email_name_field() {

        /* Get options from options table */
        
        $email_options = get_option ( 'doifd_lab_options' );

        /* Get email name from options table and assign to variable */
        
        $email_name = $email_options[ 'email_name' ];

        /* Echo the email name input field */
        
        echo '<div id="doifd_lab_admin_options">';
        echo '<input type="text" name="doifd_lab_options[email_name]" id="email_name" value="' . $email_name . '">';
        _e ( '<p>This is the <b>Name</b> that will show in the <b>From</b> field in the verification email. If this is left blank it will default to your website/blog name.</p>', 'Double-Opt-In-For-Download' );
        echo '</div>';

    }

    /* This function creates the email message text area field */
    
    public static function email_message_field() {

        /* Get options from options table */

        $email_options = get_option ( 'doifd_lab_options' );

        /* Get email message from options table and assign to variable */

        $email_message = $email_options[ 'email_message' ];

        /* Echo email message textarea */

        echo '<div id="doifd_lab_admin_options">';
        echo '<textarea rows="10" cols="60" name="doifd_lab_options[email_message]" id="email_message">' . $email_message . '</textarea>';
        _e ( '<p>This is the verification email that is sent to a new subscriber. Just remember, at the very least, you need to keep the <b>{URL}</b> in your email, as this provides the subscriber with the verification link. See the complete list below.<br />
        
            <b>{subscriber} = Subscribers Name<br />
            {url} = Verification Link<br />
            {download} = The name of the download the subscriber has selected</b><br />', 'Double-Opt-In-For-Download' );

        echo '</div>';

    }

}
?>
