<?php

/**
 * Class info
 */
class info extends Controller
{
    function execute()
    {
        if (!isset($_SESSION['id'])) {
            $this->addErrorMessage('Vui lòng đăng nhập để xem bài thi');
            return $this->redirect('?url=home');
        }

        $this->view('info',
            [
                'page'          => 'info',
                'title'         => 'Lịch sử thi',
                'result'        => $this->getHistory()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        $model = $this->model('ResultModel');
        return $model->getHistory();
    }
}