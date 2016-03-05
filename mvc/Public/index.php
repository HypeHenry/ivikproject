<?php
include '../init.inc.php';

use myMvc\System\Router;
use myMvc\System\View;

/*
	Root route
 */

# This route uses a closure function (callback) to execute some code
# In this case it executes a UserController method
Router::route('get', '/', function () {
	
	$UserController = new myMvc\App\Controllers\UserController();
	$UserController->index();
	
});

# This route uses a closure function (callback) to execute some code
# It's also a demonstration on how to use the View class
/*Router::route('get', '/', function (){
	
	# Initialize a UserController, we'll use the 
	# fully qualified name for this test
	$UserController = new myMvc\App\Controllers\UserController();
	
	# This method adds a view to a section in the 
	# main layout view, App/Views/app.layout.php
	$UserController->indexByView();

	# For now the View class is only used in this instance
	# When implemented in all Controller methods, this 
	# call should be executed last, at the bottom of this page.
	View::display('App/Views/app.layout.php', []);
});*/




/*
	User routes
 */

# Note that routes without variables should be at the top
# This route uses a closure function (callback) to execute some code
Router::route('get', '/users', 'UserController::index', 'userIndex');
Router::route('get', '/users/create', 'UserController::create', 'userCreate');
Router::route('post', '/users/create', 'UserController::insert', 'userInsert');

# Note that routes with variables should be at the bottom
Router::route('post', '/users/:id', 'UserController::update', 'userUpdate');
Router::route('get', '/users/:id', 'UserController::show', 'userShow');
Router::route('get', '/users/:id/edit', 'UserController::edit', 'userEdit');


# Another example using the View class.
# This time showByView() adds views to multiple sections
/*Router::route('get', '/users/:id', function ($id){
	
	# Initialize a UserController, we'll use the 
	# fully qualified name for this test
	$UserController = new myMvc\App\Controllers\UserController();
	
	# This method adds two views to the 'firstcolumn' and 'secondcolumn' sections 
	# main layout view, App/Views/app.layout.php
	$UserController->showByView($id);

	# For now the View class is only used in this instance
	# When implemented in all Controller methods, this 
	# call should be executed last, at the bottom of this page.
	View::display('App/Views/app.layout.php', []);

}, 'userShow');*/

/*
	More routes, or make subroutes in App/Routes, see App/Routes/test.php
 */


/*
	Execute route
 */
Router::execute();

