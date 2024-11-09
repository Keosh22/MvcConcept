<?php

class HomeController extends Controller {
    public function index() {
        // $userModel = $this->loadModel('UserModel');
        // $users = $userModel->getUsers();


        $this->loadView('home', ['users' => "Hello world"]);
    }
}