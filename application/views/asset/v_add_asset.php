 <!-- Content Header (Page header) -->
 <section class="content-header">
     <div class="container-fluid">
         <div class="row mb-2">
             <div class="col-sm-6">
                 <?php $id = $this->uri->segment('3') ?>
                 <?php $sql = $this->db->query("SELECT * FROM kategori WHERE kategoris_id = $id")->row() ?>
                 <h1>Penambahan <?= ucfirst($sql->nama_kategori) ?></h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Penambahan Asset</li>
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
                         <h3 class="card-title">Horizontal Form</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <?php echo validation_errors(); ?>
                     <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= base_url('Asset/InsertAsset') ?>">
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-2"></div>
                                 <div class="col-md-8">

                                     <input type="hidden" name="kategori_id" value="<?= $this->uri->segment('3') ?>">

                                     <?php if ($id == 5) { ?>

                                         <div class="form-group row">
                                             <label for="vendor" class="col-sm-2 col-form-label">Sub Kategori</label>
                                             <div class="col-sm-10">
                                                 <select class="custom-select rounded-0" id="tipe_network" name="tipe_network">
                                                     <!-- <option disabled selected value>-- Pilih --</option>
                                                     <option value="Voip">Voip</option>
                                                     <option value="Projector">Projector</option>
                                                     <option value="Monitor">Monitor</option>
                                                     <option value="SSD">SSD</option>
                                                     <option value="Keyboard">Keyboard</option>
                                                     <option value="RAM">RAM</option>
                                                     <option value="NIC">NIC</option> -->
                                                     <option disabled selected value>-- Pilih --</option>
                                                     <?php foreach ($allsubkategori as $subkategori) { ?>
                                                         <option value="<?= $subkategori['kategoris_id'] ?>"><?= $subkategori['nama_kategori'] ?></option>
                                                     <?php } ?>
                                                 </select>

                                             </div>
                                         </div>
                                     <?php } ?>

                                     <div class="form-group row" id="select_ass_num">
                                         <label for="vendor" class="col-sm-2 col-form-label">Pilih Asset Number</label>
                                         <div class="col-sm-10">
                                             <select class="custom-select rounded-0" id="select_ass_num" name="select_ass_num">
                                                 <option disabled selected value>-- Pilih --</option>
                                                 <?php foreach ($allasset_number as $an) { ?>
                                                     <option value="<?= $an->asset_num_id ?>"><?= $an->asset_number_name ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Asset Number *</label>
                                         <div class="col-sm-7">
                                             <input type="text" class="form-control rounded-0" id="asset_number_txtowe" name="dummy" placeholder="Asset Number" value="Automatis" disabled>
                                             <input type="hidden" class="form-control rounded-0" id="asset_number_txt" name="asset_number_txt" placeholder="Asset Number" value="">
                                             <input type="hidden" class="form-control rounded-0" id="id_asset_number" name="id_asset_number" placeholder="Merk" value="">
                                             <input type="hidden" class="form-control rounded-0" id="numbering" name="numbering" placeholder="Manual" required value="<?= set_value('numbering'); ?>">
                                             <?= form_error('numbering', '<small class="text-danger pl-3">', '</small>'); ?>
                                         </div>
                                         <div class="col-sm-3">
                                             <input type="button" class="btn btn-info" id="asset_number_btn" value="Manual Asset Number">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="merk" for="exampleInputFile" class="col-sm-2 col-form-label">Upload Foto</label>
                                         <div class="col-sm-10 input-group">
                                             <!-- <input type="file" class="form-control rounded-0" name="images"> -->
                                             <div class="custom-file">
                                                 <input type="file" class="custom-file-input" name="images" id="exampleInputFile">
                                                 <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                             </div>
                                             <div class="input-group-append">
                                                 <span class="input-group-text">Upload</span>
                                             </div>
                                         </div>
                                     </div>
                                     
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Merk *</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" required id="merk" name="merk" required placeholder="Merk">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="model" class="col-sm-2 col-form-label">Type *</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="type" required name="type" placeholder="Type">
                                         </div>
                                     </div>
                                     <?php if ($id != 9) { ?>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Processor</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="sn" name="processor" placeholder="Processor">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">S/N</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="sn" name="serial_number" placeholder="Serial Number">
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <?php if ($id == 1) { ?>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">RAM</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="ram" name="ram" placeholder="RAM">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Penyimpanan</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="type_penyimpanan" name="type_penyimpanan" placeholder="Tipe Hard drive">
                                             </div>
                                         </div>
                                     <?php } elseif ($id == 3) { ?>
                                         <div class="form-group row">
                                             <label for="vendor" class="col-sm-2 col-form-label">Tipe Network</label>
                                             <div class="col-sm-10">
                                                 <select class="custom-select rounded-0" id="tipe_network" name="tipe_network">
                                                     <option disabled selected value>-- Pilih --</option>
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
                                                 <input type="text" class="form-control rounded-0" id="ttl_port" name="ttl_port" placeholder="Total Port">
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label for="model" class="col-sm-2 col-form-label">Transmisi</label>
                                             <div class="col-sm-10">
                                                 <input type="text" class="form-control rounded-0" id="transmisi" name="transmisi" placeholder="Kecepatan Transmisi">
                                             </div>
                                         </div>
                                     <?php } ?>
                                     <div class="form-group row">
                                         <label for="vendor" class="col-sm-2 col-form-label">Status *</label>
                                         <div class="col-sm-10">
                                             <select class="custom-select rounded-0" id="status_kondisi" required name="status_kondisi">
                                                 <option disabled selected value>-- Pilih --</option>
                                                 <?php foreach ($status as $s) { ?>
                                                     <option value="<?= $s['status_cek_id'] ?>"><?= $s['nama_status'] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="vendor" class="col-sm-2 col-form-label">Dari Vendor? *</label>
                                         <div class="col-sm-10">
                                             <select class="custom-select rounded-0" id="kepemilikan" name="kepemilikan" required="required">
                                                 <option required value="">-- Pilih --</option>
                                                 <?php foreach ($allvendor as $av) { ?>
                                                     <option value="<?= $av['vendor_id'] ?>"><?= $av['nama_vendor'] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Kondisi Label *</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" id="kondisi_label" required name="kondisi_label" placeholder="kondisi label">
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Tanggal Pengadaan</label>
                                         <div class="col-sm-10">
                                             <input type="date" class="form-control rounded-0" id="tgl_penambahan" name="tgl_penambahan" placeholder="Tanggal Pembelian">
                                         </div>
                                     </div>
                                     <hr>
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Tanggal Pemberian</label>
                                         <div class="col-sm-10">
                                             <input type="date" class="form-control rounded-0" id="tgl_pemberian" name="tgl_pemberian" placeholder="Tanggal Pembelian">
                                         </div>
                                     </div>
                                     <div class="form-group row" id="select_user">
                                         <label for="vendor" class="col-sm-2 col-form-label">Pindah Asset ke *</label>
                                         <div class="col-sm-10">
                                             <select class="custom-select" id="id_users" required name="nama_penerima">
                                                 <option disabled selected value>-- Pilih --</option>
                                                 <?php foreach ($allusers as $au) { ?>
                                                     <option value="<?= $au['user_id'] ?>"><?= $au['nama_or_lantai'] ?> - <?= $au['email'] ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="form-group row">
                                         <label for="merk" class="col-sm-2 col-form-label">Tidak ada dilist?</label>
                                         <div class="col-sm-10 custom-control custom-checkbox">
                                             <input class="custom-control-input" name="my_checkbox" type="checkbox" id="checkbox_inp" value="option1">
                                             <label for="checkbox_inp" id="label_checkbox" class="custom-control-label"></label>
                                         </div>
                                     </div>
                                     <div class="form-group row" id="input_user">
                                         <label for="merk" class="col-sm-2 col-form-label">Nama Penerima</label>
                                         <div class="col-sm-10">
                                             <input type="text" class="form-control rounded-0" disabled id="nama_penerima" required name="nama_penerima" placeholder="Masukkan nama penerima">
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

 <script type="text/javascript">
     $(document).ready(function() {
         $('#asset_number_btn').click(function() {
             $("#id_asset_number").val('0');
             $("#asset_number_txtowe").prop('disabled', false).attr('type', 'hidden');
             $("#numbering").attr('type', 'text').val('');
             $("#select_ass_num").prop('disabled', false);
             $("#select_ass_num").hide();
         });
     });

     $(document).ready(function() {

         $('#select_user').show();
         $('#input_user').hide();
         $('[name="my_checkbox"]').change(function() {
             if ($('#checkbox_inp').is(':checked')) {
                 $('#input_user').show();
                 $('#id_users').prop('disabled', true);
                 $('#nama_penerima').prop('disabled', false);
             } else {
                 $('#input_user').hide();
                 $('#nama_penerima').prop('disabled', true);
                 $('#id_users').prop('disabled', false);
             }
         });

     });

     $(document).ready(function() {

         $('#select_ass_num').change(function() {
             var id = $(this).val();
             //  var string_text = $(this).text();
             // alert(id);
             var string = $("#select_ass_num option:selected").text();

             $.ajax({
                 url: "<?php echo site_url('Asset/get_lastid_asset_number'); ?>",
                 method: "POST",
                 data: {
                     id: id
                 },
                 async: true,
                 dataType: 'json',
                 success: function(data) {

                     $("#asset_number_txt").val(string + '-' + data);
                     $("#asset_number_txtowe").val(string + '-' + data);
                     $("#numbering").val(data);
                     $("#id_asset_number").val(id);


                     //  alert(s);
                 }
             });
             return false;
         });

     });
 </script>
 <script>
     $(function() {
         bsCustomFileInput.init();
     });

     //  $('input[type="checkbox"]').change(function() {
     //      console.log('click');

     //  });

     $("#checkbox_inp").prop("checked", false);




     function check_Radio_Checkb(rdb_new) {
         if (!rdb_new.is(':checked')) {
             alert('no');
         } else {
             alert('yes');
             // return true;
         }
     }
 </script>
 <script src="<?= base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>