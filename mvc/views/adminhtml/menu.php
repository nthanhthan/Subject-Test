    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <?php if($_SESSION['is_admin'] == 0 || $_SESSION['is_admin'] == 1): ?>
                <li>
                    <a href="?url=dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Quản lý kết quả thi</a>
                </li>
                <?php endif; ?>
                <?php if($_SESSION['is_admin'] == 0): ?>
                <li>
                    <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Quản lý sinh viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=student">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=student/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Quản lý giáo viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=teacher">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=teacher/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <?php endif; ?>
                <?php if($_SESSION['is_admin'] == 0 || $_SESSION['is_admin'] == 1): ?>
                <li>
                    <a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i> Quản lý chủ đề<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=theme">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=theme/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Quản lý câu hỏi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=question">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=question/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Quản lý đề thi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=exam">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=exam/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <?php endif; ?>
                <?php if($_SESSION['is_admin'] == 0): ?>
                <li>
                    <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Góp ý từ sinh viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=contact/list">Danh sách</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <?php endif; ?>
                <?php if($_SESSION['is_admin'] == 1): ?>
                <li>
                    <a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i> Phân loại sinh viên - đề thi<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=map">Danh sách</a>
                        </li>
                        <li>
                            <a href="?url=map/edit">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <?php endif; ?>
                <li>
                    <a href="#"><i class="fa fa-line-chart" aria-hidden="true"></i> Xếp hạng sinh viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="?url=rank">Danh sách</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>