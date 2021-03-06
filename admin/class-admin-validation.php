<?php

if ( !class_exists ( 'DoifdAdminValidation' ) ) {

    class DoifdAdminValidation {

        public function __construct() {
            
        }

        /* This function validates all the options field inputs, just in case. */

        public static function admin_options_validation( $input ) {

            $valid = array( );

            $valid[ 'landing_page' ] = preg_replace ( '/[^0-9]/', '', $input[ 'landing_page' ] );

            $valid[ 'downloads_allowed' ] = preg_replace ( '/[^0-9]/', '', $input[ 'downloads_allowed' ] );

            $valid[ 'email_name' ] = preg_replace ( '/[^ \w]+/', '', $input[ 'email_name' ] );

            $valid[ 'from_email' ] = $input[ 'from_email' ];

            $valid[ 'email_message' ] = $input[ 'email_message' ];

            $valid[ 'add_to_wpusers' ] = preg_replace ( '/[^0-9]/', '', $input[ 'add_to_wpusers' ] );

            $valid[ 'promo_link' ] = preg_replace ( '/[^0-9]/', '', $input[ 'promo_link' ] );

            $valid[ 'widget_width' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_width' ] );

            $valid[ 'widget_inside_padding' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_inside_padding' ] );

            $valid[ 'widget_margin_top' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_margin_top' ] );

            $valid[ 'widget_margin_right' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_margin_right' ] );

            $valid[ 'widget_margin_bottom' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_margin_bottom' ] );

            $valid[ 'widget_margin_left' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_margin_left' ] );

            $valid[ 'widget_input_width' ] = preg_replace ( '/[^0-9]/', '', $input[ 'widget_input_width' ] );
            
            $valid[ 'widget_input_field_background_color' ] = preg_replace ( '/[^#a-z0-9]/i', '', $input[ 'widget_input_field_background_color' ] );
            
            $valid[ 'form_width' ] = preg_replace ( '/[^a-z0-9]/i', '', $input[ 'form_width' ] );
            
            $valid[ 'form_padding' ] = preg_replace ( '/[^a-z0-9]/i', '', $input[ 'form_padding' ] );
            
            $valid[ 'form_background_color' ] = preg_replace ( '/[^#a-z0-9]/i', '', $input[ 'form_background_color' ] );
            
            $valid[ 'form_color' ] = preg_replace ( '/[^#a-z0-9]/i', '', $input[ 'form_color' ] );
            
            $valid[ 'form_title_color' ] = preg_replace ( '/[^#a-z0-9]/i', '', $input[ 'form_title_color' ] );
            
            $valid[ 'form_class' ] = preg_replace ( '/[^a-z0-9_-]/i', '', $input[ 'form_class' ] );
            
            $valid[ 'form_input_field_background_color' ] = preg_replace ( '/[^#a-z0-9]/i', '', $input[ 'form_input_field_background_color' ] );
            
            $valid[ 'form_input_field_width' ] = preg_replace ( '/[^%a-z0-9]/i', '', $input[ 'form_input_field_width' ] );
            
            $valid[ 'notification_email' ] = preg_replace( '/[^0-9]/', '', $input[ 'notification_email' ] );

            return $valid;

        }

    }

}

?>
