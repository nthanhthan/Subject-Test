<?php $maxSize = floatval(ini_get('post_max_size')); ?>
<input type="hidden" value="<?= $maxSize; ?>" id="maxsize">
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
                    <small><?= !empty($data['question']['question_id']) ? 'Cập nhật' : 'Thêm mới'; ?></small>
                </h1>

                <?php require_once "./mvc/views/adminhtml/alert_message.php" ?>

                <form action="?url=question/update" method="POST" enctype="multipart/form-data" style="margin-bottom:1rem;">
                    <input type="hidden" name="id" value="<?= !empty($data['question']['question_id']) ? $data['question']['question_id'] : ''; ?>" />
                    <div class="form-group">
                        <label for="name">Nội dung câu hỏi:</label>
                        <textarea class="form-control"
                                  rows="2"
                                  placeholder="Nhập nội dung câu hỏi"
                                  id="name"
                                  name="name"
                                  required
                                  maxlength="255"><?= !empty($data['question']['question_name']) ? $data['question']['question_name'] : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh câu hỏi (không bắt buộc)</label>
                        <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" />
                    </div>
                    <div class="form-group">
                        <label for="video">Video câu hỏi (không bắt buộc)</label>
                        <input type="file" name="video" id="video" accept="video/mp4" />
                    </div>
                    <div class="form-group">
                        <label for="level">Cấp độ</label>
                        <select name="level" id="level" class="form-control" required>
                        <option value="">Vui lòng chọn cấp độ</option>
                            <option value="1" <?= (isset($data['question']['level']) && $data['question']['level'] == 1) ? 'selected' : ''; ?>>Nhập môn</option>
                            <option value="2" <?= (isset($data['question']['level']) && $data['question']['level'] == 2) ? 'selected' : ''; ?>>Cơ bản</option>
                            <option value="3" <?= (isset($data['question']['level']) && $data['question']['level'] == 3) ? 'selected' : ''; ?>>Nâng cao</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_multiple">Câu hỏi này có nhiều đáp án?</label>
                        <select name="is_multiple" class="form-control" id="is_multiple" required>
                            <option value="">Vui lòng chọn điều kiện</option>
                            <option value="1" <?= (isset($data['question']['is_multiple']) && $data['question']['is_multiple'] == 1) ? 'selected' : ''; ?>>Yes</option>
                            <option value="0" <?= (isset($data['question']['is_multiple']) && $data['question']['is_multiple'] == 0) ? 'selected' : ''; ?>>No</option>
                        </select>
                    </div>

                    <div id="form-sum" <?= !empty($data['question']['question_id']) ? '' : 'style="display: none;"'; ?>>
                        <div class="row">
                            <div class="col-sm-8">
                                <label class="visually-hidden" for="">Đáp án</label>
                            </div>
                            <div class="col-sm-2 text-center">
                                <label class="visually-hidden" for="">Đáp án đúng</label>
                            </div>
                            <div class="col-sm-2 text-center">
                                <label class="visually-hidden" for="">Xóa</label>
                            </div>
                        </div>
                        <?php if (count($data['answer'])): ?>
                        <?php $count = 1; foreach ($data['answer'] as $answer): ?>
                        <div class="row" id="form-summary">
                            <div class="row form-answer" data-count="<?= $count; ?>">
                                <div class="col-sm-8">
                            <textarea class="form-control"
                                      rows="2"
                                      placeholder="Nhập đáp án"
                                      name="answer[<?= $count; ?>][]"
                                      required
                                      maxlength="255"><?= $answer['answer_description']; ?></textarea>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           <?= $answer['is_correct'] ? 'checked' : ''; ?>
                                           name="is_correct[<?= $count; ?>][]"
                                           style="cursor: pointer">
                                </div>
                                <div class="col-sm-2 text-center answer-remove" data-count="<?= $count; ?>">
                                    <i class="fa fa-trash-o" style="font-size:23px;cursor:pointer;color:red"></i>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="row" id="form-summary">
                                <div class="row form-answer" data-count="1">
                                    <div class="col-sm-8">
                            <textarea class="form-control"
                                      rows="2"
                                      placeholder="Nhập đáp án"
                                      name="answer[1][]"
                                      required
                                      maxlength="255"></textarea>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <input class="form-check-input" type="checkbox" name="is_correct[1][]" style="cursor: pointer">
                                    </div>
                                    <div class="col-sm-2 text-center answer-remove" data-count="1">
                                        <i class="fa fa-trash-o" style="font-size:23px;cursor:pointer;color:red"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div style="margin-top: 20px;">
                            <a href="javascript: void(0)"
                               style="border-radius: 5px; border: 1px solid #288ad6; padding: 10px 20px; text-decoration: none;"
                               id="add-answer">Thêm đáp án</a>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-primary"
                            style="margin-top: 100px;">
                        <?= !empty($data['question']['question_id']) ? 'Cập nhật' : 'Thêm mới'; ?>
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>
