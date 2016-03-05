<?php
use myMvc\System\Router;

Router::route('get', '/test', function (){
		
	echo "Subrouter 'Test' works!";

});