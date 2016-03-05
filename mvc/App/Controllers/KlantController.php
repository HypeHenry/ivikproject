<?php
namespace myMvc\App\Controllers;

use myMvc\System\View;
use myMvc\System\Router;
use myMvc\App\Models\klantModel;

class klantController {

    /**
     * [__construct description]
     */
    public function __construct () {
        $this->klantModel = new klantModel();
    }

    /**
     * [index description]
     * @return [type] [description]
     */
    public function index () {

        $klanten = $this->klantModel->fetchAll();

        include('App/Views/klanten/klanten.index.php');

    }

    /**
     * Example of using the View class to parse views
     * @return [type] [description]
     */
    public function indexByView () {

        $klanten = $this->klantModel->fetchAll();

        View::view('firstcolumn', 'App/Views/klanten/klanten.list.php', ['klanten' => $klanten]);

    }
    public function showByView ($id) {

        $klanten = $this->klantModel->fetchAll();
        $klant = $this->klantModel->fetchOne($id);

        View::view('firstcolumn', 'App/Views/klanten/klanten.list.php', ['klanten' => $klanten]);
        View::view('secondcolumn', 'App/Views/klanten/klanten.klant.php', ['klant' => $klant]);
    }

    /**
     * [show description
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function show ($id) {

        $klanten = $this->klantModel->fetchAll();
        $klant = $this->klantModel->fetchOne($id);

        include('App/Views/klanten/klanten.show.php');
    }

    /**
     * [edit description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit ($id) {

        $klanten = $this->klantModel->fetchAll();
        $klant = $this->klantModel->fetchOne($id);

        include('App/Views/klanten/klanten.edit.php');
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create () {

        $klanten = $this->klantModel->fetchAll();

        include('App/Views/klanten/klanten.create.php');

    }

    /**
     * [insert description]
     * @return [type] [description]
     */
    public function insert () {

        $insertedId = $this->klantModel->insert();

        if ($insertedId) {
            Router::redirect('klantenhow', ['id' => $insertedId]);
        } else {
            Router::redirect('klantIndex');
        }
    }

    /**
     * [update description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function update ($id) {

        $result = $this->klantModel->update($id);

        if ($result) {
            Router::redirect('klantenhow', ['id' => $id]);
        } else {
            Router::redirect('klantEdit', ['id' => $id]);
        }
    }


}