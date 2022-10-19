<?php

class login extends Controller
{
    function execute(){
        if(isset($_POST['submit'])){
            // System login
            $systemModel = $this->model('SystemModel');
            $isChecked = $systemModel->checkExistAccount($_POST['email'],$_POST['pass']);
            if ($isChecked) {
                $this->addSuccessMessage('Đăng nhập thành công');
                return $this->redirect('?url=dashboard');
            }
            // Student login
            $studentModel = $this->model('StudentModel');
            $isChecked = $studentModel->checkExistAccount($_POST['email'],$_POST['pass']);
            if($isChecked){
                $this->addSuccessMessage('Đăng nhập thành công');
                return $this->redirect('?url=home');
            }else{
                echo "<script>
                    alert('Email/Password không đúng, vui lòng đăng nhập lại');
                    window.location.href = '?url=login';
                </script>";
            }
        }
        $this->view('login', []);
    }

     /**
     * Confirm email
     * @param $email
     */
    function confirm($email)
    {
        $studentModel = $this->model("StudentModel");
        $isVerify = $studentModel->updateVerify($email);
        if ($isVerify) {
            echo "<script>
                alert('Xác nhận mail thành công, vui lòng hãy đăng nhập');
                window.location.href='?url=login';
            </script>";
        }
        echo "Email ".$email." không tồn tại.";
    }
}
?>