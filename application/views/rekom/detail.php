

<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Detail Data Rekom</h3>
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

            <form action="<?= base_url(); ?>rekom" enctype="multipart/form-data">
                <input type="hidden" name="id_rekom" id="id_rekom">
            
                <div class="row">

                    <div class="col-md-6">
                        <h4 class="no-m m-b-sm">Provinsi</h4>
                        <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['geo_prov_nama']; ?>" readonly="">
                    </div>

                <div class="col-md-6">
                    <h4 class="no-m m-b-sm">Kota / Kabupaten</h4>
                    <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['geo_kab_nama']; ?>" readonly="">
                </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Calon</h4>
                    <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['nama_calon']; ?>" readonly="">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Pasangan Calon</h4>
                    <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['nama_pasangan']; ?>" readonly="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-m m-b-sm m-t-lg">Partai Pengusung</h4>

                        
            <?php foreach ($datakursi as $dk) : ?>
                        <ul class="list-group list-group-flush" readonly="">
                        <li class="list-group-item"> <?= $dk['partai']; ?> <span class="label label-info"><?= $dk['total_kursi']; ?> kursi </span></li>
            <?php endforeach; ?>
                        </ul>

                    </div>

                <div class="col-md-4">
                    <h4 class="no-m m-b-sm m-t-lg">Total Kursi</h4>
                    <div id="total_kursi">
                    <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['hasil_total_kursi']; ?>" readonly="">
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <h4 class="no-m m-b-sm m-t-lg">Jenis Surat</h4>
                        <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['ket']; ?>" readonly="">
                    </div>
                    <div class="col-md-2">
                        <h4 class="no-m m-b-sm m-t-lg">Nomer Jenis Surat</h4>
                        <input type="text" class="form-control" id="input-readonly" value="<?= $rekomendasi['no_ket']; ?>" readonly="">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm m-t-lg">Catatan</h4>
                    <textarea style="resize:none; margin: 0px 16px 0px 0px; height: 207px; width: 1081px;" class="form-control" type="text" row="4" cols="20" readonly=""> <?= $rekomendasi['catatan']; ?> </textarea>
                    </div>
                </div>

                <br>

                <div class="row pull-right">
                
                <div class="col-md-6">

                        <a href="<?= base_url();?>rekom/cetakpdf/<?= $rekomendasi['id_rekom']?>/<?= $rekomendasi['geo_prov_id'] ?>/<?= $rekomendasi['geo_kab_id'] ?>" target="_blank">
                            <button type="button" class="btn btn-warning btn-addon m-b-sm btn-sm"><i class="fa fa-file-pdf-o"></i>Print PDF</button>
                        </a>

                    </div>
                
                    <div class="col-md-6">
                        <a href="<?= base_url(); ?>">
                            <button type="submit" name="submit" class="btn btn-success btn-addon m-b-sm btn-sm"><i class="fa fa-close"></i>Kembali</button>
                        </a>
                    </div>
                    
                </div>

            </form>



                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

</div>
</div>
</div>