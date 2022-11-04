<?php

/**
 * Class detail
 */
class detail extends Controller
{
    /**
     * @inheritDoc
     */
    public function execute($id = null)
    {
        if (!isset($id)) {
            $this->addErrorMessage('Trang không tồn tại');
            return $this->redirect('?url=home');
        }

        if (!isset($_SESSION['id'])) {
            $this->addErrorMessage('Vui lòng đăng nhập');
            return $this->redirect('?url=login');
        }

        $subject = $this->getSubject($id);
        $themes = $this->getTheme();
        $anotherSubject = $this->getAnotherSubject(isset($subject['name']) ? $subject['name'] : '');

        $this->view('index',
            [
                'page'          => 'detail',
                'title'         => 'Chi tiết bài thi',
                'detail'        => $this->getDetail($id),
                'themes'        => $themes,
                'another_exam'  => isset($anotherSubject) ? $anotherSubject : '',
                'base_url'      => $this->getBaseUrl()
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        $model = $this->model('ThemeModel');
        return $model->getNewThemes();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getAnotherSubject($name)
    {
        $model = $this->model('SubjectModel');
        return $model->getAnotherSubject($name);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSubject($id)
    {
        $model = $this->model('SubjectModel');
        return $model->getById($id);
    }

    /**
     * @param $resultId
     * @return mixed
     */
    public function getDetail($resultId)
    {
        $model = $this->model('ResultModel');
        $data = $model->getDetail($resultId);
        $str = '';
        $subjectId = '';
        foreach ($data as $item) {
            $str .= $item['question_id'] . ',';
            $subjectId = $item['subject_id'];
        }
        $questionMapping = $this->model('QuestionMappingModel');
        $data2 = $questionMapping->getAnotherMapping($subjectId, trim($str, ','));
        return array_merge($data, $data2);
    }
}