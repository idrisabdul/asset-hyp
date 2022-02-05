 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <h1>Edit Pengecekkan Perangkat</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Contact us</li>
                 </ol>
             </div>
         </div>
     </div><!-- /.container-fluid -->
 </section>

 <section class="content">
     <div class="container-fluid">
         <div class="row">
             <!-- left column -->
             <div class="col-md">
                 <!-- Horizontal Form -->
                 <div class="card card-info">
                     <div class="card-header">
                         <h3 class="card-title">Edit Form</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form class="form-horizontal" method="post" action="<?= base_url('Cek/update_cek') ?>">
                         <div class="card-body row">
                             <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                 <div class="">
                                     <?php $id = $kondisi->id_asset ?>
                                     <?php $sql = $this->db->query("SELECT * FROM assets WHERE asset_id = $id")->row() ?>
                                     <h2><strong> <?= $sql->merk ?></strong> <?= $sql->type ?></h2>
                                     <p class="lead mb-5"><?= $sql->serial_number ?><br>
                                     </p>
                                 </div>
                             </div>
                             <div class="col-7">
                                 <input type="hidden" id="kondisi_id" name="id_asset" class="form-control" value="<?= $kondisi->id_asset ?>" />
                                 <input type="hidden" id="kondisi_id" name="kondisi_id" class="form-control" value="<?= $kondisi->kondisi_id ?>" />
                                 <div class="form-group">
                                     <label for="inputName">Nama QC</label>
                                     <input type="text" id="nama_pengecek" name="nama_pengecek" class="form-control" value="<?= $kondisi->nama_pengecek ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputName">Tanggal Pengecek</label>
                                     <input type="date" id="tgl_pengecekkan" name="tgl_pengecekkan" class="form-control" value="<?= $kondisi->tgl_pengecekkan ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputName">Fisik</label>
                                     <input type="text" id="Fisik" name="fisik" class="form-control" value="<?= $kondisi->fisik ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputName">Harddisk</label>
                                     <input type="text" id="harddrive" name="harddrive" class="form-control" value="<?= $kondisi->harddrive ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputName">LCD</label>
                                     <input type="text" id="lcd" name="lcd" class="form-control" value="<?= $kondisi->lcd ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputEmail">Keyboard</label>
                                     <input type="text" id="keyboard" name="keyboard" class="form-control" value="<?= $kondisi->keyboard ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputSubject">Speaker</label>
                                     <input type="text" id="speaker" name="speaker" class="form-control" value="<?= $kondisi->speaker ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputMessage">Port USB dan LAN</label>
                                     <input type="text" id="port" name="port" class="form-control" value="<?= $kondisi->port ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputMessage">Baterai</label>
                                     <input type="text" id="baterai" name="baterai" class="form-control" value="<?= $kondisi->baterai ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputMessage">Touchpad</label>
                                     <input type="text" id="touchpad" name="touchpad" class="form-control" value="<?= $kondisi->touchpad ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="inputMessage">Charger</label>
                                     <input type="text" id="charger" name="charger" class="form-control" value="<?= $kondisi->charger ?>" />
                                 </div>
                                 <div class="form-group">
                                     <label for="vendor">Status</label>
                                     <select class="custom-select rounded-0" id="status" name="status">
                                         <option value="<?= $kondisi->status ?>"><?= $kondisi->nama_status ?></option>
                                         <?php foreach ($status as $s) { ?>
                                             <option value="<?= $s['status_cek_id'] ?>"><?= $s['nama_status'] ?></option>
                                         <?php } ?>
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="inputMessage">Keterangan</label>
                                     <textarea id="keterangan" name="keterangan" class="form-control" rows="4"><?= $kondisi->keterangan ?></textarea>
                                 </div>
                                 <div class="form-group">
                                     <input type="submit" class="btn btn-primary" value="Submit">
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
                 <!-- /.card -->

             </div>
             <!--/.col (left) -->
             <!-- right column -->

         </div>
         <!-- /.row -->
     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->