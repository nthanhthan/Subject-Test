<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Xếp hạng
                    <small>Danh sách</small>
                </h1>
            </div>
            <?php
                $arr = [];
                $check = [];
                foreach($data['result'] as $key => $row){
                    $item  = explode("/",$row['result']);
                    $score = $item[0] * (10/$item[1]);
                    $row['result'] = $score;
                    $arr[$key] = $row['result'];
                    $check[] = $row;
                }
                array_multisort($arr, SORT_DESC, $check);
            ?>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>Tên học sinh</th>
                    <th>Điểm</th>
                    <th>Xếp hạng</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $count = 1; foreach($check as $row): ?>
                        <tr>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= number_format($row['result'], 2, '.', '') ?>/10</td>
                            <td><?= $count ?></td>
                            <td>
                            <a href="?url=rank/print&id=<?= $row['result_id'] ?>&rank=<?= $count ?>"><i class="fa fa-print" aria-hidden="true"></i></a>
                            </td>
                            <?php $count++ ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>