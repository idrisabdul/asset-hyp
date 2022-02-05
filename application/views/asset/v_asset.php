<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Asset Hypernet</h3>
                    <!-- <a href="<?= base_url('Asset/add_asset') ?>" type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</a> -->
                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-default">Tambah</button>
                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <!-- <a  class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</a> -->
                            <?php foreach ($allkategori as $ak) { ?>
                                <a href="<?= base_url('Asset/add_asset/' . $ak['kategoris_id'] . '') ?>" type="button" class="dropdown-item"><?= ucfirst($ak['nama_kategori']) ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <?php $kat = $this->uri->segment('3') ?>
                    <?php if ($kat == null) { ?>
                        <table id="example1" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Processor</th>
                                    <th>Network</th>
                                    <th>Total Port</th>
                                    <th>Transmisi</th>
                                    <th>RAM</th>
                                    <th>Penyimpanan</th>
                                    <th>S/N</th>
                                    <th>Kepemilikan</th>
                                    <th>Posisi</th>
                                    <th>Kondisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                        <td><?= ucfirst($asset['merk']) ?></td>
                                        <td><?= $asset['type'] ?></td>
                                        <td><?= $asset['processor'] ?></td>
                                        <td><?= $asset['tipe_network'] ?></td>
                                        <td><?= $asset['ttl_port'] ?></td>
                                        <td><?= $asset['transmisi'] ?></td>
                                        <td><?= $asset['ram'] != null ? $asset['ram'] : '-'; ?></td>
                                        <td><?= $asset['type_penyimpanan'] ? $asset['type_penyimpanan'] : '-';  ?></td>
                                        <td><?= $asset['serial_number'] ?></td>
                                        <td><?= $asset['nama_vendor'] ?></td>
                                        <td><?php if ($asset['id_user'] > 1) { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#"  class="btn btn-xs btn-success">
                                                    <i class="fa fa-user-check mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } else { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-user-clock mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($asset['kategori_id'] == 1) { ?>

                                                <?= anchor('cek/add_cek/' . $asset['asset_id'], '<button type="button" class="btn btn-xs btn-primary">' . $asset['nama_status'] . '
                                                    </button>') ?>
                                                <!-- <a href="<?= base_url('cek/add_cek/') ?>" >View</a> -->
                                            <?php } ?>
                                        </td>
                                        <td> <?= anchor('Asset/editAsset/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                            <!-- <button href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fa fa-eye mr-1"></i></button> -->
                                            <button onclick="deleteConfirm('<?= base_url('Asset/delete/' . $asset['asset_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    <?php } else if ($kat == 1) { ?>
                        <table id="example1" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Processor</th>
                                    <th>RAM</th>
                                    <th>Penyimpanan</th>
                                    <th>S/N</th>
                                    <th>Kepemilikan</th>
                                    <th>Posisi</th>
                                    <th>Kondisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                        <td><?= ucfirst($asset['merk']) ?></td>
                                        <td><?= $asset['type'] ?></td>
                                        <td><?= $asset['processor'] ?></td>
                                        <td><?= $asset['ram'] != null ? $asset['ram'] : '-'; ?></td>
                                        <td><?= $asset['type_penyimpanan'] ? $asset['type_penyimpanan'] : '-';  ?></td>
                                        <td><?= $asset['serial_number'] ?></td>
                                        <td><?= $asset['nama_vendor'] ?></td>
                                        <td><?php if ($asset['id_user'] > 1) { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#"  class="btn btn-xs btn-success">
                                                    <i class="fa fa-user-check mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } else { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-user-clock mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($asset['kategori_id'] == 1) { ?>

                                                <?= anchor('cek/add_cek/' . $asset['asset_id'], '<button type="button" class="btn btn-xs btn-primary">' . $asset['nama_status'] . '
                                                    </button>') ?>
                                                <!-- <a href="<?= base_url('cek/add_cek/') ?>" >View</a> -->
                                            <?php } ?>
                                        </td>
                                        <td> <?= anchor('Asset/editAsset/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                            <!-- <button href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fa fa-eye mr-1"></i></button> -->
                                            <button onclick="deleteConfirm('<?= base_url('Asset/delete/' . $asset['asset_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    <?php } else if ($kat == 2) { ?>
                        <table id="example1" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>S/N</th>
                                    <th>Kepemilikan</th>
                                    <th>Posisi</th>
                                    <th>Kondisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                        <td><?= ucfirst($asset['merk']) ?></td>
                                        <td><?= $asset['type'] ?></td>
                                        <td><?= $asset['serial_number'] ?></td>
                                        <td><?= $asset['nama_vendor'] ?></td>
                                        <td><?php if ($asset['id_user'] > 1) { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#"  class="btn btn-xs btn-success">
                                                    <i class="fa fa-user-check mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } else { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-user-clock mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($asset['kategori_id'] == 1) { ?>

                                                <?= anchor('cek/add_cek/' . $asset['asset_id'], '<button type="button" class="btn btn-xs btn-primary">' . $asset['nama_status'] . '
                                                    </button>') ?>
                                                <!-- <a href="<?= base_url('cek/add_cek/') ?>" >View</a> -->
                                            <?php } ?>
                                        </td>
                                        <td> <?= anchor('Asset/editAsset/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                            <!-- <button href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fa fa-eye mr-1"></i></button> -->
                                            <button onclick="deleteConfirm('<?= base_url('Asset/delete/' . $asset['asset_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    <?php } else if ($kat == 3) { ?>
                        <table id="example1" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Processor</th>
                                    <th>Total Port</th>
                                    <th>Transmisi</th>
                                    <th>RAM</th>
                                    <th>Penyimpanan</th>
                                    <th>S/N</th>
                                    <th>Kepemilikan</th>
                                    <th>Posisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                        <td><?= $asset['tipe_network'] ?></td>
                                        <td><?= ucfirst($asset['merk']) ?></td>
                                        <td><?= $asset['type'] ?></td>
                                        <td><?= $asset['processor'] ?></td>
                                        <td><?= $asset['ttl_port'] ?></td>
                                        <td><?= $asset['transmisi'] ?></td>
                                        <td><?= $asset['ram'] != null ? $asset['ram'] : '-'; ?></td>
                                        <td><?= $asset['type_penyimpanan'] ? $asset['type_penyimpanan'] : '-';  ?></td>
                                        <td><?= $asset['serial_number'] ?></td>
                                        <td><?= $asset['nama_vendor'] ?></td>
                                        <td><?php if ($asset['id_user'] > 1) { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#"  class="btn btn-xs btn-success">
                                                    <i class="fa fa-user-check mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } else { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-user-clock mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } ?>
                                        </td>
                                       
                                        <td> <?= anchor('Asset/editAsset/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                            <!-- <button href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fa fa-eye mr-1"></i></button> -->
                                            <button onclick="deleteConfirm('<?= base_url('Asset/delete/' . $asset['asset_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    <?php } else if ($kat == 5) { ?>
                        <table id="example1" class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>Processor</th>
                                    <th>Network</th>
                                    <th>Total Port</th>
                                    <th>Transmisi</th>
                                    <th>RAM</th>
                                    <th>Penyimpanan</th>
                                    <th>S/N</th>
                                    <th>Kepemilikan</th>
                                    <th>Posisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($allasset as $asset) { ?>

                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= ucfirst($asset['nama_kategori']) ?></td>
                                        <td><?= ucfirst($asset['merk']) ?></td>
                                        <td><?= $asset['type'] ?></td>
                                        <td><?= $asset['processor'] ?></td>
                                        <td><?= $asset['tipe_network'] ?></td>
                                        <td><?= $asset['ttl_port'] ?></td>
                                        <td><?= $asset['transmisi'] ?></td>
                                        <td><?= $asset['ram'] != null ? $asset['ram'] : '-'; ?></td>
                                        <td><?= $asset['type_penyimpanan'] ? $asset['type_penyimpanan'] : '-';  ?></td>
                                        <td><?= $asset['serial_number'] ?></td>
                                        <td><?= $asset['nama_vendor'] ?></td>
                                        <td><?php if ($asset['id_user'] > 1) { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#"  class="btn btn-xs btn-success">
                                                    <i class="fa fa-user-check mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } else { ?>
                                                <?= anchor('History/show/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-user-clock mr-1"></i>' . $asset['nama_or_lantai'] . '</button>') ?>
                                            <?php } ?>
                                        </td>
                                        <td> <?= anchor('Asset/editAsset/' . $asset['asset_id'], '<button type="button" href="#" class="btn btn-xs btn-warning">
                                                    <i class="fa fa-pen mr-1"></i></button>') ?>
                                            <!-- <button href="#!" class="btn btn-sm  btn-rounded waves-effect waves-light btn-info"><i class="fa fa-eye mr-1"></i></button> -->
                                            <button onclick="deleteConfirm('<?= base_url('Asset/delete/' . $asset['asset_id']) ?>')" href="#!" class="btn btn-xs btn-danger"><i class="fa fa-trash mr-1"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    <?php } ?>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

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

<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>