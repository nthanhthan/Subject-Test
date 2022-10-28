<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đề thi
                    <small><?= !empty($data['exam']['subject_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                <form action="?url=exam/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">
                    <div class="row">
                        <div class="col-12 text-right mr-5">
                            <button type="submit"
                                    class="btn btn-primary">
                                <?= !empty($data['exam']['subject_id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="id"
                           value="<?= !empty($data['exam']['subject_id']) ? $data['exam']['subject_id'] : ''; ?>"/>
                    <div class="form-group">
                        <label for="name">Tên đề thi:</label>
                        <textarea class="form-control"
                                  rows="2"
                                  placeholder="Nhập tên đề thi"
                                  id="name"
                                  name="name"
                                  required
                                  maxlength="255"><?= !empty($data['exam']['name']) ? $data['exam']['name'] : ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea class="form-control"
                                  rows="2"
                                  placeholder="Nhập mô tả thêm cho đề thi"
                                  id="description"
                                  name="description"
                                  maxlength="1000"><?= !empty($data['exam']['description']) ? $data['exam']['description'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Nhập mật khẩu cho đề thi" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Chủ đề</label>
                        <select name="theme" class="form-control" required>
                            <option value="">Vui lòng chọn chủ đề</option>
                            <?php foreach ($data['theme'] as $theme): ?>
                            <?php if ($data['exam']['theme_id'] == $theme['theme_id']): ?>
                                <option value="<?= $theme['theme_id']; ?>" selected><?= $theme['name']; ?></option>
                            <?php else: ?>
                                    <option value="<?= $theme['theme_id']; ?>"><?= $theme['name']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="time">Thời gian làm bài</label>
                        <select name="time" id="time" class="form-control" required>
                            <option value="">Vui lòng chọn thời gian làm bài</option>
                            <option value="15" <?= (isset($data['exam']['time']) && $data['exam']['time'] == 15) ? 'selected' : ''; ?>>15 phút</option>
                            <option value="30" <?= (isset($data['exam']['time']) && $data['exam']['time'] == 30) ? 'selected' : ''; ?>>30 phút</option>
                            <option value="45" <?= (isset($data['exam']['time']) && $data['exam']['time'] == 45) ? 'selected' : ''; ?>>45 phút</option>
                            <option value="60" <?= (isset($data['exam']['time']) && $data['exam']['time'] == 60) ? 'selected' : ''; ?>>60 phút</option>
                            <option value="120" <?= (isset($data['exam']['time']) && $data['exam']['time'] == 120) ? 'selected' : ''; ?>>120 phút</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level">Cấp độ</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">Vui lòng chọn cấp độ</option>
                            <option value="1" <?= (isset($data['exam']['level']) && $data['exam']['level'] == 1) ? 'selected' : ''; ?>>Nhập môn</option>
                            <option value="2" <?= (isset($data['exam']['level']) && $data['exam']['level'] == 2) ? 'selected' : ''; ?>>Cơ bản</option>
                            <option value="3" <?= (isset($data['exam']['level']) && $data['exam']['level'] == 3) ? 'selected' : ''; ?>>Nâng cao</option>
                        </select>
                    </div>
                    <?php $questionIds = implode(',', $data['mapping']) . ',' ?>
                    <input type="hidden" name="question_ids" value="<?= $questionIds; ?>">
                </form>

                <div class="form-group mt-5">
                    <label for="level">Câu hỏi</label>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">#</th>
                        <th>#ID</th>
                        <th>Câu hỏi</th>
                        <th>Cấp độ</th>
                        <th>Nhiều đáp án</th>
                        <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data['questions'] as $question): ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox"
                                       data-checked="<?= (in_array($question['question_id'], $data['mapping'])) ? 1 : 0; ?>"
                                       name="exam-ques"
                                    <?= (in_array($question['question_id'], $data['mapping'])) ? 'checked' : ''; ?>
                                       class="form-check-input question-exam"
                                       value="<?= $question['question_id'] ?>">
                            </td>
                            <td><?= $question['question_id']; ?></td>
                            <?php
                            $arr = explode(' ', $question['question_name']);
                            $name = '';
                            if (count($arr) > 20) {
                                foreach (array_slice($arr, 0, 20) as $word) {
                                    $name .= ' ' . $word;
                                }
                                $name .= '...';
                            } else {
                                $name = $question['question_name'];
                            }
                            ?>
                            <td><?= $name; ?></td>
                            <td><?= $question['level'] ?></td>
                            <td><?= $question['is_multiple'] ? 'Yes' : 'No'; ?></td>
                            <td><?= $question['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
