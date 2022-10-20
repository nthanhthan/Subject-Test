<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sinh viên
                    <small><?= !empty($data['student']['student_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                <form action="?url=student/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">

                    <input type="hidden" name="id"
                           value="<?= !empty($data['student']['student_id']) ? $data['student']['student_id'] : ''; ?>"/>
                    <div class="form-group">
                        <label for="name">Tên sinh viên:</label>
                        <input class="form-control"
                                  type="text"
                                  placeholder="Nhập tên sinh viên"
                                  id="name"
                                  name="name"
                                  value='<?= !empty($data['student']['fullname']) ? $data['student']['fullname'] : ''; ?>'
                                  required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control"
                                  type="email"
                                  placeholder="Nhập email"
                                  id="email"
                                  name="email"
                                  value='<?= !empty($data['student']['email']) ? $data['student']['email'] : ''; ?>'
                                  required>
                    </div>
                    <div class="form-group">
                        <label for="class">Lớp:</label>
                        <input class="form-control"
                                  type="text"
                                  placeholder="Nhập tên lớp"
                                  id="class"
                                  name="class"
                                  value='<?= !empty($data['student']['class']) ? $data['student']['class'] : ''; ?>'
                                  required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Nhập mật khẩu" required />
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input class="form-control"
                                  type="tel"
                                  placeholder="Nhập số điện thoại"
                                  id="phone"
                                  name="phone"
                                  pattern="[0-9]{10}"
                                  value='<?= !empty($data['student']['phone']) ? $data['student']['phone'] : ''; ?>'
                                  required>
                    </div>

                    <div class="form-group">
                        <label for="card">Số chứng minh nhân dân:</label>
                        <input class="form-control"
                                  type="text"
                                  placeholder="Nhập số chứng minh nhân dân"
                                  id="card"
                                  name="card"
                                  value='<?= !empty($data['student']['card']) ? $data['student']['card'] : ''; ?>'
                                  required>
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh:</label>
                        <input class="form-control"
                                  type="date"
                                  id="birthday"
                                  name="birthday"
                                  value='<?= !empty($data['student']['birthday']) ? $data['student']['birthday'] : ''; ?>'
                                  required>
                    </div>

                    <button type="submit"
                            class="btn btn-primary"
                            style="margin-top: 10px;">
                        <?= !empty($data['student']['student_id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>