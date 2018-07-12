<?php
/*
  Plugin Name: Twilio Calls & Text
  Description: Your users can input a phone number and receive a phone call connecting to any destination phone number you like.
  Version: 1.0.0
  Author: dasweb
  Author URI: https://dasweb.ca
  License: GPLv2 or later
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
define('TWILIO_PLUGIN_URL', plugin_dir_url(__FILE__));
define('TWILIO_PLUGIN_PATH', plugin_dir_path(__FILE__));

if (!class_exists('Twilio')) {

    class Twilio {

        public function __construct() {
            //create settings page
            add_action('admin_menu', array($this, 'twilio_settings_page'));
            //short codes
            require_once ('includes/shortcodes.php');
            //ajax functions
            require_once ('includes/ajax.php');
            //front end script
            add_action('wp_enqueue_scripts', array($this, 'twilio_script'));
            //admin style
            add_action('admin_enqueue_scripts', array($this, 'twilio_settings_style'));
            //user phone confirm
            add_action('wp_footer', array($this, 'user_phone_confirm_func'));

            require_once ('lib/Twilio/Twilio.php');
        }


        /**
         * admin style
         */
        public function twilio_settings_style() {
            wp_enqueue_style('twilio-settings-style', TWILIO_PLUGIN_URL . 'css/admin.css');
        }

        /**
         * front end script
         */
        public function twilio_script() {
            ?>
            <script>
                var ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
                
                var sms_url = '<?php echo TWILIO_PLUGIN_URL; ?>includes/ajax.php';
                
            </script>
            <?php
            wp_enqueue_style('twilio-css', TWILIO_PLUGIN_URL . 'css/frontend.css');
            wp_enqueue_style('twilio-phone-css', TWILIO_PLUGIN_URL . 'css/intlTelInput.css');
            wp_enqueue_script('twilio-phone', TWILIO_PLUGIN_URL . 'js/intlTelInput.min.js', array('jquery'));
            wp_enqueue_script('twilio-util', TWILIO_PLUGIN_URL . 'js/utils.js');
            wp_enqueue_script('twilio-script', TWILIO_PLUGIN_URL . 'js/twilio-script.js');
        }

        /**
         * settings page
         */
        public function twilio_settings_page() {
            add_menu_page('Twilio Click', 'Twilio Click', 'manage_options', 'twilio', array($this, 'twilio_settings_page_func'), 'dashicons-phone');
        }

        public function twilio_settings_page_func() {
            ?>
            <div class="twilio_settings" style="margin-top: 20px;">
                
                <div class="welcome-panel">
                    <div class="welcome-panel-content">

                        <div class="welcome-panel-column-container">
                            <div class="welcome-panel-column">
                                <h1>Twilio Calls & Text</h1>
                                <p>Twilio Calls & Text allows you to implement click-to-call or/and click-to-text lead caprure for your WordPress website using simple and intuitive shortcodes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <table class="update-nag">
                    <tbody>
                        <tr>
                            <td><b>Short Code Calls: </b> [wpc2c label='Click To Call' number='+15146667777']</td>
                            
                            
                        </tr>
                    </tbody>
                </table>
                <br>
                <table class="update-nag">
                    <tbody>
                        <tr>
         
                            <td><b>Short Code SMS: </b> [wpsms label='Send Me SMS' number='+15146667777']</td>
                            
                        </tr>
                    </tbody>
                </table>

                <hr/>
                <h3>Settings</h3>
                <?php
                //save settings
                if (isset($_POST['setting_twilio_number'])) {
                    update_option('tw_setting_twilio_number', $_POST['setting_twilio_number']);
                    update_option('tw_setting_twilio_account_sid', $_POST['setting_twilio_account_sid']);
                    update_option('tw_setting_twilio_auth_token', $_POST['setting_twilio_auth_token']);
                    
                    update_option('tw_setting_twilio_sms_body', $_POST['setting_twilio_sms_body']);
                    update_option('tw_setting_twilio_sms_vcard', $_POST['setting_twilio_sms_vcard']);
                    
                    
                    ?>
                    <div class="updated below-h2" id="message"><p>Settings updated successfully.</p></div>
                    <?php
                }
                ?>
                <form method="post" class="form-table">
                    <table>
                        <tbody>
                            <tr>
                                <td><strong>Twilio Account SID</strong></td>
                                <td>
                                    <input value="<?php echo get_option('tw_setting_twilio_account_sid'); ?>" name="setting_twilio_account_sid" type="text"/>
                                    <p class="description">Your Account SID you can get it from: <a target="_blank" href='https://www.twilio.com/user/account/'>https://www.twilio.com/user/account/</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Twilio Auth Token</strong></td>
                                <td>
                                    <input value="<?php echo get_option('tw_setting_twilio_auth_token'); ?>" name="setting_twilio_auth_token" type="text"/>
                                    <p class="description">Your Account Auth Token you can get it from: <a target="_blank" href='https://www.twilio.com/user/account/'>https://www.twilio.com/user/account/</a></p>
                                </td>
                            </tr>   
                            <tr>
                                <td><strong>Twilio Number</strong></td>
                                <td>
                                    <input value="<?php echo get_option('tw_setting_twilio_number'); ?>" name="setting_twilio_number" type="text"/>
                                    <p class="description">Twilio Phone Number (ie. +14695572832)</p>
                                </td>
                            </tr>  
                             <tr>
                                <td>
                                    <hr>
                                    <h4>Text (SMS/MMS) Settings</h4>
                                    <p>dev mode</p>
                                 </td>
                            </tr>
                            
                            <tr>
                                <td><strong>SMS/MMS</strong></td>
                                <td>
                                    <textarea name="setting_twilio_sms_body"><?php echo get_option('tw_setting_twilio_sms_body'); ?></textarea>
                                    <p class="description">SMS body (max 150)</p>
                                </td>
                            </tr> 
                            
                            <tr>
                                <td><strong>MMS vCard url</strong></td>
                                <td>
                                    <input value="<?php echo get_option('tw_setting_twilio_sms_vcard'); ?>" name="setting_twilio_sms_vcard" type="text"/>
                                    <p class="description">put the url of vCard you want to send</p>
                                </td>
                            </tr> 
                            
                            
                            
                        </tbody>
                    </table>       
                    <p class="submit">
                        <input type="submit" value="Save Changes" class="button button-primary">
                    </p>
                </form>
                <hr/>
            </div>
            
            <div class="clear">
</div>
            <?php
        }
    }
    $twilio = new Twilio();
}
