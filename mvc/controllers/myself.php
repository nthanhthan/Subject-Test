<?php

class myself extends Controller
{
    function execute(){
        $id = $_SESSION['id'];
        $model = $this->model('ResultModel');
        $data = $model->getCountTest($id);
        $this->view('index', ['page' => 'myself','title' => 'Thông tin cá nhân','report' => $data]);
    }
}