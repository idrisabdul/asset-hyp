 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <?php $sql = $this->db->query("SELECT * FROM kategori WHERE kategoris_id = $asset->kategori_id")->row() ?>
                 <h1>Pengeditan <?= ucfirst($sql->nama_kategori) ?></h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Pengeditan Asset</li>
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
                     <form class="form-horizontal" method="post" action="<?= base_url('Asset/UpdateAsset') ?>">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-2"></div>
                                 <div class="col-md-8">

                                     <input type="hidden" name="id" value="<?= $this->uri->segment('3') ?>">

                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Merk</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="merk" name="merk" value="<?= $asset->merk ?>" placeholder="Merk">
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label for="model" class="col-sm-2 col-form-label">Type</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="type" name="type" value="<?= $asset->type ?>" placeholder="Type">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="model" class="col-sm-2 col-form-label">Processor</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="sn" name="processor" placeholder="Processor" value="<?= $asset->processor ?>">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="model" class="col-sm-2 col-form-label">S/N</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="sn" name="serial_number" value="<?= $asset->serial_number ?>" placeholder="Serial Number">
                                         </div>
                                     </div>
                                     <?php if ($asset->kategori_id == 1) { ?>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">RAM</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="ram" name="ram" placeholder="RAM" value="<?= $asset->ram ?>">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Penyimpanan</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="type_penyimpanan" name="type_penyimpanan" value="<?= $asset->type_penyimpanan ?>" placeholder="Tipe Hard drive">
                                             </div>
                                         </div>
                                     <?php } elseif ($asset->kategori_id == 3) { ?>
                                         <div class="form-group row">
                                             <label for="vendor" class="col-sm-2 col-form-label">Tipe Network</label>
                                             <div class="col-sm-10">
                                                 <select class="custom-select rounded-0" id="tipe_network" name="tipe_network">
                                                     <option value="<?= $asset->tipe_network ?>"><?= $asset->tipe_network ?></option>
                                                     <option value="Router">Router</option>
                                                     <option value="Switch">Switch</option>
                                                     <option value="Access Point">Access Point</option>
                                                     <option value="Server">Server</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Jumlah Port</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="ttl_port" name="ttl_port" placeholder="Total Port" value="<?= $asset->ttl_port ?>">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Transmisi</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="transmisi" name="transmisi" placeholder="Kecepatan Transmisi" value="<?= $asset->transmisi ?>">
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <div class="form-group row">
                                         <label for="vendor" class="col-sm-2 col-form-label">Dari Vendor?</label>
                                         <div class="col-sm-10">
                                             <select class="custom-select rounded-0" id="kepemilikan" name="kepemilikan">
                                                 <?php $sql = $this->db->query("SELECT * FROM vendor WHERE vendor_id = $asset->kepemilikan")->row() ?>
                                                 <h1>Penambahan <?= ucfirst($sql->nama_kategori) ?></h1>
                                                 <option value="<?= $asset->kepemilikan ?>"><?= $sql->nama_vendor ?></option>
                                                 <?php foreach ($allvendor as $av) { ?>
                                                     <option value="<?= $av['vendor_id'] ?>"><?= $av['nama_vendor'] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-2"></div>
                             </div>

                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <button type="submit" class="btn btn-info">Simpan</button>
                             <a href="<?= base_url('Asset') ?>" class="btn btn-default float-right">Batal</a>
                         </div>
                         <!-- /.card-footer -->
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