<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phân loại
                    <small><?= !empty($data['another']['subject_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                <form action="?url=map/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">
                    <div class="row">
                        <div class="col-12 text-right mr-5">
                            <button type="submit"
                                    class="btn btn-primary">
                                    <?= !empty($data['another']['subject_id']) ? 'Cập nhật' : 'Thêm mới'; ?>    
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exam">Đề thi</label>
                        <select name="exam" class="form-control" id="exam" required <?= isset($data['another']['subject_id']) ? 'disabled':'' ?>>
                            <option value="">Vui lòng chọn đề thi</option>
                            <?php foreach($data['exam'] as $row): ?>
                                <?php if($row['subject_id'] === $data['another']['subject_id']): ?>
                                    <option value="<?= $row['subject_id'] ?>" selected><?= $row['name'] ?></option>
                                <?php else: ?>
                                    <option value="<?= $row['subject_id'] ?>"><?= $row['name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="hidden" name="id"
                           value="<?= !empty($data['another']['subject_id']) ? $data['another']['subject_id'] : ''; ?>"/>
                    <?php $studentIds = implode(',', $data['mapping']) . ',' ?>
                    <input type="hidden" name="student_ids" value="<?= $studentIds ?>">
                </form>
                <div class="form-group mt-5">
                    <label for="level">Sinh viên</label>
                </div>
                <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>#ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Ngày sinh</th>
                        <th>Số chứng minh nhân dân</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['student'] as $row): ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox"
                                       name="student_id"
                                       <?= (in_array($row['student_id'], $data['mapping'])) ? 'checked' : ''; ?>
                                       data-checked="<?= (in_array($row['student_id'], $data['mapping'])) ? 1 : 0; ?>"
                                       class="form-check-input student_exam"
                                       value="<?= $row['student_id'] ?>">
                            </td>
                            <td><?= $row['student_id']; ?></td>
                            <td><?= $row['fullname']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['birthday']; ?></td>
                            <td><?= $row['card']; ?></td>
                            <td><?= $row['phone']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            </div>
        </div>
    </div>
</div>
