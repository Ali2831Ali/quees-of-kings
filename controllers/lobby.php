<?php

class Lobby extends Controller {
    function __construct(){
        parent::__construct();
        Model::doUser();
    }
    function index()
    {
        $charge=$this->model->charge();
        $user=$this->model->getUserInfo();
        $rank=$this->model->getRank();
        $data=['user'=>$user,'rank'=>$rank];
        $this->view('lobby/index',$data);
    }
    function logout(){
        $this->model->logOut();
    }
    function updateUser(){
        $this->model->updateuser($_POST);
    }

}

?>