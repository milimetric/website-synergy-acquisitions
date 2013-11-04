<?php//@skip-indexing?>
<?php

define('SITE_PATH', dirname(__FILE__));
define('ENABLE_CAPTCHA', false);
define('USE_SSL', false);
define('LOCALE', 'en_US');
define('DEBUG', false);
//these properties are used only by the PHP version
define('WEBSITE_COLOR', "93ac12"); //blue 2A8FBD, green 93ac12, indigo 4c6192, orange F78E0C, pink BD2346, purple 723F8E, red E64141, retro-green 6D8D5B, teal 4FA29A, yellow FBB829
define('WEBSITE_LAYOUT', "wide"); //boxed

$debug_mode = DEBUG;
if(array_key_exists('debug', $_REQUEST) && $_REQUEST['debug'] == 'on'){
    $debug_mode = true;
}
if($debug_mode){
    error_reporting(~0);
    ini_set('display_errors', 1);
}

//------------------------------------------------- ReCaptcha Settings -------------------------------------------------
//to generate the public and the private keys go here: https://www.google.com/recaptcha/admin/list
$captcha_public_key = "your_public_key";
$captcha_private_key = "your_private_key";

//-------------------------------------------------- Database Settings -------------------------------------------------
$db_type = "sqlite"; //sqlite , mysql or local

//MySQL settings
$db_host = '';
$db_name = '';
$db_user = '';
$db_pass = '';

//------------------------------------------------ Admin Settings ------------------------------------------------------
$my_email = 'abc@xyz.com'; // insert your email address here
$private_key = '';
$server_path = '';

//------------------------------------------------ Custom Settings -----------------------------------------------------
