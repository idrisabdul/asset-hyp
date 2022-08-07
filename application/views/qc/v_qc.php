<div class="container-fluid">
    <div class="row mb-2">

    </div>
</div><!-- /.container-fluid -->


<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Asset Hypernet</h3>
                    <div class="btn-group float-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQc">
                            Tambah
                        </button>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <?php if ($this->session->flashdata('message')); ?>
                    <table id="example1" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Eks Karyawan</th>
                                <th>Serial Number</th>
                                <th>Fisik</th>
                                <th>Harddrive</th>
                                <th>Keyboard</th>
                                <th>Speaker</th>
                                <th>Port</th>
                                <th>Baterai</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Pemeriksa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($qc as $kon) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kon->nama_or_lantai ?></td>
                                    <td><?= $kon->serial_number ?></td>
                                    <td><?= $kon->fisik ?></td>
                                    <td><?= $kon->harddrive ?></td>
                                    <td><?= $kon->keyboard ?></td>
                                    <td><?= $kon->speaker ?></td>
                                    <td><?= $kon->port ?></td>
                                    <td><?= $kon->baterai ?></td>
                                    <td><?= $kon->keterangan ?></td>
                                    <td><?= $kon->tgl_pengecekkan ?></td>
                                    <td><?= $kon->nama_pengecek ?></td>
                                    <td> <?= anchor('Cek/edit_cek/' . $kon->kondisi_id, '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                        <button href="#" data-id="<?php echo $kon->kondisi_id ?>" data-target="#deleteModal" id="hapus" class="btn btn-xs btn-danger" data-toggle="modal"><i class="fa fa-trash mr-1"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


</section>
<!-- /.content -->



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addQc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Perlu QC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-sm table-hover">
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
                                    $user = $user_id;
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

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#hapus', function() {

            var kondisi_id = $(this).data('id');
            // alert(kondisi_id);
            $('#kondisiid').val(kondisi_id);
        });
    });
</script>