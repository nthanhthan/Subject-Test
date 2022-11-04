<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Giáo viên
                    <small><?= !empty($data['teacher']['user_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                <form action="?url=teacher/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">

                    <input type="hidden" name="id"
                           value="<?= !empty($data['teacher']['user_id']) ? $data['teacher']['user_id'] : ''; ?>"/>
                    <div class="form-group">
                        <label for="name">Tên giáo viên:</label>
                        <input class="form-control"
                                  type="text"
                                  placeholder="Nhập tên giáo viên"
                                  id="name"
                                  name="name"
                                  value='<?= !empty($data['teacher']['fullname']) ? $data['teacher']['fullname'] : ''; ?>'
                                  required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control"
                                  type="email"
                                  placeholder="Nhập email"
                                  id="email"
                                  name="email"
                                  value='<?= !empty($data['teacher']['email']) ? $data['teacher']['email'] : ''; ?>'
                                  required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Nhập mật khẩu" required />
                    </div>

                    <button type="submit"
                            class="btn btn-primary"
                            style="margin-top: 10px;">
                        <?= !empty($data['teacher']['user_id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
