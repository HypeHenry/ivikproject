<?php
namespace myMvc;

use myMvc\System\Database;
error_reporting(E_ALL);
ini_set("display_errors", 1);

/* =========================================================
 * APP SETTINGS
 * ====================================================== */

# The App's webroot folder, inside localhost webroot
define('DOC_WEBROOT', 		'/ivik4');

# Database to connect to
define('DB_HOST', 			'localhost');
define('DB_DATABASE', 		'mp3shop');
define('DB_USERNAME', 		'root');
define('DB_PASSWORD', 		'root');
define('DB_CHARSET', 		'utf8');

/* =========================================================
 * SYS INIT
 * ====================================================== */
session_start();

mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
ini_set('default_charset', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');

date_default_timezone_set('Europe/Amsterdam');
setlocale(LC_TIME, 'nl_NL');

/* =========================================================
 * CONFIG
 *
 * Because we're not using virtual hosts, we'll have to set
 * our roots manually
 * ====================================================== */

define('DOC_NAMESPACE',		__NAMESPACE__);
define('DOC_ROOT', 			__DIR__);

define('APP_ROOT', 			DOC_ROOT . '/App');
define('PUBLIC_ROOT', 		DOC_ROOT . '/Public');
define('SYSTEM_ROOT', 		DOC_ROOT . '/System');
define('VENDOR_ROOT', 		DOC_ROOT . '/Vendor');

define('WEB_ROOT',			'//' . $_SERVER['HTTP_HOST'] .  DOC_WEBROOT);

/* =========================================================
 * SETTINGS
 * ====================================================== */
set_include_path(DOC_ROOT);

/* =========================================================
 * INCLUDES
 * ====================================================== */
include ('System/functions.inc.php');

/* =========================================================
 * VENDOR
 * ====================================================== */
//include ('Vendor/GUMP/gump.class.php');

/* =========================================================
 * SET UP DATABASE CONNECTION
 * ====================================================== */
try {
	Database::connect(DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD, DB_CHARSET);
} catch (PDOException $e) {
	trigger_error($e->getMessage(), E_USER_ERROR);
}