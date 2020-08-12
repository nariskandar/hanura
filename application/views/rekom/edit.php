<?php 

// var_dump($rekomendasi);

?>


<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Edit Data Rekom</h3>
    </div>
    </div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="panel-body">
    </div>

            <div class="panel panel-white">
                
                <div class="panel-body">

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_rekom" id="id_rekom">
            
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="no-m m-b-sm">Provinsi</h4>
<select name="provinsi" id="provinsi" class="js-states form-control" tabindex="-1">
<?php                    
$geo_prov_id= [];
foreach ($provinsi as $prov) {
    $index  = null;
    $geo_prov_id    = $prov->geo_prov_id;
    $index = array_search($prov->geo_prov_id, array_column($rekomendasi, 'geo_prov_id'));

    if ($index !== false) {
        ?>
<option selected value="<?= $prov->geo_prov_id ?>"><?= $prov->geo_prov_nama ?></option>
<?php
    } else {
        ?>
    <option value="<?= $prov->geo_prov_id ?>"><?= $prov->geo_prov_nama ?></option>
    <?php
    }
}
?>



</select>



</div>


                <div class="col-md-6">
                    <h4 class="no-m m-b-sm">Kota / Kabupaten</h4>
                    <select name="kab" id="kab" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                        <option value="<?= $rekomendasi[0]['geo_kab_id']; ?>"> <?= $rekomendasi[0]['geo_kab_nama']; ?> </option>
                    </select>
                </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Calon</h4>
                        <select name="calon" id="calon" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                            <option name="calon" value="<?= $rekomendasi[0]['id_calon']; ?>"><?= $rekomendasi[0]['nama_calon']; ?></option>
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Pasangan Calon</h4>
                        <div id="pasangan" >
                            <input type="hidden" name="pasangan" value="<?= $rekomendasi[0]['id_pasangan']; ?>">
                            <input type="text" class="form-control" value="<?= $rekomendasi[0]['nama_pasangan']; ?>" readonly>
                            
                        </div>
                    </div>
                </div>
                
<br>

                <div class="row">

                <div class="col-md-3">
                    <h4 class="no-m m-b-sm">Jenis Surat</h4>
                    <select name="ket" id="ket" class="form-control m-b-sm">
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option id="sk" value="SK" <?php if($rekomendasi[0]['ket'] == 'SK') { ?> selected="selected"<?php } ?>>SK</option>
                        <option id="st" value="ST" <?php if($rekomendasi[0]['ket'] == 'ST') { ?> selected="selected"<?php } ?>>ST</option>
                        <option id="usulan_dpc" value="Usulan DPC" <?php if($rekomendasi[0]['ket'] == 'Usulan DPC') { ?> selected="selected"<?php } ?>>Usulan DPC</option>
                        <option id="usulan_dpd" value="Usulan DPD" <?php if($rekomendasi[0]['ket'] == 'Usulan DPD') { ?> selected="selected"<?php } ?>>Usulan DPD</option>
                        <option id="usulan_dpd" value="Usulan DPD" <?php if($rekomendasi[0]['ket'] == 'Usulan DPD') { ?> selected="selected"<?php } ?>>Usulan DPD</option>
                        <option id="usulan_dpw" value="Usulan DPW" <?php if($rekomendasi[0]['ket'] == 'Usulan DPW') { ?> selected="selected"<?php } ?>>Usulan DPW</option>
                    </select>
                   
                    <br>
                    <br>
                </div>
                <div class="col-md-3">
                    <h4 class="no-m m-b-sm">Nomer Jenis Surat</h4>
                    <input type="text" class="form-control" name="no_ket" id="no_ket" value="<?= $rekomendasi[0]['no_ket']; ?>" placeholder="">
                </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm m-t-lg">Catatan</h4>
                    <textarea style="resize:none; margin: 0px 16px 0px 0px; height: 207px; width: 1081px;" class="form-control" type="text" name="catatan" id="catatan" row="4" cols="20" ><?= $rekomendasi[0]['catatan']; ?> </textarea>
                    </div>
                </div>

                <br>

                <div class="row pull-right">
                
                <div class="col-md-4">

                        <a href="">
                            <button type="button" class="btn btn-warning btn-addon m-b-sm btn-sm"><i class="fa fa-file-pdf-o"></i>Cetak PDF</button>
                        </a>

                </div>

                <div class="col-md-4">
                        <a href="<?= base_url(); ?>rekom">
                            <button type="button" name="kembali" class="btn btn-primary btn-addon m-b-sm btn-sm"><i class="fa fa-arrow-left"></i>Kembali</button>
                        </a>
                    </div>

                
                    <div class="col-md-4">
                        <a href="">
                            <button type="submit" name="submit" class="btn btn-success btn-addon m-b-sm btn-sm"><i class="fa fa-arrow-right"></i>Lanjut</button>
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