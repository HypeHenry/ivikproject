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

		<form class="form-horizontal" method="post" action="<?= Router::url('userInsert') ?>">
			<fieldset>
				<legend>Create a user</legend>
				<div class="form-group">
					<label for="name" class="col-lg-3 control-label">Name</label>
					<div class="col-lg-9">

						<?php printf('<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="%s" />', null); ?>
						
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="col-lg-3 control-label">Email</label>
					<div class="col-lg-9">

						<?php printf('<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="%s" />', null); ?>

					</div>
				</div>

				<div class="form-group">
					<label for="username" class="col-lg-3 control-label">Username</label>
					<div class="col-lg-9">

						<?php printf('<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="%s" />', null); ?>

					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</fieldset>
		</form>
	</article>

	<article class="col-md-4">
		<h2>Heading</h2>
		<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
	</article>

</section>

	

<?php include('App/Views/app.footer.php');?>