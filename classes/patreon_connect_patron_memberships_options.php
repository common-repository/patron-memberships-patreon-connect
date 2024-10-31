<?php

/*
Plugin Name: Patreon Connect: Patron Memberships
Plugin URI: https://uiux.me/patreon-connect-patron-memberships
Description: Use Patreon Connect with Paid Memberships Pro
Version: 1.0
Author: UIUX <me@uiux.me>
Author URI: https://uiux.me
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

class Patreon_Connect_Patron_Memberships_Options {

    function __construct() {

        if ( is_admin() ){
            add_action('admin_menu', array($this, 'patreon_memberships_plugin_setup') );
            add_action('admin_init', array($this, 'patreon_plugin_register_settings') );
        }

    }

    function patreon_memberships_plugin_setup(){
        add_menu_page( 'Patron Memberships Settings', 'Patron Memberships', 'manage_options', 'patreon-patron-memberships-plugin', array($this, 'patreon_patron_memberships_plugin_setup_page'), 'dashicons-groups' );
    }

    function patreon_plugin_register_settings() {
        register_setting( 'patreon-patron-memberships-options', 'patreon-patron-membership-override');
    }

    function patreon_patron_memberships_plugin_setup_page(){

        $args = array(
                'post_type'=>'page',
                'post_status'=>'publish',
                'posts_per_page'=>-1,
                'sort_order'=>'asc',
                'orderby'=>'title'
            );
        $all_pages = get_pages($args);

        ?>

       <form method="post" action="options.php">

            <?php settings_fields( 'patreon-patron-memberships-options' ); ?>
            <?php do_settings_sections( 'patreon-patron-memberships-options' ); ?>
    

        <div class="wrap">

            <div id="icon-options-general" class="icon32"></div>
            <h1>Patreon Connect: Patron Memberships Settings</h1>

            <div id="poststuff">

                <div id="post-body" class="metabox-holder columns-2">

                    <!-- main content -->
                    <div id="post-body-content">

                        <div class="meta-box-sortables ui-sortable">

                            <div class="postbox">

                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->

                                <h2 class="hndle"><span>Patron Memberships Settings</span>
                                </h2>

                                <div class="inside">

                                    <p><a href="https://www.patreon.com/wordpressplugin">Patreon Connect</a> is designed to protect your content from non-patrons and patrons that have not contributed enough to experience the content of your website.</p>

                                    
                                </div>
                                <!-- .inside -->

                            </div>
                            <!-- .postbox -->

                            <div class="postbox">

                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->

                                <h2 class="hndle"><span>Paid Memberships Pro</span>
                                </h2>

                                <div class="inside">
                                    
                                    <table class="widefat">

                                        <tr valign="top">
                                        <th scope="row"><strong>Allow Patreon Level to Override Membership Level</strong></th>
                                        <td><input type="checkbox" name="patreon-patron-membership-override" value="1"<?php checked( get_option('patreon-patron-membership-override', false) ); ?>></td>
                                        </tr>

                                    </table>

                                    <br>
                                    
                                </div>
                                <!-- .inside -->

                            </div>
                            <!-- .postbox -->

                        </div>
                        <!-- .meta-box-sortables .ui-sortable -->

                         <?php submit_button('Update Settings', 'primary', 'submit', false); ?>

                    </div>
                    <!-- post-body-content -->

                    <!-- sidebar -->
                    <div id="postbox-container-1" class="postbox-container">

                        <div class="meta-box-sortables">

                            <div class="postbox">

                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->

                                <h2 class="hndle">About Patron Memberships</h2>

                                <div class="inside">
                                    
                                    <p>
                                        Patron Memberships is designed to work perfectly with Paid Memberships Pro. Once enabled, a users contribution level to your Patreon campaign will be matched with all relevant membership levels.
                                    </p>

                                </div>
                                <!-- .inside -->

                            </div>
                            <!-- .postbox -->

                        </div>
                        <!-- .meta-box-sortables -->

                        <div class="meta-box-sortables">

                            <div class="postbox">

                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->

                                <h2 class="hndle">About Patreon Connect</h2>

                                <div class="inside">
                                    
                                    <p>Patreon Connect developed by Ben Parry @ <a href="https://uiux.me?utm_source=plugin_settings" target="_blank">https://uiux.me</a></p>
                                    
                                    <p><strong>SUPPORT &amp; TECHNICAL HELP</strong> <br>
                                    If you require support for this plugin, you can go to <a href="https://uiux.me/support?utm_source=plugin_settings" target="_blank">https://uiux.me/support</a> and submit a ticket.</p>
                                    <p><strong>DOCUMENTATION</strong> <br>Technical documentation and code examples available for patrons @ <a href="https://uiux.me/documentation?utm_source=plugin_settings" target="_blank">https://uiux.me/documentation</a></p>
                                    
                                    <p><a href="https://www.patreon.com/bePatron?u=2525709" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script></p>

                                </div>
                                <!-- .inside -->

                            </div>
                            <!-- .postbox -->

                        </div>
                        <!-- .meta-box-sortables -->

                    </div>
                    <!-- #postbox-container-1 .postbox-container -->

                </div>
                <!-- #post-body .metabox-holder .columns-2 -->

                <br class="clear">
            </div>
            <!-- #poststuff -->

        </div> <!-- .wrap -->
            
        

        </form>


    <?php

    }


}

?>
