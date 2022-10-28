<div class="container">
    <div class="main">
        <h1><?= $data['title']; ?></h1>
    </div>
    <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>
    <div class="row">
        <div class="col-md-12">
            <?php $count = 1; foreach ($data['test'] as $test): ?>
            <article class="article article-quizz">
                <div class="quizz-details">
                    <div class="info-cards">
                        <div class="info-card">
                            <div class="info-type"><i class="fa fa-question"></i> <span>CÂU HỎI</span></div>
                            <div class="info-value"><h4><?= $test['ques_num']; ?></h4></div>
                        </div>
                        <div class="info-card">
                            <div class="info-type"><i class="fas fa-level-up-alt"></i> <span>CẤP ĐỘ</span></div>
                            <div class="info-value"><h4> <?= $test['level']; ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="quizz-description">
                    <h2>
                        <a href="http://multiple-choice.local/test">
                            <span class="quizz-id"><?= $count; ?></span>
                            <?= $test['name']; ?>
                        </a>
                    </h2>
                    <p class="quiz-excerpt"><?= $test['description']; ?></p>
                    <div class="quizz-buttons">
                        <a href="?url=test/verify/<?= $test['subject_id']; ?>" class="btn btn-secondary"">
                        <i class="fa fa-chevron-circle-right"></i>
                        Làm bài thi
                        </a>
                    </div>
                </div>
            </article>
            <?php $count++; endforeach; ?>
        </div>
    </div>
    <?php if ($data['count_page'] > 1): ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= ($data['current_page'] == 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?url=subject/execute/<?= $data['id']; ?>&page=<?= $data['current_page'] - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $data['count_page']; $i++): ?>
                    <li class="page-item <?= ($data['current_page'] == $i) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?url=subject/execute/<?= $data['id']; ?>&page=<?= $i; ?>">
                            <?= $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?= ($data['current_page'] == $data['count_page']) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?url=subject/execute/<?= $data['id']; ?>&page=<?= $data['current_page'] + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    <?php elseif($data['count_page'] <= 0): ?>
        <div class="jumbotron">
            <p style="text-align:center;">Hiện tại chưa có bài thi nào</p>
        </div>
    <?php endif; ?>
</div>