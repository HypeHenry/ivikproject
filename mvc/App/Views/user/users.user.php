<?php
	use myMvc\System\Router;
?>

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