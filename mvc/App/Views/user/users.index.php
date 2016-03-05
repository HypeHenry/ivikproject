<?php 
	use myMvc\System\Router;
?>

<?php include('App/Views/app.header.php'); ?>

<section class="row">

	<article class="col-md-4">
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


	</article>

	<article class="col-md-4">
		<h2>Heading</h2>
		<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
		<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
	</article>

	<article class="col-md-4">
		<h2>Heading</h2>
		<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
	</article>

</section>

	

<?php include('App/Views/app.footer.php');?>