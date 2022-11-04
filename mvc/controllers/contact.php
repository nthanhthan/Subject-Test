<?php

/**
 * Class contact
 */
class contact extends Controller
{

    /**
     * Contact constructor.
     */
    public function __construct()
    {
        if (!isset($_SESSION['id']) && !isset($_SESSION['is_admin'])) {
            $this->addErrorMessage('Vui lòng đăng nhập vào trang quản trị');
            return $this->redirect('?url=login');
        }
    }

    /**
     * @return mixed
     */
    function execute()
    {
        if (isset($_POST['submit'])) {
            $studentModel = $this->model('StudentModel');
            $status = $studentModel->contact($_POST);
            if($status){
                $this->addSuccessMessage('Cảm ơn bạn đã góp ý');
                return $this->redirect('?url=home');
            }
        }
        $this->view('contact', []);
    }

    function list(){
        $studentModel = $this->model('StudentModel');
        $data = $studentModel->getAllContact();
        $this->view('admin', [
            'page' => 'contact',
            'contact' => $data,
            'title' => 'Góp ý sinh viên'
        ]);
    }
}