<?php

// foreach ($rekomendasi as $key => $value) {
//     var_dump($value);
// }
?>


<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-3">
            <h3>Data Rekom</h3>
        </div>
    </div>
</div>

<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?= $alldatarekom[0]['seluruh_rekom']; ?>  <span style="font-size:20px;"> / <?= $alldatacalon[0]['seluruh_calon'] ?></span style="font-size:11;"></p>
                    <a href="<?= base_url('rekom/seluruhcalon'); ?>">
                        <span class="info-box-title">Jumlah Calon Pasangan</span>
                    </a>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-users"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <?php $bar = ($alldatarekom[0]['seluruh_rekom'] * $alldatacalon[0]['seluruh_calon'] / 100) ?>
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?= $bar; ?>%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">515</p>
                        <a href="<?= base_url('rekom/seluruhkab'); ?>">
                        <span class="info-box-title">Jumlah Kabupaten/Kota</span>
                        </a>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-map"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter"><?= $jmlh_hanura[0]['hanura']; ?></p>
                        <a href="<?= base_url('rekom/diusunghanura'); ?>">
                            <span class="info-box-title">Jumlah Calon Yang Diusung Partai Hanura</span>
                        </a>
                    </div>
                    <div class="info-box-icon">
                        <img src="<?= base_url('assets/images/hanura_black.png'); ?>" width="50" alt="">
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- Row -->
</div><!-- Main Wrapper -->
      
<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="row">
                <div class="col-md-10">
                <a href="<?= base_url('rekom/cetakallpdf'); ?>" target="_blank">
                <button type="button" class="btn btn-warning" style="float: right;"><i class="fa fa-file-pdf-o"></i>  Cetak Selurh Data ke PDF</button>
                </a>
                </div>
                    <div class="pull-right">
                        <a href="<?= base_url(); ?>rekom/tambah">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                        </a>
                    </div>
                </div>
   
                    <div class="panel-body">
                    <div class="table-responsive">
                    
                    <table id="table_id" class="display table"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="col-md-3">Provinsi</th>
                                <th class="col-md-3">Kab/Kota</th>
                                <th>Calon</th>
                                <th>Pasangan</th>
                                <th class="col-md-3">Pengusung</th>
                                <th>Syarat</th>
                                <th>Kursi</th>
                                <th class="col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($rekomendasi as $key => $value) : ?>

                        <?php $value['pengusung_i'];
                            $ico = explode(' ', $value['pengusung_i'] ) ;
                        ?>


                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $value['geo_prov_nama']; ?></td>
                                <td><?= $value['geo_kab_nama']; ?></td>
                                <td>
                                    <div class="eksplisit">
                                        <?= $value['nama_calon']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="eksplisit">
                                        <?= $value['nama_pasangan']; ?>
                                    </div>
                                </td>
                                <td>
                                <?php foreach ( $ico as $key) : ?>
                                    <img src="<?= base_url('assets/images/partai_ico/'.$key); ?>" width="25px" alt="" srcset="">
                                <?php endforeach; ?>
                                </td>
                                <td>
                                <?= $value['syarat']; ?>
                                </td>
                                <td>
                                <?= $value['total_kursi']; ?>
                                </td>
                                <td>

<a href="<?= base_url();?>rekom/detail/<?= $value['id_rekom_i']?>/<?= $value['geo_prov_id'] ?>/<?= $value['geo_kab_id'] ?>" type="button" class="btn btn-warning btn-xs">
<i class="fa fa-search-plus"></i>
</a>

<a href="<?= base_url();?>rekom/editrekom/<?= $value['id_rekom_i']; ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
 <a href="<?= base_url();?>rekom/delete/<?= $value['id_rekom_i']; ?>" type="button" class="btn btn-danger btn-xs button-hapus"><i class="fa fa-trash"></i></a>

<a href="<?= base_url();?>rekom/editpengusung/<?= $value['id_rekom_i']?>/<?= $value['geo_prov_id'] ?>/<?= $value['geo_kab_id'] ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i></a>
<!-- data-toggle="modal" data-target="#myModal"  -->
                                </td>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                            </tr>

                        </tbody>
                    </table>  
                    </div>
                </div>  
            </div>
        
            
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
    
} );
</script>


</div>
</div>
</div>

