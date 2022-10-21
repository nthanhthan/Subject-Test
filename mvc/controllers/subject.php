<?php

/**
 * Class subject
 */
class subject extends Controller
{
    const LIMIT_PER_PAY = 8;

    /**
     * @inheritDoc
     */
    function execute($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại.');
            return $this->redirect('?url=home');
        }

        $page = isset($_GET['page']) ? $_GET['page']: 1;
        $sum = $this->getCount($id)['sum'] / self::LIMIT_PER_PAY;
        $start = ($page - 1) * self::LIMIT_PER_PAY;
        $data = $this->getData($id, $start);
        $theme = $this->getTheme($id);

        $this->view('index',
            [
                'page'          => 'subject',
                'title'         => $theme['name'],
                'id'            => $theme['theme_id'],
                'test'          => $data,
                'count_page'    => $sum,
                'current_page'  => $page
            ]
        );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCount($id)
    {
        $model = $this->model('SubjectModel');
        return $model->getCount($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getTheme($id)
    {
        $model = $this->model('ThemeModel');
        return $model->getById($id);
    }

    /**
     * @param $id
     * @param $start
     * @return mixed
     */
    public function getData($id, $start)
    {
        $model = $this->model('SubjectModel');
        return $model->getDataByThemeId($id, $start);
    }
}