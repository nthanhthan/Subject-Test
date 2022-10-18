<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <strong>Success!</strong> <?= $_SESSION['success']; ?>
    </div>
<?php endif; ?>
<?php if (!empty($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <strong>Lỗi!</strong> <?= $_SESSION['error']; ?>
    </div>
<?php endif; ?>