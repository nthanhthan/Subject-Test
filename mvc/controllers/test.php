<?php

/**
 * Class Test
 */
class Test extends Controller
{
    /**
     * @inheritDoc
     */
    function execute()
    {
        $subject = $this->getSubject($_POST['id']);
        $subjectMappingModel = $this->model('SubjectMappingModel');
        $studenIds = $subjectMappingModel->getSubjectMappingByIdVer2($_POST['id']);
        if(password_verify($_POST['pass'],$subject['pass']) && in_array($_SESSION['id'],$studenIds)){
            $question = $this->getQuestions($_POST['id']);
            $themes = $this->getTheme();
            $anotherSubject = $this->getAnotherSubject($subject['name']);
    
            $this->view('index',
                [
                    'page'          => 'test',
                    'title'         => $subject['name'],
                    'subject'       => $subject,
                    'question'      => $question,
                    'themes'        => $themes,
                    'another_exam'  => $anotherSubject,
                    'base_url'      => $this->getBaseUrl() 
                ]
            );
        }else{
            $this->addErrorMessage('Mật khẩu không đúng hoặc bạn không thuộc nhóm đề thi này');
            return $this->redirect('?url=test/verify/'.$subject['subject_id']);
        }
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
     * @param $id
     * @return mixed
     */
    public function getSubject($id)
    {
        $model = $this->model('SubjectModel');
        return $model->getById($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getQuestions($id)
    {
        $model = $this->model('QuestionMappingModel');
        return $model->getDataMapping($id);
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
     * Xử lý và chấm bài thi.
     */
    public function request()
    {
        $testId = $_POST['test_id'];
        unset($_POST['test_id']);

        $answers = $_POST;
        $data = [];

        foreach ($answers as $str) {
            $ansArr = explode('-', $str);
            if (array_key_exists($ansArr[0], $data)) {
                $data[$ansArr[0]] = [$data[$ansArr[0]], $ansArr[1]];
            } else {
                $data[$ansArr[0]] = $ansArr[1];
            }
        }

        try {
            $userId = $_SESSION['id'];
            $countFail = $this->calculate($data);
            $result = (count($data) - $countFail) . '/' . $this->getCount($testId)['count'];
            $resultId = $this->setResult($testId, $userId, $result);
            $this->insertResultQuestion($resultId, $data);
            $this->addSuccessMessage('Chúc mừng bạn đã hoàn thành bài thi.');
        } catch (\Exception $exception) {
            $this->addErrorMessage($exception->getMessage());
        }
        return $this->redirect('?url=info/execute/'.$userId);
    }

    /**
     * @param $testId
     * @return mixed
     */
    public function getCount($testId)
    {
        $model = $this->model('QuestionMappingModel');
        return $model->getCount($testId);
    }

    /**
     * @param $resultId
     * @param $data
     */
    public function insertResultQuestion($resultId, $data)
    {
        foreach ($data as $key => $item) {
            $model = $this->model('ResultMapping');
            if (is_array($item)) {
                $item = implode(',', $item);
            }
            $model->insert($resultId, $key, $item);
        }
    }

    /**
     * @param array $data
     * @return int
     */
    public function calculate(array $data)
    {
        $countFail = 0;
        foreach ($data as $key => $value) {
            $model = $this->model('AnswerModel');
            $answerCorrect = $model->getIsCorrect($key);

            // 1 đáp án đúng.
            if (count($answerCorrect) == 1) {
                if (is_array($value) || $value != $answerCorrect[0]['answer_id']) {
                    $countFail++;
                    continue;
                }
            }

            // Nhiều đáp án đúng.
            if (count($answerCorrect) > 1) {
                foreach ($answerCorrect as $item) {
                    if (is_array($value)) {
                        if (!in_array($item['answer_id'], $value)) {
                            $countFail++;
                            break;
                        }
                    } else {
                        $countFail++;
                        break;
                    }
                }
            }
        }
        return $countFail;
    }

    /**
     * @param $testId
     * @param $studentId
     * @param $result
     * @return mixed
     */
    public function setResult($testId, $studentId, $result)
    {
        $model = $this->model('ResultModel');
        return $model->insert($testId, $studentId, $result);
    }

    public function verify($id = null)
    {
        if (!$id) {
            $this->addErrorMessage('Trang không tồn tại');
            return $this->redirect('?url=Home');
        }

        if (!isset($_SESSION['id'])) {
            $this->addErrorMessage('Vui lòng đăng nhập để làm bài thi.');
            return $this->redirect('?url=login');
        }

        $this->view('index',
            [
                'page'          => 'verify',
                'title'         => 'Xác thực',
                'id'            => $id
            ]
        );
    }
}