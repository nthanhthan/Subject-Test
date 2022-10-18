<form action="?url=register/post" method="post" style="border:1px solid #ccc">
    <div class="container">
        <h1>Đăng ký</h1>
        <p>Vui lòng điền đầy đủ thông tin bên dưới để tạo mới tài khoản.</p>
        <hr>
        <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Nhập email" name="email" required>

        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Nhập mật khẩu" name="psw" required minlength="6" maxlength="24">

        <label for="psw-repeat"><b>Xác nhận mật khẩu</b></label>
        <input type="password" placeholder="Nhập lại mật khẩu" name="psw-repeat" required minlength="6" maxlength="24">

        <label for="fullname"><b>Họ tên</b></label>
        <input type="text" placeholder="Nhập họ tên đầy đủ" name="fullname" required maxlength="255">

        <label for="phone"><b>Số điện thoại</b></label>
        <input type="number" placeholder="Nhập số điện thoại" name="phone" id="phone" required maxlength="10">

        <label for="card"><b>Số chứng minh nhân dân</b></label>
        <input type="text" placeholder="Nhập số chứng minh nhân dân" id="card" name="card" required>

        <label for="birthday"><b>Ngày sinh</b></label>
        <input type="date" name="birthday" id="birthday" required>

        <label for="class"><b>Lớp</b></label>
        <input type="text" placeholder="Nhập tên lớp" name="class" id="class" required maxlength="255">

        <button type="submit" class="signupbtn">Đăng ký</button>
    </div>
</form>
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}
    /* Full-width input fields */
    input[type=text], input[type=password], select, input[type=email], input[type=number], input[type=date] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus, select:focus, input[type=email]:focus, input[type=date]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }
</style>