<?php

/**
 *
 * @link              
 * @since             1.0.0
 * @package           rsp
 *
 * @wordpress-plugin
 * Plugin Name:       Remove Suggested Passwords
 * Plugin URI:        
 * Description:       This is a WordPress snippet wrapped up in a plugin to remove the suggested password in WordPress
 * Version:           1.0
 * Author:            Kostas Vrouvas
 * Contributors:      kosvrouvas
 * Author URI:        https://kosvrouvas.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rsp
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_filter('random_password', 'rsp_disable_suggestions', 10, 2);

function rsp_disable_suggestions($password)
{
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ('wp-login.php' === $GLOBALS['pagenow'] && ('rp' == $action  || 'resetpass' == $action)) {
        return '';
    }
    return $password;
}
