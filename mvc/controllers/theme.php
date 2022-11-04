<?php

/**
 * Class admin_theme
 */
class Theme extends Controller
{
    /**
     * Theme constructor.
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
        $model = $this->model('ThemeModel');
        $data = $model->getList();

        $this->view("admin",
            [
                "page"   => "theme",
                "title"  => "Danh sách chủ đề",
                "themes" => $data
            ]
        );
    }

    /**
     * Page edit view.
     * @param null $id
     */
    public function edit($id = null)
    {
        $data = [];
        $title = "Thêm mới chủ đề";

        if (!empty($id)) {
            $model = $this->model('ThemeModel');
            $data = $model->getById($id);
            $title = 'Chỉnh sửa chủ đề';
        }

        $this->view("admin",
            [
                "page"  => "theme_new",
                "theme" => $data,
                "title" => $title
            ]
        );
    }

    /**
     * Update order add new theme.
     */
    public function update()
    {
        $id = (int)$_POST['id'] ?: null;
        $name = $_POST['name'] ?: null;
        $description = $_POST['description'] ?: null;
        if (!$name || !$description) {
            $this->addErrorMessage('Vui lòng nhập đầy đủ thông tin.');
            return $this->redirect();
        }

        try {
            $model = $this->model('ThemeModel');

            if (!empty($id)) {
                $model->update($id, $name, $description);
                $this->addSuccessMessage('Cập nhật chủ đề thành công.');
            } else {
                if ($model->checkNameExists($name)) {
                    $this->addErrorMessage('Một chủ đề với tên ' . $name .' đã tồn tại.');
                    return $this->redirect();
                }
                $model->insert($name, $description);
                $this->addSuccessMessage('Thêm mới chủ đề thành công.');
            }
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }
        return $this->redirect('?url=theme');
    }

    /**
     * Delete record.
     * @param null $id
     */
    public function delete($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Yêu cầu không hợp lệ.');
            return $this->redirect('?url=theme');
        }
        try {
            $model = $this->model('ThemeModel');
            $model->deleteById($id);
            $this->addSuccessMessage('Xóa chủ đề thành công.');
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }
        return $this->redirect('?url=theme');
    }
}