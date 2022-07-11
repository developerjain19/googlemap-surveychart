<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div>

        <div class="main-content" style="margin-left:0px">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">List View of all record</h4>
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

                                    <table id="example" class="table table-striped" style="width:100%; overflow-x:scroll;">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">
                                                    Sno
                                                </th>

                                                <th class="sort" data-sort="Staff_name">First Name</th>
                                                <th class="sort" data-sort="Staff_name">Last Name</th>
                                                <th class="sort" data-sort="email">AGE</th>
                                                <th class="sort" data-sort="phone">GENDER </th>
                                                <th class="sort" data-sort="date">Date</th>
                                                <th class="sort" data-sort="phone">COURSE INTERESTED IN Cert II +
                                                    Cert III + Grad</th>
                                                <th class="sort" data-sort="date">Address</th>
                                                <th class="sort" data-sort="phone">Employed (Yes/No)</th>

                                                <th class="sort" data-sort="status">Citizen/PR (Yes/No)</th>
                                                <th class="sort" data-sort="action">Work VISA (Yes/No)</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            <?php
                                            $i = 0;
                                            if (!empty($user)) {
                                                foreach ($user as $row) {
                                                    $i = $i + 1;

                                            ?>
                                                    <tr>
                                                        <th scope="row"> <?= $i ?></th>
                                                        <td class="lead_name"><?= $row['fname'] ?></td>
                                                        <td class="lead_name"><?= $row['lname'] ?></td>
                                                        <td class="email"><?= $row['age'] ?></td>
                                                        <td class="phone"><?= $row['gender'] ?></td>
                                                        <td class="date"> <?php echo convertDatedmy($row['date']); ?></td>
                                                        <td class="phone"><?= $row['course'] ?></td>
                                                        <td class="phone"><?= $row['address'] ?></td>
                                                        <td class="phone"><button><?= $row['employed']  ?></button></td>
                                                        <td class="phone"><button><?= (($row['citizen'] == '0') ? 'Yes' : 'No')  ?></button></td>
                                                        <td class="phone"><button><?= (($row['visa'] == '0') ? 'Yes' : 'No')  ?></button></td>


                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>


    </div>
    </div>
</body>

</html>