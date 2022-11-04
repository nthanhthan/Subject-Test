<?php

/**
 * Class Rank
 */
class Rank extends Controller
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
                'page'      => 'rank',
                'title'     => 'Danh sách chủ đề',
                'theme'      => $this->getAllTheme()
            ]
        );
    }

    public function getAllTheme()
    {
        $model = $this->model('ThemeModel');
        return $model->getList();
    }

    /**
     * @inheritDoc
     */
    public function theme()
    {
        $id = $_GET['id'];
        $this->view('admin',
            [
                'page'      => 'theme_exam',
                'title'     => 'Danh sách bài thi',
                'subject'      => $this->getAllSubjectById($id)
            ]
        );
    }

    public function getAllSubjectById($id)
    {
        $model = $this->model('SubjectModel');
        return $model->getAllSubjectById($id);
    }

    /**
     * @inheritDoc
     */
    public function subject()
    {
        $id = $_GET['id'];
        $this->view('admin',
            [
                'page'      => 'subject_result',
                'title'     => 'Xếp hạng',
                'result'    => $this->getAllResultById($id)
            ]
        );
    }

    public function getAllResultById($id)
    {
        $model = $this->model('ResultModel');
        return $model->getAllResultById($id);
    }

    public function print()
    {
        $resultId = $_GET['id'];
        $rank = $_GET['rank'];
        $model = $this->model('PrintModel');
        $data = $model->getData($resultId);
        $this->view("print-result", ['page' => "printresult",'title' => 'In điểm','info' => $data,'rank' => $rank]);
    }
}