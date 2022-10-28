<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đề thi
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Tên đề thi</th>
                    <th>Người biên soạn</th>
                    <th>Cấp độ</th>
                    <th>Chủ đề</th>
                    <th>Số câu hỏi</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['exam'] as $exam): ?>
                    <tr>
                        <td><?= $exam['subject_id']; ?></td>
                        <td><?= $exam['name']; ?></td>
                        <td><?= $exam['fullname'] ?></td>
                        <td><?= $exam['level']; ?></td>
                        <td><?= $exam['theme_name']; ?></td>
                        <td><?= $exam['question_number']; ?></td>
                        <td>
                            <a href="?url=exam/edit/<?= $exam['subject_id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=exam/delete/<?= $exam['subject_id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa đề thi này chứ?');"
                               style="margin:0 1rem;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>