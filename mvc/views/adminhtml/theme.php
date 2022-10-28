<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chủ đề
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Tên chủ đề</th>
                    <th>Mô tả</th>
                    <th>Người biên soạn</th>
                    <th>Ngày tạo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['themes'] as $theme): ?>
                        <tr>
                            <td><?= $theme['theme_id']; ?></td>
                            <td><?= $theme['name']; ?></td>
                            <?php
                                $arr = explode(' ', $theme['description']);
                                $description = '';
                                if (count($arr) > 20) {
                                    foreach(array_slice($arr,0,20) as $word){
                                        $description .= ' ' . $word;
                                    }
                                    $description .= '...';
                                } else {
                                    $description = $theme['description'];
                                }
                            ?>

                            <td><?= $description; ?></td>
                            <td><?= $theme['fullname'] ?></td>
                            <td><?= $theme['created_at']; ?></td>
                            <td>
                                <a href="?url=theme/edit/<?= $theme['theme_id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="?url=theme/delete/<?= $theme['theme_id'] ?>"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa chủ đề này chứ?');"
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