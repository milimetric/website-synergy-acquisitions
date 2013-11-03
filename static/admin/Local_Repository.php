<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '../settings.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'util.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Repository.php');

class Local_Repository extends Repository
{

    private static $LOCK_MAX_RETRIES = 5;
    private $SETTINGS_FILE;
    private $EMAILS_FILE;

    function __construct()
    {
        $this->SETTINGS_FILE = dirname(__FILE__) . '/local/' . Repository::$SETTINGS_TABLE_NAME . '.data';
        $this->EMAILS_FILE = dirname(__FILE__) . '/local/' . Repository::$NEWSLETTER_EMAILS_TABLE_NAME . '.data';
    }

    function get_setting($setting_name, $settings_array = array())
    {
        if (is_array($settings_array) && count($settings_array) > 0) {
            $values = $settings_array[$setting_name];
            if (isset($values['custom_value']) && $values['custom_value'] != null && strlen($values['custom_value']) > 0) {
                return $values['custom_value'];
            } else {
                return $values['default_value'];
            }
        } else {
            $data = $this->read_file_content($this->SETTINGS_FILE);
            if (strlen($data) > 0) {
                $custom_settings = unserialize($data);
            } else {
                $custom_settings = array();
            }

            if (array_key_exists($setting_name, $custom_settings)) {
                return $custom_settings[$setting_name];
            } else {
                $default_values = $this->get_default_settings();
                return $default_values[$setting_name];
            }
        }
    }

    function get_all_settings()
    {
        $settings = array();
        $data = $this->read_file_content($this->SETTINGS_FILE);
        if (strlen($data) > 0) {
            $custom_settings = unserialize($data);
        } else {
            $custom_settings = array();
        }

        $default_settings = $this->get_default_settings();
        foreach ($default_settings as $key => $value) {
            $custom_value = array_key_exists($key, $custom_settings) ? $custom_settings[$key] : '';
            $settings[$key] = array(
                "default_value" => $value,
                "custom_value" => $custom_value,
            );
        }

        return $settings;
    }

    function save_settings($settings)
    {
        if (is_array($settings)) {
            $data = serialize($settings);
            $this->write_file_content($this->SETTINGS_FILE, $data);
        }
    }

    function restore_settings()
    {
        return $this->write_file_content($this->SETTINGS_FILE, '');
    }

    function has_custom_value($setting_name)
    {
        $data = $this->read_file_content($this->SETTINGS_FILE);
        if (strlen($data) > 0) {
            $custom_settings = unserialize($data);
        } else {
            $custom_settings = array();
        }

        if (array_key_exists($setting_name, $custom_settings)) {
            $default_settings = $this->get_default_settings();
            return $default_settings[$setting_name] == $custom_settings[$setting_name];
        } else {
            return false;
        }
    }

    function get_all_emails()
    {
        $data = $this->read_file_content($this->EMAILS_FILE);
        if (strlen($data) > 0) {
            $emails = unserialize($data);
        } else {
            $emails = array();
        }
        return $emails;
    }

    function add_email_address($email)
    {
        $data = $this->read_file_content($this->EMAILS_FILE);
        if (strlen($data) > 0) {
            $emails = unserialize($data);
        } else {
            $emails = array();
        }
        $email_id = md5($email);
        $emails[$email_id] = $email;
        $data = serialize($emails);
        return $this->write_file_content($this->EMAILS_FILE, $data);
    }

    function remove_email_address($email_id)
    {
        $data = $this->read_file_content($this->EMAILS_FILE);
        if (strlen($data) > 0) {
            $emails = unserialize($data);
        } else {
            $emails = array();
        }
        if (array_key_exists($email_id, $emails)) {
            unset($emails[$email_id]);
            $data = serialize($emails);
            return $this->write_file_content($this->EMAILS_FILE, $data);
        }
        return true;
    }

    private function read_file_content($file_name)
    {
        $max_retries = Local_Repository::$LOCK_MAX_RETRIES;
        $fp = fopen($file_name, 'r+');
        $retries = 0;

        if (!$fp) {
            return false;
        }

        // keep trying to get a lock as long as possible
        do {
            if ($retries > 0) {
                sleep(1);
            }
            $retries += 1;
        } while (!flock($fp, LOCK_EX) and $retries <= $max_retries);

        // couldn't get the lock, give up
        if ($retries == $max_retries) {
            return false;
        }

        $content = file_get_contents($file_name);
        // release the lock
        flock($fp, LOCK_UN);
        fclose($fp);
        // success
        return $content;
    }

    private function write_file_content($file_name, $data)
    {
        $max_retries = Local_Repository::$LOCK_MAX_RETRIES;
        $fp = fopen($file_name, 'r+');
        $retries = 0;

        if (!$fp) {
            return false;
        }

        // keep trying to get a lock as long as possible
        do {
            if ($retries > 0) {
                sleep(1);
            }
            $retries += 1;
        } while (!flock($fp, LOCK_EX) and $retries <= $max_retries);

        // couldn't get the lock, give up
        if ($retries == $max_retries) {
            return false;
        }

        ftruncate($fp, 0);
        fwrite($fp, $data);
        flock($fp, LOCK_UN);
        fclose($fp);
        return true;
    }

}
