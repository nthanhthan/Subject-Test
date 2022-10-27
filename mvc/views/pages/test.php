<style>
    #exam-view{
        overflow-y: scroll;
    }
</style>
<div class="container">
    <div class="main col-8">
        <h1><?= $data['subject']['name']; ?></h1>
        <p class="description"><?= $data['subject']['description']; ?></p>
    </div>

    <div class="row">
        <div class="col-8" style="margin-bottom: 100px">
            <form action="?url=test/request" method="POST" id="request-test">
                <input type="hidden" name="test_id" value="<?= $data['subject']['subject_id']; ?>">
                <?php $count = 1; foreach ($data['question'] as $question): ?>
                <div class="quiz-question">
                    <div class="quiz-question-title">
                        <h2 class="d-flex align-items-center">
                            <span><?= $count; ?></span>
                            <div><?= $question['question_name']; ?></div>
                        </h2>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <?php if($question['image'] != ''): ?>
                            <img src="<?= $data['base_url'].'/uploads/images/'.$question['image'] ?>"
                                width=350 alt="">
                        <?php endif; ?>
                        <?php if($question['video'] != ''): ?>
                            <video controls width=350>
                                <source src="<?= $data['base_url'].'/uploads/videos/'.$question['video'] ?>">
                            </video>
                        <?php endif; ?>
                    </div>
                    <?php
                        require_once "./mvc/models/AnswerModel.php";
                        $model = new AnswerModel();
                        $answers = $model->getAnswerByQuestionId($question['question_id']);
                    ?>
                    <?php foreach ($answers as $answer): ?>
                    <div class="quiz-question-answer">
                        <div class="answer-radio">
                            <?php if ($question['is_multiple']): ?>
                                <input class="form-check-input answer-checkbox has-check"
                                       type="checkbox"
                                       name="option-<?= $answer['answer_id']; ?>"
                                       value="<?= $question['question_id']; ?>-<?= $answer['answer_id']; ?>">
                            <?php else: ?>
                            <input type="radio" data-count="<?= $count; ?>"
                                   name="option-<?= $question['question_id']; ?>"
                                   value="<?= $question['question_id']; ?>-<?= $answer['answer_id']; ?>">
                            <?php endif; ?>
                            <label for="question-1"><?= $answer['answer_description']; ?></label>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php $count++; endforeach; ?>
                <button type="submit" class="btn btn-secondary" style="margin-top: 20px; float: right">
                    <i class="fa fa-chevron-circle-right"></i>
                    Nộp bài thi
                </button>
            </form>
        </div>
        <div style="position:fixed;right:-97.5%;top:20%">
            <a class="btn btn-sm btn-primary" onclick="openNav();"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="exam-view" id="exam-view" style="display:none">
            <a class="btn btn-sm btn-danger" style="position:absolute;right:0;top:0;" onclick="closeNav();">&times;</a>
            <?php $count = 1; foreach ($data['question'] as $q): ?>
                <div class="question-view disabled" id="q-check-<?= $count; ?>">
                    <span><?= $count; ?></span>
                    <?php
                    require_once "./mvc/models/AnswerModel.php";
                    $model2 = new AnswerModel();
                    $answers2 = $model2->getAnswerByQuestionId($q['question_id']);
                    ?>
                    <?php foreach ($answers2 as $a): ?>
                        <?php if ($q['is_multiple']): ?>
                            <input class="form-check-input answer-checkbox"
                                type="checkbox"
                                id="<?= $q['question_id']; ?>-<?= $a['answer_id']; ?>">
                        <?php else: ?>
                            <input type="radio"
                                id="<?= $q['question_id']; ?>-<?= $a['answer_id']; ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php $count++; endforeach; ?>
        </div>
        <div class="col-4">
            <h3 class="another-theme">Chủ đề</h3>
            <?php foreach ($data['themes'] as $theme): ?>
            <div class="col-12 another-theme-item">
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
                    <a href="?url=subject/execute/<?= $theme['theme_id'] ?>" class="btn btn-detail">
                        <i class="fa fa-chevron-circle-right"></i>
                        Xem chi tiết
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12 another-test">
            <h3 class="another-test-title">Đề thi có liên quan</h3>
            <?php $count = 1; foreach ($data['another_exam'] as $exam): ?>
            <article class="article article-quizz">
                <div class="quizz-details">
                    <div class="info-cards">
                        <div class="info-card">
                            <div class="info-type"><i class="fa fa-question"></i> <span>CÂU HỎI</span></div>
                            <div class="info-value"><h4><?= $exam['ques_num']; ?></h4></div>
                        </div>
                        <div class="info-card">
                            <div class="info-type"><i class="fas fa-level-up-alt"></i> <span>CẤP ĐỘ</span></div>
                            <div class="info-value"><h4> <?= $exam['level']; ?></h4></div>
                        </div>
                    </div>
                </div>
                <div class="quizz-description">
                    <h2>
                        <a href="#">
                            <span class="quizz-id"><?= $count; ?></span>
                            <?= $exam['name']; ?>
                        </a>
                    </h2>
                    <p class="quiz-excerpt"> <?= $exam['description']; ?></p>
                    <div class="quizz-buttons">
                        <a href="?url=test/execute/<?= $exam['subject_id']; ?>" class="btn btn-secondary">
                        <i class="fa fa-chevron-circle-right"></i>
                        Làm bài thi
                        </a>
                    </div>
                </div>
            </article>
            <?php $count++; endforeach; ?>
        </div>
    </div>
</div>
<div class="container-fluid count-down">
    <span id="m"><?= isset($exam['time']) ? $exam['time'] : 1; ?></span> : <span id="s">00</span>
</div>
<script>
    $(document).ready(function () {
        start();
        $('#request-test input').click(function () {
            var value = $(this).val();
            var type = $(this).attr('type');
            if (type == 'radio') {
                var count = $(this).attr('data-count');
                $('#q-check-'+count+' input').prop('checked', false);
                $('#'+value).prop('checked', true);
            } else {
                $(this).toggleClass('has-check');
                if ($(this).hasClass('has-check')) {
                    $('#'+value).prop('checked', false);
                } else {
                    $('#'+value).prop('checked', true);
                }
            }
        });
    });
    function start() {
        if (typeof m !== "number") {
            m = <?= isset($exam['time']) ? $exam['time'] : 1; ?>;
            s = 0;
        }

        if (s === -1) {
            m -= 1;
            s = 59;
        }

        if (m == -1) {
            clearTimeout(timeout);
            $('#request-test').submit();
        }

        $('#m').html(m.toString());
        $('#s').html(s.toString());

        timeout = setTimeout(function () {
            s--;
            start();
        }, 1000);
    }
    function closeNav() {
        document.getElementById("exam-view").style.display = "none";
    }
    function openNav() {
        document.getElementById("exam-view").style.display = "block";
    }

</script>