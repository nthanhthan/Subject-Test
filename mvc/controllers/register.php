<?php

/**
 * Class register
 */
class register extends Controller
{
    /**
     * @return mixed
     */
    function execute()
    {
        $this->view('index', [
            'page'  => 'register',
            'title' => 'Đăng ký'
        ]);
    }

    /**
     * @return mixed
     */
    function post()
    {
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $re_password = $_POST['psw-repeat'];
        $name = $_POST['fullname'];
        $phone = $_POST['phone'];
        $card = $_POST['card'];
        $birthday = $_POST['birthday'];
        $class = $_POST['class'];

        if ($password != $re_password) {
            $this->addErrorMessage('Mật khẩu xác nhận không đúng.');
            return $this->redirect('?url=register');
        }

        $model = $this->model('StudentModel');
        $student = $model->getByEmail($email);

        if ($student) {
            $this->addErrorMessage('Email đã tồn tại.');
            return $this->redirect('?url=register');
        }

        $model->insert($name, $email, $phone, $password, $card, $birthday, $class);
        require_once("./mvc/models/Mailer.php");
        $mailer = new Mailer();
        $url = $_SERVER['HTTP_REFERER'];
        $url = str_replace("?url=register", '?url=login/confirm/', $url);
        $content = "<html><body><center><p> Vui lòng truy cập <a href='".$url.$email."'>vào đây</a> để hoàn tất việc đăng ký tài khoản.</p></center></body></html>";
        $isSend = $mailer->sendMail("Xác nhận email", $content, $email, $name);
        if($isSend){
            $this->addSuccessMessage('Đăng ký tài khoản thành công, vui lòng kiểm tra mail của bạn');
            return $this->redirect('?url=login');
        }
    }
}
?>