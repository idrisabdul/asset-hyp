<script language="javascript">
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Detail Asset</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline" id="printableArea">
          <div class="card-body box-profile">
            <div class="text-center">
              <img  src="<?= base_url() ?>images/<?= $asset->images ?>" width="400"  alt="User profile picture">
            </div>
            <div class="text-center">
              <!-- <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/dist/img/lo.jpg" alt="User profile picture"> -->
            </div>

            <h3 class="profile-username text-center"><?= $asset->merk ?></h3>

            <p class="text-muted text-center"><?= $asset->serial_number ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Asset Number</b> <a class="float-right"><?= $asset->asset_number_name ?>-<?= $asset->numbering ?></a>
              </li>
              <li class="list-group-item">
                <b>QR Code</b> <a class="float-right"><img src="<?= base_url('Asset/qrcode_detail/' . $asset->asset_number_name . "-" . $asset->numbering) ?>" alt=""></a>
              </li>
              <li class="list-group-item">
                <b>RAM</b> <a class="float-right"><?= $asset->ram ?></a>
              </li>
              <li class="list-group-item">
                <b>Penyimpanan</b> <a class="float-right"><?= $asset->type_penyimpanan ?></a>
              </li>
            </ul>
            <a href="#" onclick="printDiv('printableArea')" class="btn btn-primary btn-block"><b>Cetak</b></a>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal" method="post" action="<?= base_url('History/AddHistory') ?>">

              <input type="hidden" class="form-control" id="id_asset" name="id_asset" value="<?= $asset->asset_id ?>">
              <div class="form-group row">
                <label for="vendor" class="col-sm-2 col-form-label">Pindah Asset ke</label>
                <div class="col-sm-10">
                  <select class="custom-select" id="id_users" name="id_users">
                    <option disabled selected value>-- Pilih --</option>
                    <?php foreach ($allusers as $au) { ?>
                      <option value="<?= $au['user_id'] ?>"><?= $au['nama_or_lantai'] ?> - <?= $au['email'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Pemberian</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tgl" name="tgl" placeholder="">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputSkills" class="col-sm-2 col-form-label">IP Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="ip_address" name="ip_address" placeholder="IP Address">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Timeline</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Table</a>
              </li>

            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                <div class="timeline timeline-inverse">
                  <div class="time-label">
                    <span class="bg-info">Sekarang
                    </span>
                  </div>
                  <?php foreach ($history as $h) { ?>



                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> <?= $h['ip_address'] ?></span>

                        <h3 class="timeline-header border-0"><a href="#"><?= $h['nama_or_lantai'] ?></a> Menerima Asset
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->

                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        <?= date("j F Y", strtotime($h['tgl']))  ?>
                      </span>
                    </div>
                    <!-- /.timeline-label -->


                    <!-- END timeline item -->

                  <?php } ?>
                  <div>
                    <i class="far fa-clock bg-gray"></i>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                <table id="example1" class="table table-bordered table-sm table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal Diberikan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($history as $htable) { ?>
                      <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= $htable['nama_or_lantai'] ?></td>
                        <td><?= date("j F Y", strtotime($htable['tgl']))  ?></td>
                        <td>
                          <!-- <button class="btn btn-xs btn-outline-info" data-toggle="modal" n href="#!" id="history" href="javascript:;" data-asset="<?= $htable['nama_or_lantai'] ?>" data-nama="<?= $htable['nama_or_lantai'] ?>" data-tgl="<?php echo $htable['tgl'] ?>" data-id="<?php echo $htable['history_id'] ?>" data-target="#editModal" href="#!">edit</button> -->
                          <button class="btn btn-xs btn-outline-info" data-toggle="modal" n href="#!" id="history" href="javascript:;" data-asset="<?= $htable['nama_or_lantai'] ?>" data-nama="<?= $htable['nama_or_lantai'] ?>" data-tgl="<?php echo $htable['tgl'] ?>" data-id="<?php echo $htable['history_id'] ?>" data-target="#editModal<?= $htable['history_id'] ?>" href="#!">edit</button>
                          <a onclick="deleteConfirm('<?= base_url('History/delete/' . $htable['history_id']) ?>')" class="btn btn-xs btn-outline-danger" href="#! ">delete</a>
                        </td>
                      </tr>

                    <?php } ?>
                  </tbody>

                </table>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>

        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


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
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
      </div>
    </div>
  </div>
</div>


<!-- EDIT MODAL PHP -->
<?php foreach ($history as $modal) { ?>

  <div class="modal fade" id="editModal<?= $modal['history_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit? <?= $modal['history_id'] ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('History/update_history') ?>" method="POST">
            <div class="form-group row">

              <input type="hidden" name="history_id" id="id_h" class="form-control" placeholder="Masukkan Vendor" value="<?= $modal['history_id'] ?>" />
              <input type="hidden" name="id_asset" id="id_a" class="form-control" placeholder="Masukkan Vendor" value="<?= $this->uri->segment(3) ?>" />

            </div>
            <div class="form-group row">
              <label for="vendor" class="col-sm-4 col-form-label">Ganti Asset Ke </label>
              <div class="col-sm-8">
                <select class="custom-select" id="id_users" name="id_users">
                  <option value="<?= $modal['user_id'] ?>"><?= $modal['nama_or_lantai'] ?> - <?= $modal['email'] ?></option>
                  <?php foreach ($allusers as $au) { ?>
                    <option value="<?= $au['user_id'] ?>"><?= $au['nama_or_lantai'] ?> - <?= $au['email'] ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="vendor" class="col-sm-4 col-form-label">Tanggal</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="date" name="tgl" id="tgl_h" class="form-control" placeholder="Masukkan Vendor" value="<?= $modal['tgl'] ?>" required />
                </div>
              </div>
            </div>
            <div class="row modal-footer">
              <button class="btn" type="button" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<script type="text/javascript">
  function deleteConfirm(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>

<script>
  function add() {
    $('#editModal').modal('show');
  }

  $(document).ready(function() {
    $(document).on('click', '#history', function() {

      var id = $(this).data('id');
      var tgl = $(this).data('tgl');
      var nama = $(this).data('nama');

      // alert(kd_inputatk);
      $('#id_h').val(id);
      $('#tgl_h').val(tgl);
      $('#tgl_h').val(tgl);
      $('#namaa').text(nama);
      // alert(nama);
      // $('#kode_atk').val(kode_atk);

    });
  });
</script>