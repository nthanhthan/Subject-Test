<div class="navbar-dark bg-dark">
    <nav class="navbar navbar-expand-md container navbar-dark bg-dark">
        <a href="?url=home" class="navbar-brand">
            <img src="./public/images/logo.png" height="100" width="100" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav menu-content">
                <a href="?url=home" class="nav-item nav-link active">Trang chủ</a>
                <a href="?url=info" class="nav-item nav-link">Lịch sử thi</a>
                <?php if(isset($_SESSION['email'])): ?>
                    <a href="?url=contact" class="nav-item nav-link">Góp ý</a>
                <?php endif; ?>
            </div>
            <div class="navbar-nav ml-auto menu-content">
            <?php if(isset($_SESSION['fullname'])): ?>
                <a href="?url=logout" class="nav-item nav-link">
                <i class="fas fa-sign-out-alt"></i>
                    Đăng xuất
                </a>
                <a href="?url=myself" class="nav-item nav-link">
                    <i class="fas fa-user-graduate"></i> <?= $_SESSION['fullname'] ?>
                </a>
            <?php else: ?>
                <a href="?url=register" class="nav-item nav-link">
                    <i class="fas fa-sign-in-alt"></i>
                    Đăng ký
                </a>
                <a href="?url=login" class="nav-item nav-link">
                    <i class="fa fa-lock"></i>
                    Đăng nhập
                </a>
            <?php endif; ?>
            </div>
        </div>
    </nav>
</div>