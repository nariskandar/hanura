<?php 



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
                        <p class="counter">160</p>
                        <span class="info-box-title">Jumlah Calon Pasangan</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-users"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
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
                        <span class="info-box-title">Jumlah Kabupaten/Kota</span>
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
                        <a href="<?= base_url('rekom/hanura'); ?>">
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
                                <th>Bupati</th>
                                <th>Wakil Bupati</th>
                                <th class="col-md-3">Pengusung</th>
                                <th>Kursi</th>
                                <th>Keterangan</th>
                                <th class="col-md-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no=1; ?>
                            <?php foreach ($rekomendasi as $rek) : ?>
                            <?php $rek['pengusung']; 
                                $ico = explode(' ', $rek['pengusung'] ) ; 
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $rek['geo_prov_nama']; ?></td>
                                <td><?= $rek['geo_kab_nama']; ?></td>
                                <td>
                                    <div class="eksplisit">
                                        <?= $rek['nama_calon']; ?></td>
                                    </div>
                                <td>
                                    <div class="eksplisit">
                                        <?= $rek['nama_pasangan']; ?></td>
                                    </div>
                                <td>
                                    <div>
                                    <?php foreach ($ico as $i) : ?>
                                        <img src="<?= base_url('assets/images/partai_ico/'. $i ); ?>" width="25px" alt="">
                                    <?php endforeach; ?>
                                    </div>
                                </td>
                                <td><?= $rek['hasil_total_kursi']; ?></td>
                                <td><?= $rek['ket']; ?></td>
                                <td>

                                <a href="<?= base_url();?>rekom/detail/<?= $rek['id_rekom']?>/<?= $rek['geo_prov_id'] ?>/<?= $rek['geo_kab_id'] ?>" type="button" class="btn btn-warning btn-xs">
                                <i class="fa fa-search-plus"></i>
                                </a>

                                <a href="<?= base_url();?>rekom/editrekom/<?= $rek['id_rekom']; ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                 <a href="<?= base_url();?>rekom/delete/<?= $rek['id_rekom']; ?>" type="button" class="btn btn-danger btn-xs button-hapus"><i class="fa fa-trash"></i></a>
                                
                                <a href="<?= base_url();?>rekom/editpengusung/<?= $rek['id_rekom']?>/<?= $rek['geo_prov_id'] ?>/<?= $rek['geo_kab_id'] ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i></a>
                                <!-- data-toggle="modal" data-target="#myModal"  -->
                                </td>
                            </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
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

