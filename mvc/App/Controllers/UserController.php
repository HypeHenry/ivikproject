<?php
namespace myMvc\App\Controllers;

use myMvc\System\View;
use myMvc\System\Router;
use myMvc\App\Models\UserModel;

class UserController {

	/**
	 * [__construct description]
	 */
	public function __construct () {
		$this->UserModel = new UserModel();
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index () {

		$users = $this->UserModel->fetchAll();
		
		include('App/Views/user\/users.index.php');

	}

	/**
	 * Example of using the View class to parse views
	 * @return [type] [description]
	 */
	public function indexByView () {

		$users = $this->UserModel->fetchAll();
		
		View::view('firstcolumn', 'App/Views/users/users.list.php', ['users' => $users]);

	}
	public function showByView ($id) {

		$users = $this->UserModel->fetchAll();
		$user = $this->UserModel->fetchOne($id);

		View::view('firstcolumn', 'App/Views/users/users.list.php', ['users' => $users]);
		View::view('secondcolumn', 'App/Views/users/users.user.php', ['user' => $user]);
	}

	/**
	 * [show description
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show ($id) {

		$users = $this->UserModel->fetchAll();
		$user = $this->UserModel->fetchOne($id);

		include('App/Views/user/users.show.php');
	}

	/**
	 * [edit description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit ($id) {

		$users = $this->UserModel->fetchAll();
		$user = $this->UserModel->fetchOne($id);

		include('App/Views/user/users.edit.php');
	}

	/**
	 * [create description]
	 * @return [type] [description]
	 */
	public function create () {

		$users = $this->UserModel->fetchAll();

		include('App/Views/user/users.create.php');

	}

	/**
	 * [insert description]
	 * @return [type] [description]
	 */
	public function insert () {
		
		$insertedId = $this->UserModel->insert();

		if ($insertedId) {
			Router::redirect('userShow', ['id' => $insertedId]);
		} else {
			Router::redirect('userIndex');
		}
	}

	/**
	 * [update description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function update ($id) {

		$result = $this->UserModel->update($id);

		if ($result) {
			Router::redirect('userShow', ['id' => $id]);
		} else {
			Router::redirect('userEdit', ['id' => $id]);
		}
	}


}