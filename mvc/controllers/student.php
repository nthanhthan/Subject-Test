<?php

/**
 * Class student
 */
class Student extends Controller
{
    /**
     * Exam constructor.
     */
    public function __construct()
    {
        if (!isset($_SESSION['is_admin'])) {
            $this->addErrorMessage('Vui lòng đăng nhập vào trang quản trị');
            return $this->redirect('?url=login');
        }
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->view('admin',
            [
                'page'      => 'student',
                'title'     => 'Danh sách sinh viên',
                'student'      => $this->getStudent()
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function getStudent()
    {
        $stuModel = $this->model('StudentModel');
        return $stuModel->getAllStudent();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getStudentById($id)
    {
        $model = $this->model('StudentModel');
        return $model->getById($id);
    }

}