<?php

/**
 * Class exam
 */
class Exam extends Controller
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
                'page'      => 'exam',
                'title'     => 'Danh sách đề thi',
                'exam'      => $this->getExamAvg()
            ]
        );
    }

    /**
     * @param null $id
     */
    public function edit($id = null)
    {
        $exam = [];
        $mapping = [];
        if ($id) {
            $exam = $this->getById($id);
            $mapping = $this->getQuestionMappingById($id);
        }

        $this->view('admin',
            [
                'page'          => 'exam_new',
                'title'         => 'Tạo mới/Cập nhật đề thi',
                'theme'         => $this->getListTheme(),
                'questions'     => $this->getQuestions(),
                'exam'          => $exam,
                'mapping'       => $mapping
            ]
        );
    }

    /**
     * @param $id
     * @return array
     */
    public function getQuestionMappingById($id)
    {
        $model = $this->model('QuestionMappingModel');
        $arr = $model->getQuestionMappingById($id);
        $data = [];

        foreach ($arr as $item) {
            $data[] = $item['question_id'];
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
    public function getListTheme()
    {
        $model = $this->model('ThemeModel');
        return $model->getList();
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $id                 = $_POST['id'] ?: null;
        $name               = $_POST['name'] ?: '';
        $description        = $_POST['description'] ?: '';
        $themeId            = $_POST['theme'] ?: null;
        $level              = $_POST['level'] ?: null;
        $questionIds        = $_POST['question_ids'] ?: '';
        $pass               = $_POST['pass'] ?:'';
        $time               = $_POST['time'] ?:'';

        if (empty($questionIds)) {
            $this->addErrorMessage('Vui lòng chọn câu hỏi cho đề thi này.');
            return $this->redirect();
        }

        try {
            $questionIdArr = explode(',', $questionIds);

            if (!empty($id)) {
                $this->updateExam($id, $name, $description, $level, $themeId, $pass, $time);
                $this->deleteMappingById($id);
                $this->insertQuestionMapping($questionIdArr, $id);
                $this->addSuccessMessage('Cập nhật đề thi thành công.');
                return $this->redirect('?url=exam');
            }

            $examId = $this->insertExam($name, $description, $level, $themeId, $pass, $time);

            if (!$examId) {
                $this->addSuccessMessage('Đã có lỗi xảy ra khi lưu thông tin đề thi. Vui lòng thử lại sau.');
                return $this->redirect();
            }

            $this->insertQuestionMapping($questionIdArr, $examId);
            $this->addSuccessMessage('Thêm đề thi thành công.');
        } catch (\Exception$exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        return $this->redirect('?url=exam');
    }

    /**
     * @param $id
     * @param $name
     * @param $description
     * @param $level
     * @param $themeId
     * @param $pass
     * @param $time
     * @return mixed
     */
    public function updateExam($id, $name, $description, $level, $themeId, $pass, $time)
    {
        $model = $this->model('SubjectModel');
        return $model->update($id, $name, $description, $level, $themeId, $pass, $time);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteMappingById($id)
    {
        $model = $this->model('QuestionMappingModel');
        return $model->deleteMappingById($id);
    }

    /**
     * @param array $questionIdArray
     * @param $examId
     */
    public function insertQuestionMapping(array $questionIdArray, $examId)
    {
        foreach ($questionIdArray as $question) {
            if (!empty($question)) {
                $this->insertMapping($examId, $question);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getExamAvg()
    {
        $model = $this->model('SubjectModel');
        return $model->getAvgExamAndCountQues();
    }

    /**
     * @param $examId
     * @param $questionId
     * @return mixed
     */
    public function insertMapping($examId, $questionId)
    {
        $model = $this->model('QuestionMappingModel');
        return $model->insert($questionId, $examId);
    }

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        $model = $this->model('QuestionModel');
        return $model->getList();
    }

    /**
     * @param $name
     * @param $description
     * @param $level
     * @param $themeId
     * @param $pass
     * @param $time
     * @return mixed
     */
    public function insertExam($name, $description, $level, $themeId, $pass, $time)
    {
        $model = $this->model('SubjectModel');
        return $model->insert($name, $description, $level, $themeId, $pass, $time);
    }

    /**
     * @param null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại.');
            return $this->redirect('?url=exam');
        }

        try {
            $model = $this->model('SubjectModel');
            $model->deleteById($id);
            $this->addSuccessMessage('Xóa đề thi thành công.');
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }
        return $this->redirect();
    }
}