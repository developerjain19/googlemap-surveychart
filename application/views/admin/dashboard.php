<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<?php $this->load->view('admin/template/header_link'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>

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
                                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
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
                                            <canvas id="pieChart" style="width:100%;max-width:400px"></canvas>
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

                </div>
            </div>


        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>
        <script>
            var canvasP = document.getElementById("pieChart");
            var ctxP = canvasP.getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: [<?php
                                if (!empty($employee)) {
                                    foreach ($employee as $row) { ?> '<?= $row['employed'] ?>',
                        <?php }
                                } ?>
                    ],
                    datasets: [{
                        fill: true,
                        data: [<?php
                                if (!empty($employee)) {
                                    foreach ($employee as $row) { ?> <?= $row['employee'] ?>,
                            <?php }
                                } ?>
                        ],
                        backgroundColor: ["blue", "red"]


                    }]
                },
                options: {
                    legend: {
                        display: true,
                        position: "right"
                    }
                }
            });


            canvasP.onclick = function(e) {
                var slice = myPieChart.getElementAtEvent(e);
                if (!slice.length) return; // return if not clicked on slice
                var label = slice[0]._model.label;
                switch (label) {
                    // add case for each label/slice
                    case 'Yes':
                        // alert('clicked on slice 5');
                        window.open('all-records?employed=Yes');
                        break;
                    case 'No':
                        // alert('clicked on slice 6');
                        window.open('all-records?employed=No');
                        break;
                        // add rests ...
                }
            }



            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php
                                $arr = [];
                                if (!empty($course)) {
                                    foreach ($course as $row) {
                                        array_push($arr, '\'' . $row['course'] . '\'');
                                    }
                                }
                                echo implode(', ', $arr); ?>],
                    datasets: [{
                        label: '# of Votes',
                        data: [<?php
                                $arr = [];
                                if (!empty($course)) {
                                    foreach ($course as $row) {
                                        array_push($arr, '\'' . $row['cou'] . '\'');
                                    }
                                }
                                echo implode(', ', $arr); ?>],
                        backgroundColor: 'red'


                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    onClick: function(e) {
                        var activePoints = myChart.getElementsAtEvent(e);
                        if (!activePoints.length) return; // return if not clicked on activePoints
                        var label = activePoints[0]._model.label;
                        switch (label) {
                            case 'Adv Diploma':
                                window.open('all-records?course=<?= str_replace(' ', '-', 'Adv Diploma') ?>');
                                break;
                            case 'Cert 2':
                                window.open('all-records?course=<?= str_replace(' ', '-', 'Cert 2') ?>');
                                break;

                            case 'Cert 3':
                                window.open('all-records?course=<?= str_replace(' ', '-', 'Cert 3') ?>');
                                break;
                            case 'Cert 4':
                                window.open('all-records?course=<?= str_replace(' ', '-', 'Cert 4') ?>');
                                break;
                            case 'Graduation':
                                window.open('all-records?course=Graduation');
                                break;
                            case 'Diploma':
                                window.open('all-records?course=Diploma');

                        }
                    }
                }
            });
        </script>

    </div>
    </div>



</body>

</html>