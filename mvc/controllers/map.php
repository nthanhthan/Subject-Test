<?php

/**
 * Class Map
 */
class Map extends Controller
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
                'page'      => 'map',
                'title'     => 'Danh sách phân loại sinh viên - đề thi',
                'exam'      => $this->getExamAvg()
            ]
        );
    }

    
     /**
     * @return mixed
     */
    public function getExamAvg()
    {
        $model = $this->model('SubjectModel');
        return $model->getAvgExamAndCountStu();
    }

    public function getStudent()
    {
        $studentModel = $this->model('StudentModel');
        return $studentModel->getAllStudent();
    }

    public function getExam()
    {
        $examModel = $this->model('SubjectModel');
        return $examModel->getAllSubject();
    }

    /**
     * @inheritDoc
     */
    public function edit($id = null)
    {
        $exam = [];
        $mapping = [];
        $title = 'Thêm mới phân loại';
        if ($id) {
            $exam = $this->getById($id);
            $mapping = $this->getSubjectMappingById($id);
            $title = 'Cập nhật phân loại';
        }

        $this->view("admin",
            [
                "page"              => "map_new",
                "title"             => $title,
                'student'           => $this->getStudent(),
                'exam'              => $this->getExam(),
                'another'           => $exam,
                'mapping'           => $mapping
            ]
        );
    }

    /**
     * @param $id
     * @return array
     */
    public function getSubjectMappingById($id)
    {
        $model = $this->model('SubjectMappingModel');
        $arr = $model->getSubjectMappingById($id);
        $data = [];

        foreach ($arr as $item) {
            $data[] = $item['student_id'];
        }

        return $data;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        $model = $this->model('SubjectModel');
        return $model->getById($id);
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id                 = $_POST['id'] ?: null;
        $exam               = $_POST['exam'] ?:null;
        $studentIds         = $_POST['student_ids'] ?: '';
        if (empty($studentIds )) {
            $this->addErrorMessage('Vui lòng chọn sinh viên cho đề thi này.');
            return $this->redirect();
        }

        try {
            $studentIdArr = explode(',', $studentIds);

            if (!empty($id)) {
                $this->deleteMappingById($id);
                $this->insertSubjectMapping($studentIdArr, $id);
                $this->addSuccessMessage('Cập nhật phân loại thành công.');
                return $this->redirect('?url=map');
            }

           

            

            $this->insertSubjectMapping($studentIdArr, $exam);
            $this->addSuccessMessage('Thêm phân loại thành công.');
        } catch (\Exception$exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=map');
    }


    /**
     * @param array $studentIdArr
     * @param $examId
     */
    public function insertSubjectMapping(array $studentIdArr, $examId)
    {
        foreach ($studentIdArr as $row) {
            if (!empty($row)) {
                $this->insertMapping($examId, $row);
            }
        }
    }

    /**
     * @param $examId
     * @param $studentId
     * @return mixed
     */
    public function insertMapping($examId, $studentId)
    {
        $model = $this->model('SubjectMappingModel');
        return $model->insert($studentId, $examId);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteMappingById($id)
    {
        $model = $this->model('SubjectMappingModel');
        return $model->deleteMappingById($id);
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại.');
            return $this->redirect('?url=map');
        }

        try {
            $model = $this->model('SubjectMappingModel');
            $model->deleteMappingById($id);
            $this->addSuccessMessage('Xóa phân loại thành công.');
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }
        return $this->redirect('?url=map');
    }
}