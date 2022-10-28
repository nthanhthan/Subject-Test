<?php
/**
 * Class question
 */
class question extends Controller
{
    /**
     * question constructor.
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
        $this->view("admin",
            [
                "page"      => "question",
                "title"     => "Danh sách câu hỏi",
                "questions" => $this->getQuestions()
            ]
        );
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
     * Question view edit.
     * @param null $id
     */
    public function edit($id = null)
    {
        $question = [];
        $answer   = [];

        if ($id) {
            $question = $this->getQuestionById($id);
            $answer = $this->getAnswerByQuestionId($id);
        }

        $title = 'Cập nhật câu hỏi';
        if (!$id) $title = 'Thêm mới câu hỏi';

        $this->view("admin",
            [
                "page"              => "question_new",
                "title"             => $title,
                "question"          => $question,
                "answer"            => $answer
            ]
        );
    }

    /**

     * @param null $id
     * @return mixed
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại');
            return $this->redirect('?url=question');
        }

        $model = $this->model('QuestionModel');
        $model->deleteById($id);
        $this->addSuccessMessage('Xóa câu hỏi thành công.');
        $this->redirect();
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $isMultiple = $_POST['is_multiple'] ?: 0;
        $isCorrectArr = $_POST['is_correct'];
        $name = $_POST['name'] ?: null;
        $answers = $_POST['answer'] ?: [];
        $id = $_POST['id'] ?: null;
        $fileImg = $_FILES['image'];
        $video = $_FILES['video'];
        $level = $_POST['level'];

        if (!$isMultiple) {
            if (count($isCorrectArr) > 1) {
                $this->addErrorMessage('Bạn chỉ có thể chọn một đáp án.');
                return $this->redirect();
            }
        }

        try {
            if ($id) {
                $this->updateQuestion($id, $name, $isMultiple, $level, $fileImg, $video);
                $this->deleteAnswerByQuestionId($id);
                $this->insertAnswerFromArray($answers, $isCorrectArr, $id);
                $this->addSuccessMessage('Cập nhật câu hỏi thành công.');
                return $this->redirect('?url=question');
            }

            $questionId = $this->insertQuestion($name, $isMultiple, $fileImg, $level, $video);

            if (!$questionId) {
                $this->addErrorMessage('Đã có lỗi trong quá trình thêm mới câu hỏi. Vui lòng thử lại sau.');
                $this->redirect();
            }

            $this->insertAnswerFromArray($answers, $isCorrectArr, $questionId);
            $this->addSuccessMessage('Thêm mới câu hỏi thành công.');
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }

        $this->redirect('?url=question');
    }

    /**
     * @param $name
     * @param $isMultiple
     * @param $fileImg
     * @param $level
     * @param $video
     * @return mixed
     */
    public function insertQuestion($name, $isMultiple, $fileImg, $level, $video)
    {
        $model = $this->model('QuestionModel');
        return $model->insert($name, $isMultiple, $fileImg, $level, $video);
    }

    /**
     * @param $answer
     * @param $isCorrect
     * @param $questionId
     * @return mixed
     */
    public function insertAnswer($answer, $isCorrect, $questionId)
    {
        $answerModel = $this->model('AnswerModel');
        return $answerModel->insert($answer, $isCorrect, $questionId);
    }

    /**
     * @param array $answers
     * @param $isCorrectArr
     * @param $questionId
     */
    public function insertAnswerFromArray(array $answers, $isCorrectArr, $questionId)
    {
        foreach ($answers as $key => $answer) {
            $isCorrect = !empty($isCorrectArr[$key][0]) ? 1 : 0;
            $this->insertAnswer($answer[0], $isCorrect, $questionId);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getQuestionById($id)
    {
        $model = $this->model('QuestionModel');
        return $model->getById($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAnswerByQuestionId($id)
    {
        $model = $this->model('AnswerModel');
        return $model->getAnswerByQuestionId($id);
    }

    /**
     * @param $id
     * @param $name
     * @param $isMultiple
     * @param $level
     * @param $fileImg
     * @param $video
     * @return mixed
     */
    public function updateQuestion($id, $name, $isMultiple, $level, $fileImg, $video)
    {
        $model = $this->model('QuestionModel');
        return $model->update($id, $name, $isMultiple, $level, $fileImg, $video);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteAnswerByQuestionId($id)
    {
        $model = $this->model('AnswerModel');
        return $model->deleteAnswerByQuestionId($id);
    }
}