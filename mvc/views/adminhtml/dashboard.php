<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kết quả thi
                    <small>Danh sách</small>
                </h1>

            </div>

            <!-- /.col-lg-12 -->
            <?php if(!empty($data['history'])): ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>#ID</th>
                    <th>Tên sinh viên</th>
                    <th>Đề thi</th>
                    <th>Chủ đề</th>
                    <th>Cấp độ</th>
                    <th>Số câu đúng/Tổng số câu</th>
                    <th>Điểm số</th>
                </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($data['history'] as $item): ?>
                        <?php 
                            $result = explode("/", $item['result']);
                            if($result[1] == 0){
                                $score = 10;
                            }else {
                                $score = $result[0] * (10 / $result[1]);
                            }
                        ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $item['fullname']; ?></td>
                            <td><?= $item['subject_name']; ?></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['level']; ?></td>
                            <td><?= $item['result']; ?></td>
                            <td><?= number_format($score, 2, '.', '') ?>/10</td>
                        </tr>
                        <?php $count ++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                <div class="col-lg-12">Hiện tại chưa có sinh viên nào làm bài</div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>