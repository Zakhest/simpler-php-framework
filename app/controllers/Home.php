<?php

class Home extends Controller {
    public function index() {
        $model = $this->loadModel('UserModel');
        $data = $model->getAll();
        $this->loadView('home', ['users' => $data]);
    }

    public function doc(){
        $this->loadView('doc');
    }
}
