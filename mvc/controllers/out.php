<?php

class out extends Controller
{
    function execute(){
        unset($_SESSION['is_admin']);
        unset($_SESSION['user_id']);
        echo "<script>
            alert('Đăng xuất thành công');
            window.location.href='?url=home';
        </script>";
    }
}