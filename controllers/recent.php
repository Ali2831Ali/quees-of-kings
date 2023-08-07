<?php

class Recent extends Controller {
    function __construct(){
        parent::__construct();
        Model::doUser();
    }
    function index()
    {
        $user=$this->model->getUserInfo();
        $data=['user'=>$user];
        $this->view('recent/index',$data);
    }
    function show($id){
        $g=$this->model->show($id);
        echo json_encode($g);
    }

    function getQues(){
        $g=$this->model->getUserInfo();
        echo json_encode($g);
    }


}





?>