<?php if(isset($_SESSION['email'])): ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">
                                Điểm số qua các lần thi của thí sinh<br><b><?= $_SESSION['fullname']; ?></b>
                            </h2>
                        </div>
                        <?php if (count($data['result'])): ?>
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">
                                Kết quả lần thi gần nhất<br>
                                <b style="color: #f8bd32;font-size: 50px;">
                                    <?= $data['result'][0]['result']; ?>
                                </b>
                            </h2>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>ID no.</th>
                                        <th>Đề thi</th>
                                        <th>Chủ đề</th>
                                        <th>Cấp độ</th>
                                        <th>Số câu đúng/Tổng số câu</th>
                                        <th>Điểm thi</th>
                                        <th>xem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; foreach ($data['result'] as $result): ?>
                                    <?php
                                        $item = explode("/",$result['result']);
                                        $score = $item[0]*(10/$item[1]);
                                    ?>
                                    <tr class="alert" role="alert">
                                        <th scope="row"><?= $count; ?></th>
                                        <td><?= $result['subject_name']; ?></td>
                                        <td><?= $result['name']; ?></td>
                                        <td><?= $result['level']; ?></td>
                                        <td><?= $result['result']; ?></td>
                                        <td><?= number_format($score, 2, '.', '') ?>/10</td>
                                        <td>
                                            <a href="?url=detail/exxecute/<?= $result['result_id']; ?>" class="test-detail">Xem chi tiết</a>
                                        </td>
                                    </tr>
                                    <?php $count++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php else: ?>
    <a class="container h-100 d-flex justify-content-center align-items-center" href="?url=login">Vui lòng đăng nhập để xem lịch sử thi</a>
<?php endif; ?>