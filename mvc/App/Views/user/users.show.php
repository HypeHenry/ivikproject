<?php 
	use myMvc\System\Router;
?>

<?php include('App/Views/app.header.php');?>

<section class="row">

	<article class="col-md-4">
		<h2>Users</h2>
		<h3>A list of all our users.</h3>
		<p>
			<?php
				foreach ($users as $userRow) {
					printf('<a href="%s"><strong>%s</strong> (%s)</a><br />', 
						Router::url('userShow', ['id' => $userRow->id]), 
						$userRow->name, 
						$userRow->email
					);
				}

				printf('<p><a class="btn btn-primary" href="%s" role="button">Add a new user &raquo;</a></p>', Router::url('userCreate', ['id' => $userRow->id]));
			?>
		</p>
	</article>

	<article class="col-md-4">
		<h2>User</h2>
		
		<form class="form-horizontal">
			<fieldset>
				<legend>Show a user</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">Name</label>
					<div class="col-lg-9">

						<?php printf('<p class="form-control-static">%s</p>', $user->name); ?>

					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">Email</label>
					<div class="col-lg-9">

						<?php printf('<p class="form-control-static">%s</p>', $user->email); ?>

					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">Username</label>
					<div class="col-lg-9">

						<?php printf('<p class="form-control-static">%s</p>', $user->username); ?>

					</div>
				</div>
			</fieldset>
		</form>
		
		<?php printf('<p><a class="btn btn-default" href="%s" role="button">Edit this user &raquo;</a></p>', Router::url('userEdit', ['id' => $user->id])); ?>

	</article>

	<article class="col-md-4">
		<h2>Heading</h2>
		<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
	</article>

</section>

	

<?php include('App/Views/app.footer.php');?>