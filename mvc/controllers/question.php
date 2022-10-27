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
     * @param $id
     * @return mixed
     */
    public function getQuestionById($id)
    {
        $model = $this->model('QuestionModel');
        return $model->getById($id);
    }
}