<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phân loại
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
                    <th>Số học sinh</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['exam'] as $exam): ?>
                    <tr>
                        <td><?= $exam['subject_id']; ?></td>
                        <td><?= $exam['name']; ?></td>
                        <td><?= $exam['count_student']; ?></td>
                        <td>
                            <a href="?url=map/edit/<?= $exam['subject_id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=map/delete/<?= $exam['subject_id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa phân loại này chứ?');"
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