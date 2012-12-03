<?php
/**
 * Statigram Wordpress Plugin
 *
 * @category Wordpress
 * @package  Statigram_Wordpress
 * @author   rydgel <jerome.mahuet@gmail.com>
 * @license  MIT http://en.wikipedia.org/wiki/MIT_License
 * @version  1.0
 * @link     http://statigr.am

Plugin Name: Statigram Widget
Plugin URI: http://statigr.am
Description: TODO
Version: 1.0
Author: Statigram
Author URI: http://statigr.am
Author Email: TODO
Text Domain: widget-name-locale
Domain Path: /lang/
Network: false
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

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
*/

require plugin_dir_path(__FILE__) . "widget.php";

add_action('widgets_init', create_function('', 'register_widget("StatigramWidget");'));

$widget = new StatigramWidget();

//Installation de la table si elle n'existe pas
$widget->dbInstall();

$widget->getPluginValues();

