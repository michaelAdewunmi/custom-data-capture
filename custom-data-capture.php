<?php
/**
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @wordpress-plugin
 * Plugin Name:       Josbiz Custom Data Capture
 * Plugin URI:        http://josbiz.com.ng/custom-data-capture
 * Description:       A Plugin to capture data via forms and convert to excel on demand
 * Version:           1.0.0
 * Author:            Josbiz Technologies
 * Author URI:        https://josbiz.com.ng
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       josbiz-custom-data-capture
 * Domain Path:       /languages
 *
 * @category   Plugins
 * @package    WordPress
 * @subpackage WordPress/Plugins
 * @author     JOSBIZ <d.devignersplace@gmail.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       http://josbiz.com.ng
 * @since      1.0.0
 */
require "vendor/autoload.php";

use JosbizCustomDataCapture\Includes\Activator;
use JosbizCustomDataCapture\Includes\Deactivator;
use JosbizCustomDataCapture\Includes\PluginLoader;

if (!defined('WPINC')) {
    die;
}

/**
 * Current plugin version.
 * Starting at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_VERSION', '1.0.0');

/**
 * Current plugin name.
 * Rename this for your plugin and update it if you change name.
 */
define('PLUGIN_PUBLIC_NAME', 'custom-data-capture');


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/Activator.php
 *
 * @return void
 */
function activate_custom_data_capture()
{
    Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/Deactivator.php
 * @return void
 */
function deactivate_custom_data_capture()
{
    Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_custom_data_capture');
register_deactivation_hook(__FILE__, 'deactivate_custom_data_capture');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since  1.0.0
 * @return void
 */
function run_custom_data_capture()
{
    $plugin = new PluginLoader();
    $plugin->run();
}
run_custom_data_capture();
