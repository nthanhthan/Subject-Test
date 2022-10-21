<?php

/**
 * Class search
 */
class Search extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        if(isset($_POST['submit'])){
            $q = $_POST['q'];
            $model = $this->model('ThemeModel');
            $data = $model->getListAndCountTestById($q);
            $this->view('index',
                [
                    'page'          => 'search',
                    'title'         => 'Tìm kiếm bộ đề thi',
                    'theme'         => $data,
                    'q'             => $q
                ]
            );
        }
    }
}
