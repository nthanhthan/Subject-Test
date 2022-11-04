<link rel="stylesheet" href="public/css/info.css" />
<link type="text/css" rel="stylesheet" href="./public/css/bootstrap.css"/>
<style>
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<div class="container" style="margin-top:2rem;">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100 bg-primary">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="./public/images/student.png" alt="">
                            </div>
                            <h6 class="text-white">Họ tên: <?= $data['info']['fullname'] ?></h6>
                            <h6 class="text-white">Email: <?= $data['info']['email'] ?></h6>
                            <h6 class="text-white">Ngày sinh: <?= $data['info']['birthday'] ?></h6>
                            <h6 class="text-white">Số điện thoại: <?= $data['info']['phone'] ?></h6>
                            <h6 class="text-white">Lớp: <?= $data['info']['class'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="h-100">
                <h5 class="text-dark">Đề thi: <?= $data['info']['name'] ?></h5>
                <?php
                    $item = explode("/",$data['info']['result']);
                    $score = $item[0] * (10/$item[1]);
                ?>
                <h6 class="text-dark">Số điểm đạt được: <?= number_format($score, 2, '.', '') ?>/10</h6>
                <h6 class="text-dark">Xếp hạng: <?= $data['rank'] ?></h6>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <button onclick="window.print()" id="printPageButton" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>