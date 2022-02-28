<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
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
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <!-- <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/dist/img/lo.jpg" alt="User profile picture"> -->
            </div>

            <h3 class="profile-username text-center"><?= $asset->merk ?></h3>

            <p class="text-muted text-center"><?= $asset->serial_number ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>RAM</b> <a class="float-right"><?= $asset->ram ?></a>
              </li>
              <li class="list-group-item">
                <b>Penyimpanan</b> <a class="float-right"><?= $asset->type_penyimpanan ?></a>
              </li>
            </ul>


          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <!-- <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#update" data-toggle="tab">Update</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
            </ul>
          </div>/.card-header -->
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
          <!-- The timeline -->
          <div class="card-body">
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
          <!-- /.tab-pane -->


        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->