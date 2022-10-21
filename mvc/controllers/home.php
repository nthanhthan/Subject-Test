<?php

/**
 * Class Home
 */
class Home extends Controller
{
    const LIMIT_PER_PAY = 16;

    /**
     * @inheritDoc
     */
    function execute($page = 1)
    {
        $sum = $this->getCount()['theme_number'] / self::LIMIT_PER_PAY;
        $start = ($page - 1) * self::LIMIT_PER_PAY;

        $this->view('index',
            [
                'page'          => 'home',
                'title'         => 'Trang chủ',
                'theme'         => $this->getTheme($start),
                'count_page'    => $sum,
                'current_page'  => $page
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        $model = $this->model('ThemeModel');
        return $model->getSumTheme();
    }

    /**
     * @param $start
     * @return mixed
     */
    public function getTheme($start)
    {
        $model = $this->model('ThemeModel');
        return $model->getListAndCountTest($start);
    }
}
