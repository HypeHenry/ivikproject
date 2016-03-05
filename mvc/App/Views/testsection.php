<?php
use myMvc\System\Router;

foreach ($users as $user) {
	printf('<a href="%s"><strong>%s</strong> (%s)</a><br />', 
		Router::url('userShow', ['id' => $user->id]), 
		$user->name, 
		$user->email
	);
}