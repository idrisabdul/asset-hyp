<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button data-toggle="modal" data-target="#addModal" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add User Role</button>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <?php if ($this->session->flashdata('message')); ?>
                    <table id="example1" class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Hak Akses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($user_level as $ul) { ?>

                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= ucfirst($ul['username']) ?></td>
                                    <td>
                                        <?php if ($ul['user_role'] == 1) { ?>
                                            Full
                                        <?php } else { ?>
                                            Read Only
                                        <?php } ?>
                                    </td>
                                    <td> <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#editModal<?= $ul['user_id'] ?>"><i class="fa fa-edit mr-1"></i></button>
                                        <a onclick="deleteConfirm('<?= base_url('User_level/delete_userrole/' . $ul['user_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></a>
                                        <!-- <a onclick="deleteConfirm('<?= base_url('History/delete/' . $htable['history_id']) ?>')" class="btn btn-xs btn-outline-danger" href="#! ">delete</a> -->
                       
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


<!-- add ITEM MODAL -->
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
                <form action="<?= base_url('User_level/add_userrole') ?>" method="POST">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <label for="">Username</label>
                            <div class="form-group">
                                <!-- <input type="text" name="jenis" class="form-control" placeholder="Nama Lengkap" value="1" /> -->
                                <input type="text" name="username" class="form-control" placeholder="Username" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" required />
                        </div>
                        <div class="col-sm-6">
                            <label for="">Hak Akses</label>
                            <select class="custom-select rounded-0" id="user_role" name="user_role">
                                <option disabled selected value>-- Pilih --</option>
                                <option value="1">Full Access</option>
                                <option value="2">Read Only</option>
                            </select>
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

<!-- EDIT MODAL PHP -->
<?php foreach ($user_level as $ul) { ?>

    <div class="modal fade" id="editModal<?= $ul['user_id'] ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Add Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('User_level/edit_userrole') ?>" method="POST">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label for="">Username</label>
                                <div class="form-group">
                                    <!-- <input type="text" name="jenis" class="form-control" placeholder="Nama Lengkap" value="1" /> -->
                                    <input type="hidden" name="user_id" class="form-control" placeholder="user_id" value="<?= $ul['user_id'] ?>" required />
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $ul['username'] ?>" required />
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" value="<?= $ul['password'] ?>" required />
                            </div>
                            <div class="col-sm-6">
                                <label for="">Hak Akses</label>
                                <select class="custom-select rounded-0" id="user_role" name="user_role">
                                    <option value="<?= $ul['user_role'] ?>">
                                        <?php if ($ul['user_role'] == 1) { ?>
                                            []Full Access
                                        <?php } else { ?>
                                            []Read Only
                                        <?php } ?></option>
                                    <option value="1">Full Access</option>
                                    <option value="2">Read Only</option>
                                </select>
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
<?php } ?>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">User yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>