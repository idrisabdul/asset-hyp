<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#addModal" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Users</button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <?php if ($this->session->flashdata('message')); ?>
                    <table id="example1" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>User Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($user_level as $ul) { ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= ucfirst($ul['username']) ?></td>
                                    <td><?= ucfirst($ul['user_role']) ?></td>
                                    <td> <button class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-edit mr-1"></i></button>
                                        <button href="#!" class="btn btn-xs btn-info"><i class="fa fa-eye mr-1"></i></button>
                                        <button href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>


<!-- edit ITEM MODAL -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Penempatan/InsertUsers') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Nama Lengkap</label>
                            <div class="form-group">
                                <!-- <input type="text" name="jenis" class="form-control" placeholder="Nama Lengkap" value="1" /> -->
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="NIK" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status" required />
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Departemen</label>
                            <div class="form-group">
                                <input type="text" name="departemen" class="form-control" placeholder="Departemen" required />
                            </div>
                        </div>
                    </div>

                    <div class="row modal-footer">
                        <!-- <label class="btn btn-default pull-left">
                            <i class="fa fa-camera"></i> Use camera app
                            <input type="file" accept="image/*;capture=camera" capture="camera" class="hidden" />
                        </label> -->
                        <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-round waves-effect">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>