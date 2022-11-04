<div class="container" style="margin-top:8rem;margin-bottom:12.67rem;">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="./public/images/student.png" alt="">
                            </div>
                            <h5 class="user-name text-dark"><?= $_SESSION['fullname'] ?></h5>
                            <h6 class="user-email text-dark"><?= $_SESSION['email'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="h-100">
                <div id="report" style="width: 850px; height: 500px;"></div>
            </div>
        </div>
    </div>
</div>
<?php $arr = json_encode($data['report']); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    var arr = [['Đề thi', 'Số lần test']];
    var data = <?= $arr ?>;

    for(x of data){
        arr.push([x.cnt,x.name])
    }  

    function drawChart() {
        var data = google.visualization.arrayToDataTable(arr);

        var options = {
            chart: {
            title: 'Thống kê số lần test theo đề thi'
            },
            bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('report'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>