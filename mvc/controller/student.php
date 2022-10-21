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
     * @return mixed
     */
    public function update()
    {
        $id = $_POST['id'] ?: null;
        $name = $_POST['name'] ?:null;
        $email = $_POST['email'] ?:null;
        $phone = $_POST['phone'] ?:null;
        $pass = $_POST['pass'] ?:null;
        $card = $_POST['card'] ?:null;
        $birthday = $_POST['birthday'] ?:null;
        $class = $_POST['class']?:null;

        try {
            if ($id) {
                $this->updateStudent($id, $name, $email, $phone, $pass, $card, $birthday, $class);
                $this->addSuccessMessage('Cập nhật thông tin thành công.');
            }else{
                $this->insertStudent($name, $email, $phone, $pass, $card, $birthday, $class);
                $this->addSuccessMessage('Thêm mới sinh viên thành công.');
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        $this->redirect('?url=student');
    }

    public function insertStudent($name, $email, $phone, $pass, $card, $birthday, $class)
    {
        $studentModel = $this->model('StudentModel');
        return $studentModel->insert($name, $email, $phone, $pass, $card, $birthday, $class);
    }

    public function updateStudent($id, $name, $email, $phone, $pass, $card, $birthday, $class)
    {
        $studentModel = $this->model('StudentModel');
        return $studentModel->update($id, $name, $email, $phone, $pass, $card, $birthday, $class);
    }

    /**
     * @inheritDoc
     */
    public function edit($id = null)
    {
        $student = [];

        if ($id) {
            $student = $this->getStudentById($id);
        }

        $title = 'Cập nhật sinh viên';
        if (!$id) $title = 'Thêm mới sinh viên';

        $this->view("admin",
            [
                "page"              => "student_new",
                "title"             => $title,
                "student"          => $student,
            ]
        );
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

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $model = $this->model('StudentModel');
        $status = $model->deleteById($id);
        if($status){
            $this->addSuccessMessage('Xóa thành công.');
            $this->redirect('?url=student');
        }else{
            $this->addErrorMessage('Hiện sinh viên này đang nằm 1 trong các nhóm đề thi.');
            $this->redirect('?url=student');
        }
    }
}