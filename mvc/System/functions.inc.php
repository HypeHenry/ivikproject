<?php
/**
 * myMvc class lazy loader
 */
spl_autoload_register(function ($qualifiedClassname) {

	# Remove the myMvc\ part from the class name,
	# so the autoloader will look in the DOC_ROOT folder
	# for this application's files.
	# Folder names follow the namespace's format.
	$qualifiedClassname = str_replace('\\', '/', str_replace(DOC_NAMESPACE . '\\', '', $qualifiedClassname));

	# Set the path to the class we want to include
	$path = DOC_ROOT . "/$qualifiedClassname.php";

	# Include it if the file exists,
	# else just let it fail.
	if(file_exists($path)) {
		require_once($path);
	}
});

/**
 * Dump and Die
 */
function dd ($var) {
	var_dump($var);
	die;
}

/**
 * Dump Don't Die
 */
function ddd($var) {
	var_dump($var);
}