<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-12">
            <h3>Data Calon Yang Diusung <strong>Partai HANURA</strong> dan <strong>Partai <?= $partai->partai; ?></strong></h3>
        </div>      
    </div>
</div>

<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div id="main-wrapper" class="container">
     
    <div class="row">

        <div class="col-md-12">
            
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="pull-right">
                            <a href="<?= base_url('chart'); ?>">
                                <button type="submit" name="submit"
                                class="btn btn-success btn-addon m-b-sm btn-sm"><i
                                class="fa fa-close"></i>Kembali</button>
                            </a>
                        </div>
                        <table id="table_id" class="display table"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="col-md-2">Provinsi</th>
                                <th class="col-md-2">Kab/Kota</th>
                                <th class="col-md-2">Nama Calon</th>
                                <th class="col-md-2">Nama Pasangan</th>
                                <th class="col-md-3">Pengusung</th>
                                <th>Syarat</th>
                                <th>Kursi</th>
                                <th class="col-md-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no=1; ?>
                        <?php foreach ($rekom as $key => $value) : ?>
                        <?php $value['pengusung']; 
                              $ico = explode(' ', $value['pengusung'] ) ; 
                        ?>

<?php $value['pengusung'];

$ico = explode(' ', $value['pengusung'] ) ;

$first = "";
$hanura = "";
$hanuraData = "";

foreach ($ico as $key => $item) {
    if ($key == 0) {
        $first = $item;
    }
    // var_dump($item);

    if ($item == 'hanura.ico') {
        $hanura = $key;
        $hanuraData = $item;
        }
    }
    
    $ico[$hanura] = $first;
    $ico[0] = $hanuraData;
?>

                        
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $value['geo_prov_nama']; ?></td>
                                <td><?= $value['geo_kab_nama']; ?></td>
                                <td><?= $value['nama_calon']; ?></td>
                                <td><?= $value['nama_pasangan']; ?></td>
                                <td>
                                <div>
                                    <?php foreach ($ico as $i) : ?>
                                        <img src="<?= base_url('assets/images/partai_ico/'. $i ); ?>" width="25px" alt="">
                                    <?php endforeach; ?>
                                    </div>
                                </td>
                                <td>
                                <?= $value['syarat']; ?>
                                </td>
                                <td>
                                <?= $value['total_kursi']; ?>
                                </td>
                                <td>  
                                
                                <a href="<?= base_url();?>rekom/detail/<?= $value['id_rekomendasi']; ?>/<?= $value['id_rekom']; ?>/<?= $value['geo_prov_id']; ?>/<?= $value['geo_kab_id']; ?>"
                                	type="button" class="btn btn-warning btn-xs">
                                	<i class="fa fa-search-plus"></i>
                                </a>

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

