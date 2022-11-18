<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="https://hipernet.bumenet.com/">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $ttl_laptop ?></h3>

                        <p>Laptop dan PC</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                    </div>
                    <a href="<?= base_url('Asset/filter/1') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $ttl_printer ?></h3>

                        <p>Printer</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-print" aria-hidden="true"></i>
                    </div>
                    <a href="<?= base_url('Asset/filter/2') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $ttl_furniture ?></h3>

                        <p>Furniture</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building" aria-hidden="true"></i>
                    </div>
                    <a href="<?= base_url('Asset/filter/3') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $ttl_lainnya ?></h3>

                        <p>Lainnya</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= base_url('Asset/filter/5') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Monitoring Kondisi Asset</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Asset yang perlu di QC</h3>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Eks Karyawan</th>
                                    <th>Merk Barang</th>
                                    <th>Serial Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($perlu_qc as $qc) { ?>
                                    <?php $id_asset =  $qc->asset_id ?>


                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <?php $sql = "SELECT * FROM history WHERE id_asset = '$id_asset' ORDER BY history_id DESC LIMIT 1;" ?>
                                        <?php
                                        $row_history = $this->db->query($sql)->row_array();
                                        if ($row_history == null) {
                                            $user_id = 0;
                                            $tgl = "null";
                                        } else {
                                            $user_id = $row_history['id_users'];
                                            $tgl = $row_history['tgl'];
                                        }

                                        $sql_penempatan = "SELECT * FROM penempatan WHERE user_id = $user_id";
                                        $row_penempatan = $this->db->query($sql_penempatan)->row_array();
                                        if ($row_penempatan == null) {
                                            $user = "Null";
                                        } else {
                                            $user = $row_penempatan['nama_or_lantai'];
                                        }
                                        ?>
                                        <td><?= $user ?></td>
                                        <td><?= $qc->type ?></td>
                                        <td><?= $qc->serial_number ?></td>
                                        <td><?= anchor('cek/add_cek/' . $qc->asset_id, '<button type="button" class="btn btn-xs btn-info">Pilih
                                                    </button>') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </section>


            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

                <!-- Map card -->
                <div class="card card-primary">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                            <i class="fas fa-item-marker-alt mr-1"></i>
                            Asset yang tersedia
                        </h3>
                        <!-- card tools -->
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Serial Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>
                                    <?php $id_asset =  $asset['asset_id'] ?>
                                    <?php $sql = "SELECT * FROM history WHERE id_asset = '$id_asset' ORDER BY history_id DESC LIMIT 1;" ?>
                                    <?php
                                    $row_history = $this->db->query($sql)->row_array();
                                    if ($row_history == null) {
                                        $user_id = 0;
                                        $tgl = "null";
                                    } else {
                                        $user_id = $row_history['id_users'];
                                        $tgl = $row_history['tgl'];
                                    } ?>
                                    <?php if ($user_id == 0) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                            <td><?= ucfirst($asset['merk']) ?></td>
                                            <td><?= ucfirst($asset['serial_number']) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body-->

                </div>
                <!-- /.card -->


            </section>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */


        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                <?php foreach ($status_cek as $cek) { ?> '<?= $cek->nama_status ?>',
                <?php } ?>
            ],
            datasets: [{
                data: [<?php foreach ($status_cek as $cek) { ?>
                        <?php $queri =  $this->db->query("SELECT count(*) status_kondisi FROM assets WHERE status_kondisi = $cek->status_cek_id;")->row_array() ?> '<?= $queri['status_kondisi'] ?>',
                    <?php } ?>
                ],
                backgroundColor: ['#00a65a', '#00c0ef', '#f39c12', '#f56954'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })







    })
</script>