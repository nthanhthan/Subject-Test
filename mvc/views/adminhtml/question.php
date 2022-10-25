<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
                    <small>Danh sách</small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

            </div>

            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Câu hỏi</th>
                    <th>Người biên soạn</th>
                    <th>Nhiều đáp án</th>
                    <th>Cấp độ</th>
                    <th>Ngày tạo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['questions'] as $question): ?>
                    <tr>
                        <td><?= $question['question_id']; ?></td>
                        <?php
                        $arr = explode(' ', $question['question_name']);
                        $name = '';
                        if (count($arr) > 20) {
                            foreach(array_slice($arr,0,20) as $word){
                                $name .= ' ' . $word;
                            }
                            $name .= '...';
                        } else {
                            $name = $question['question_name'];
                        }
                        ?>
                        <td><?= $name; ?></td>
                        <td><?= $question['fullname'] ?></td>
                        <td><?= $question['is_multiple'] ? 'Yes' : 'No'; ?></td>
                        <td><?= $question['level'] ?></td>
                        <td><?= $question['created_at']; ?></td>
                        <td>
                            <a href="?url=question/edit/<?= $question['question_id']; ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a href="?url=question/delete/<?= $question['question_id']; ?>"
                               onclick="return confirm('Bạn chắc chắn muốn xóa câu hỏi này chứ?');"
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