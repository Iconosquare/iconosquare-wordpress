<?php

/**
 * Statigram Wordpress Plugin Widget
 *
 * @category Wordpress
 * @package  Statigram_Wordpress
 * @author   rydgel <jerome.mahuet@gmail.com>
 * @license  MIT http://en.wikipedia.org/wiki/MIT_License
 * @version  1.0
 * @link     http://statigr.am

Copyright 2012 Statigram (contact@statigr.am)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
**/

/**
 * Statigram Widget Main Class
 *
 * @category Wordpress
 * @package  Statigram_Wordpress
 * @author   rydgel <jerome.mahuet@gmail.com>
 * @license  MIT http://en.wikipedia.org/wiki/MIT_License
 * @version  1.0
 * @link     http://statigr.am
 */
class StatigramWidget extends WP_Widget
{
    // Set this to true to get the state of origin, so you don't need to always
    // uninstall during development.
    const STATE_OF_ORIGIN = true;

    /**
     * The widget constructor. Specifies the classname and description, instantiates
     * the widget, loads localization files, and includes necessary scripts and
     * styles.
     */
    public function __construct()
    {

        // Manage plugin ativation/deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        register_uninstall_hook(__FILE__, array($this, 'uninstall'));

        parent::__construct(
            'statigram-id',
            __('Statigram Widget', 'statigram-locale'),
            array(
                'classname'     =>  'statigram-widget',
                'description'   =>  __('This advanced widget lets you beautifully showcase Instagram photos on your blog or website.', 'statigram-locale')
           )
        );

        // load plugin text domain
        add_action('init', array($this, 'textdomain'));

        // Register admin styles and scripts
        add_action('admin_print_styles', array($this, 'registerAdminStyles'));
        add_action('admin_enqueue_scripts', array($this, 'registerAdminScripts'));

        // Register the admin page
        add_action('admin_menu', array($this, 'attAddOptions'));
    }

    /**
     * Make our function to call the WordPress function to add to the correct menu.
     *
     * @return null
     */
    public function attAddOptions()
    {
        add_theme_page(
            'Statigram Widget Options', 'Statigram Widget', 8,
            'statigram', array($this, 'attOptionsPage')
        );
    }

    /**
     * Content of the Admin Page
     *
     * @return null
     */
    public function attOptionsPage()
    {
        include plugin_dir_path(__FILE__) . '/views/admin-page.php';
    }

    /**
     * Outputs the content of the widget.
     *
     * @param array    $args     The array of form elements
     * @param instance $instance The current instance of the widget
     *
     * @return [type]           [description]
     */
    public function widget($args, $instance)
    {

        extract($args, EXTR_SKIP);

        echo $before_widget;

        include plugin_dir_path(__FILE__) . '/views/widget.php';

        echo $after_widget;

    }


    /**
     * Processes the widget's options to be saved.
     *
     * @param instance $new_instance The previous instance of values before the update.
     * @param instance $old_instance The new instance of values to be generated via the update.
     *
     * @return [type]                [description]
     */
    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    /**
     * Generates the administration form for the widget.
     *
     * @param instance $instance The array of keys and values for the widget.
     *
     * @return [type]           [description]
     */
    public function form($instance)
    {
        // No form here
        return null;
    }

    /**
     * Fired when the plugin is activated.
     *
     * @param boolean $network_wide True if WPMU superadmin uses
     * "Network Activate" action, false if WPMU is disabled or plugin is
     * activated on an individual blog
     *
     * @return [type]               [description]
     */
    public function activate($network_wide)
    {
        // Redirect the user to the widget dashboard after activation
        wp_redirect(admin_url('themes.php?page=statigram'));
        exit();
    }

    /**
     * Fired when the plugin is deactivated.
     *
     * @param boolean $network_wide True if WPMU superadmin uses
     * "Network Activate" action, false if WPMU is disabled or plugin is
     * activated on an individual blog
     *
     * @return [type]               [description]
     */
    public function deactivate($network_wide)
    {
        // Nothing for the moment
        var_dump('lol');
    }

