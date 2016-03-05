<?php
	use myMvc\System\Router;
?>

<h2>Users</h2>
<h3>A list of all our users.</h3>
<p>
	<?php
		foreach ($users as $user) {
			printf('<a href="%s"><strong>%s</strong> (%s)</a><br />', 
				Router::url('userShow', ['id' => $user->id]), 
				$user->name, 
				$user->email
			);
		}

		printf('<p><a class="btn btn-primary" href="%s" role="button">Add a new user &raquo;</a></p>', Router::url('userCreate', ['id' => $user->id]));
	?>
</p>