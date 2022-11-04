<div class="container d-flex justify-content-center align-content-center" style="margin-top:8rem;margin-bottom:12.67rem;">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="h-100">
                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>
                <h3>Đăng nhập vào phần bài làm</h3>
                <form method="POST" action="?url=test/execute">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                    <div class="form-group">
                        <label for="pass">Nhập mật khẩu</label>
                        <input class="form-control" type="password" name="pass" id="pass" required />
                    </div>
                    <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary mt-3" />
                </form>
            </div>
        </div>
    </div>
</div>