    /**
     * Fired when the plugin is uninstalled
     *
     * @param  boolean $network_wide True if WPMU superadmin uses
     * "Network Activate" action, false if WPMU is disabled or plugin is
     * activated on an individual blog
     *
     * @return [type]               [description]
     */
    public function uninstall($network_wide)
    {
        // @TODO: remove tables

    }

    /**
     * Load the plugin text domain on "init"
     *
     * @return null
     */
    public function textdomain()
    {
        load_plugin_textdomain('statigram-locale', false, plugin_dir_path(__FILE__) . '/lang/');
    }


    /**
     * Registers and enqueues admin-specific styles.
     *
     * @return null
     */
    public function registerAdminStyles()
    {
        wp_enqueue_style('statigram-admin-styles', plugins_url('statigram/css/admin.css'));
    }

    /**
     * Registers and enqueues admin-specific JavaScript.
     *
     * @return null
     */
    public function registerAdminScripts()
    {
        wp_enqueue_script('statigram-admin-script-color', plugins_url('statigram/js/jscolor.js'));
        wp_enqueue_script('statigram-admin-script', plugins_url('statigram/js/admin.js'));
    }
    
    /**
     * Create database table for widget
     * 
     * call register_activation_hook(__FILE__,'dbInstall'); in activation plugin file
     * 
     * @return null 
     */
    public function dbInstall()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . "statigram-widget"; 

        $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
                `choose-content` enum('feed','hashtag') NOT NULL DEFAULT 'feed',
                `username` varchar(255) NOT NULL,
                `hashtag` varchar(255) NOT NULL,
                `linking` enum('statigram','instagram') NOT NULL DEFAULT 'statigram',
                `infos` tinyint(1) NOT NULL DEFAULT '1',
                `width` int(6) NOT NULL DEFAULT '380',
                `height` int(6) NOT NULL,
                `choose-mode` enum('grid','slideshow') NOT NULL DEFAULT 'grid',
                `pace` int(6) NOT NULL DEFAULT '10',
                `layoutX` int(1) NOT NULL DEFAULT '3',
                `layoutY` int(1) NOT NULL DEFAULT '2',
                `photo-border` tinyint(1) NOT NULL DEFAULT '1',
                `background` varchar(6) NOT NULL DEFAULT 'FFFFFF',
                `text` varchar(6) NOT NULL DEFAULT '777777',
                `widget-border` tinyint(1) NOT NULL DEFAULT '1',
                `radius` int(11) NOT NULL DEFAULT '5',
                `border-color` varchar(6) NOT NULL DEFAULT 'DDDDDD',
                PRIMARY KEY (`choose-content`)
                );";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        
        $this->dbInsert('username', 'statigram');
    }
    
    /**
     * Insert de valeur dans la database
     * 
     * call register_activation_hook(__FILE__,'dbInsert'); in activation plugin file
     * 
     * @param type $field
     * @param type $value 
     */
    public function dbUpdate($field, $value)
    {
        if (isset($field) && isset($value)) {
            update_option($field, $value);
        }
    }
    
    
    /**
     * Mise à jour dans champ $field avec la valeur $value
     * 
     * @global type $wpdb
     * @param type $field
     * @param type $value 
     */
    public function dbInsert($field, $value)
    {
        if (isset($field) && isset($value)) {
            global $wpdb;
            
            $table_name = $wpdb->prefix . "statigram-widget"; 

            $wpdb->insert( $table_name, array( "$field" => $value));
        }        
    }
    
    
    
    public function getPluginValues()
    {
//        $values = array('choose-content',
//                        'username', 
//                        'hashtag', 
//                        'linking', 
//                        'infos', 
//                        'width', 
//                        'height', 
//                        'choose-mode', 
//                        'pace', 
//                        'layoutX', 
//                        'layoutY', 
//                        'photo-border', 
//                        'background', 
//                        'text', 
//                        'widget-border', 
//                        'radius', 
//                        'border-color');
        
        global $wpdb;
            
        $table_name = $wpdb->prefix . "statigram-widget"; 
        
        $querystr = "SELECT * FROM $table_name";

        $pluginValues = $wpdb->get_results($querystr, OBJECT);
        var_dump($pluginValues);
    }
    
    
}
