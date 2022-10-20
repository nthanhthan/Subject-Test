<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sinh viên
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Lớp</th>
                    <th>Ngày sinh</th>
                    <th>Số chứng minh nhân dân</th>
                    <th>Số điện thoại</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['student'] as $row): ?>
                    <tr>
                        <td>MSSV<?= $row['student_id']; ?></td>
                        <td><?= $row['fullname']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['class']; ?></td>
                        <td><?= $row['birthday']; ?></td>
                        <td><?= $row['card']; ?></td>
                        <td><?= $row['phone']; ?></td>
                        <td>
                            <a href="?url=student/edit/<?= $row['student_id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=student/delete/<?= $row['student_id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa sinh viên này chứ?');"
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