<?php

/**
 * Class dashboard
 */
class dashboard extends Controller
{
    /**
     * dashboard constructor.
     */
    public function __construct()
    {
        if (!isset($_SESSION['is_admin'])) {
            $this->addErrorMessage('Vui lòng đăng nhập vào trang quản trị');
            return $this->redirect('?url=login');
        }
    }

    /**
     * inheritDoc
     */
    public function execute()
    {
        $model = $this->model('ResultModel');
        $data = $model->getAllHistory();
        $this->view("admin", ["page" => "dashboard","title" => "Quản lý kết quả thi","history" => $data]);
    }
}