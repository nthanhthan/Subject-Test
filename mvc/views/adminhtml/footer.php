</div>
<!-- /#wrapper -->

<!--Xóa message nếu load lại trang-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>

<script>
    // Xóa message sau 3 phút
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 10000);

</script>
<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="./public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script type="text/javascript" src="./public/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script type="text/javascript" src="./public/js/sb-admin-2.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="./public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"
        src="./public/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="./public/js/script.js"></script>

</body>
</html>
