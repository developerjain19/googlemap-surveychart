<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<?php $this->load->view('admin/template/header_link'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Employed', 'Count'],
            <?php
            if (!empty($employee)) {
                foreach ($employee as $row) { ?>['<?= $row['employed'] ?>', <?= $row['employee'] ?>],
            <?php }
            } ?>

        ]);

        var options = {
            title: 'My Daily Activities',
            slices: {
                0: {
                    color: 'blue'
                },
                1: {
                    color: 'red'
                }
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

<body>
    <div>

        <div class="main-content" style="margin-left:0px">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Dynamic Dashboard</h4>
                                <div>
                                    <button onclick="history.back()" class="btn btn-dark">Back</button>
                                    <a href="<?= base_url('admin/logout') ?>" class="btn btn-light">Logout</a>
                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-sm-10"></div>
                                        <div class="col-sm-2">
                                            <a href="<?= base_url('all-records') ?>" class="btn btn-dark">List View of all record</a>
                                        </div>

                                        <div class="col-sm-9">
                                            <div id="barChart" style="width: 900px; height: 500px;"></div>
                                        </div>

                                        <div class="col-sm-3 pd-top">

                                            <h3> Courses </h3>
                                            <?php
                                            if (!empty($course)) {
                                                foreach ($course as $row) { ?>
                                                    <h6> <?= $row['course'] ?> : <?= $row['cou'] ?></h6>



                                            <?php }
                                            } ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div id="piechart" style="width: 900px; height: 500px;"></div>
                                        </div>

                                        <div class="col-sm-4 pd-top">

                                            <h3> Employed </h3>
                                            <?php
                                            if (!empty($employee)) {
                                                foreach ($employee as $row) { ?>
                                                    <h6> <?= $row['employed'] ?> : <?= $row['employee'] ?></h6>



                                            <?php }
                                            } ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <canvas id="pieChart" style="width:100%;max-width:600px"></canvas> -->
                </div>
            </div>


        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>

    </div>
    </div>

    <script>
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Element');
            data.addColumn('number', 'apply for course');
            data.addRows([

                <?php
                $arr = [];
                if (!empty($course)) {
                    foreach ($course as $row) {
                        array_push($arr, '[\'' . $row['course'] . '\',' . $row['cou'] . ']');
                    }
                }
                echo implode(', ', $arr); ?>
            ]);
            var barOptions = {

                colors: ['red'],
                bar: {
                    groupWidth: "30%"
                }
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
            chart.draw(data, barOptions);
        }
    </script>

</body>

</html>