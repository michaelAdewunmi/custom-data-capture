<?php
/**
 * The file to handle table creation for business premises
 *
 * @category   Plugins
 * @package    JosbizCustomDataCapture
 * @subpackage JosbizCustomDataCapture/Includes
 * @author     Josbiz - Michael Adewunmi <d.devignersplace@gmail.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       http://josbiz.com.ng
 * @since      1.0.0
 */
namespace JosbizCustomDataCapture\Includes;

/**
 * The Class to handle table creation for business premises
 *
 * @category   Plugins
 * @package    JosbizCustomDataCapture
 * @subpackage JosbizCustomDataCapture/Includes
 * @author     Josbiz - Michael Adewunmi <d.devignersplace@gmail.com>
 * @license    GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link       http://josbiz.com.ng
 * @since      1.0.0
 */
class DbTableNPowerDataCapture extends DbTableUtilities
{
    /**
     * Get things started
     *
     * @access public
     * @since  1.0
    */
    public function __construct()
    {
        global $wpdb;

        $this->table_name  = $wpdb->prefix . 'npower_data';
        $this->primary_key = 'nasarawa_npower_capture_id';
        $this->version     = '1.0';
    }

    /**
     * Create the table
     *
     * @access public
     * @since  1.0
    */
    public function createTable()
    {

        global $wpdb;

        include_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $sql = "CREATE TABLE " . $this->table_name . " (
            nasarawa_npower_capture_id bigint(20) NOT NULL AUTO_INCREMENT,
            first_name varchar(100) NOT NULL,
            middle_name varchar(100) NOT NULL,
            last_name varchar(100) NOT NULL,
            gender ENUM('Male', 'Female') NOT NULL DEFAULT 'Male',
            lga varchar(100) NOT NULL,
            ward varchar(100) NOT NULL,
            phone_number varchar(20) UNIQUE NOT NULL,
            address varchar(255) NOT NULL,
            city varchar(100) NOT NULL,
            state varchar(100) NOT NULL,
            country varchar(100) NOT NULL,
            email varchar(255) NOT NULL,
            application_id varchar(255) NOT NULL,
            programme ENUM('N-Power Knowledge', 'N-Power Build', 'N-Power Agro', 'N-Power Health, 'N-Power Teach', 'N-Power Tax') NOT NULL DEFAULT 'Male',
            date_of_birth Date NOT NULL,
            indigene_certificate TEXT NOT NULL,
            PRIMARY KEY  (".$this->primary_key.")
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;";

        dbDelta($sql);
        update_option($this->table_name . '_db_version', $this->version);
        // place_of_declaration varchar(255) NOT NULL,
    }

    /**
     * Get columns and formats
     *
     * @access public
     * @since  .0
    */
    public function getColumns()
    {
        global $wpdb;

        $fields = $wpdb->get_results("SHOW COLUMNS FROM $this->table_name");
        $my_fields = array();
        foreach ($fields as $field) {
            if ($field->Type == "bignint(20)" || $field->Type == "tinyint(1)"  || $field->Type == "tinyint(3)") {
                $my_fields[$field->Field] = "%d";
            } else {
                $my_fields[$field->Field] = "%s";
            }
        }
        return $my_fields;
    }

    /**
     * Get default column values
     *
     * @access public
     * @since  1.0
    */
    public function getColumnDefaults()
    {
        global $wpdb;

        $fields = $wpdb->get_results("SHOW COLUMNS FROM $this->table_name");
        $my_fields = array();
        foreach ($fields as $field) {
            if ($field->Type == "bignint(20)" || $field->Type == "tinyint(1)"  || $field->Type == "tinyint(3)") {
                $my_fields[$field->Field] = 0;
            } else {
                $my_fields[$field->Field] = "";
            }
        }
        return $my_fields;
    }
}
