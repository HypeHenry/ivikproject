<?php
namespace myMvc\System;

use PDO;

class Database {

	public static $conn;

	public static function connect ($host, $database, $user, $pass, $charset = 'utf8') {
		self::$conn = new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=' . $charset, $user, $pass);
		
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}

	public static function conn () {
		return self::$conn;
	}

}