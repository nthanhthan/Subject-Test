<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chủ đề
                    <small><?= !empty($data['theme']['theme_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                    <form action="?url=theme/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">
                        <input type="hidden" name="id" value="<?= !empty($data['theme']['theme_id']) ? $data['theme']['theme_id'] : ''; ?>" />
                        <div class="form-group">
                            <label for="name">Tên chủ đề:</label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   placeholder="Nhập tên chủ đề"
                                   name="name"
                                   value="<?= !empty($data['theme']['name']) ? $data['theme']['name'] : ''; ?>"
                                   required
                                   maxlength="255">
                        </div>

                        <div class="form-group">
                            <label for="description">Mô tả:</label>
                            <textarea class="form-control"
                                      rows="5"
                                      placeholder="Mô tả chủ đề"
                                      id="description"
                                      name="description"
                                      required
                                      maxlength="1000"><?= !empty($data['theme']['description']) ? $data['theme']['description'] : ''; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= !empty($data['theme']['theme_id']) ? 'Cập nhật' : 'Thêm mới'; ?></button>

                    </form>
            </div>
        </div>
    </div>
</div>
