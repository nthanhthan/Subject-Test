<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Góp ý
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

            </div>

            <!-- /.col-lg-12 -->
            <?php if(!empty($data['contact'])): ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Tên sinh viên</th>
                    <th>Email</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['contact'] as $item): ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['fullname']; ?></td>
                            <td><?= $item['email']; ?></td>
                            <td><?= $item['title']; ?></td>
                            <td><?= $item['content']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="col-lg-12">Hiện tại chưa có phản hồi nào từ sinh viên</div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>