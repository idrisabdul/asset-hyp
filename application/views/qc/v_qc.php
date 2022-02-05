<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Cek</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                  
                    <ul class="nav nav-pills ml-auto p-2">
                       
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="card-body">
                                <?= $this->session->flashdata('message'); ?>
                                <table id="example1" class="table table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Ex User - SN</th>
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
                                                <td><?= $kon->nama_or_lantai ?> - <?= $kon->serial_number ?></td>
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
                                                    <button href="#" data-id="<?php echo $kon->kondisi_id ?>" data-target="#deleteModal" id="hapus"  class="btn btn-xs btn-danger" data-toggle="modal"><i class="fa fa-trash mr-1"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                     
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Default box -->
    <!-- <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2>Admin<strong>LTE</strong></h2>
                    <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                        Phone: +1 234 56789012
                    </p>
                </div>
            </div>
            <div class="col-7">
                <div class="form-group">
                    <label for="inputName">Tanggal Pengecekkan</label>
                    <input type="date" id="tgl" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputName">Fisik</label>
                    <input type="text" id="Fisik" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputName">Harddisk</label>
                    <input type="text" id="inputName" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputName">LCD</label>
                    <input type="text" id="inputName" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">Keyboard</label>
                    <input type="email" id="inputEmail" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">Speaker</label>
                    <input type="text" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Port USB dan LAN</label>
                    <input type="text" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Baterai</label>
                    <input type="text" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Touchpad</label>
                    <input type="text" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Charger</label>
                    <input type="text" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">Keterangan</label>
                    <textarea id="inputMessage" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Send message">
                </div>
            </div>
        </div>
    </div> -->

</section>
<!-- /.content -->


<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('Cek/delete') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        <input type="hidden" name="id_asset" value="<?= $this->uri->segment('3') ?>">
                        <input type="hidden" name="kondisi_id" id="kondisiid">
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class=" btn btn-danger">Hapus</button>
            </form>
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