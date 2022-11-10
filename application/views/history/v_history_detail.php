<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Asset</h1>
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

<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?= $asset->merk ?></h3>
                    <div class="col-12">
                        <img src="<?= base_url() ?>images/<?= $asset->images ?>" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="<?= base_url() ?>images/<?= $asset->images ?>" alt="Product Image"></div>
                        <div class="product-image-thumb"><img src="<?= base_url('History/qrcode_detail/' . $asset->asset_id) ?>" alt="Product Image"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?= $asset->merk ?></h3>

                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Asset Number</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    <span class="text-l"><?= $asset->asset_number_name ?>-<?= $asset->numbering ?></span>
                                    <br>
                                </label>
                            </div>

                            <h4 class="mt-3">Serial Number</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    <span class="text-l"><?= $asset->serial_number ?></span>
                                    <br>
                                </label>
                            </div>

                            <h4 class="mt-3">Specification </h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    <span class="text-xl"><?= $asset->ram ?></span>
                                    <br>
                                    RAM
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                    <span class="text-xl"><?= $asset->type_penyimpanan ?></span>
                                    <br>
                                    Storage
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img class="border border-success" src="<?= base_url('History/qrcode_detail/' . $asset->asset_id) ?>" width="300">

                        </div>
                    </div>

                    <h4 class="mt-5">Histori Pemakaian </h4>
                    <div class="py-2 px-3">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Timeline</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Table</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Diberikan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $nomor = 1; ?>
                                            <?php foreach ($history as $htable) { ?>
                                                <tr>
                                                    <td><?= $nomor++ ?></td>
                                                    <td><?= $htable['nama_or_lantai'] ?></td>
                                                    <td><?= date("j F Y", strtotime($htable['tgl']))  ?></td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>