<div class="s130">
    <form method="POST" action="?url=search">
        <div class="inner-form">
            <div class="input-field first-wrap">
                <div class="svg-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>
                </div>
                <input id="search" name="q" type="text" placeholder="Tìm kiếm chủ đề bài thi" />
            </div>
            <div class="input-field second-wrap">
                <button class="btn-search" name="submit" type="submit">TÌM KIẾM</button>
            </div>
        </div>
    </form>
</div>
<?php echo $data['current_page'] ?>
<div class="container">
    <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

    <h1>Chủ đề</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
        <?php foreach ($data['theme'] as $theme): ?>
        <div class="col mb-4">
            <div class="card">
                <div class="cart-custom">
                    <div class="card-body">
                        <h5 class="card-title"><?= $theme['name']; ?></h5>
                    </div>
                    <div class="test-number">
                        <h5><?= $theme['test_number']; ?></h5>
                        <small>đề thi</small>
                    </div>
                </div>
                <a href="?url=subject/execute/<?= $theme['theme_id']; ?>" class="btn btn-detail">
                    <i class="fa fa-chevron-circle-right"></i>
                    Xem chi tiết
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php if ($data['count_page'] > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?= ($data['current_page'] == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?url=home/execute/<?= $data['current_page'] - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $data['count_page']; $i++): ?>
            <li class="page-item <?= ($data['current_page'] == $i) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?url=home/execute/<?= $i; ?>">
                    <?= $i; ?>
                </a>
            </li>
            <?php endfor; ?>
            <li class="page-item <?= ($data['current_page'] == $data['count_page']) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?url=home/execute/<?= $data['current_page'] + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>
</div>
