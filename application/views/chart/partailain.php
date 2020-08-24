
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
                    <table id="table_id" class="display table"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="col-md-2">Provinsi</th>
                                <th class="col-md-2">Kab/Kota</th>
                                <th class="col-md-2">Nama Calon</th>
                                <th class="col-md-2">Nama Pasangan</th>
                                <th class="col-md-3">Pengusung</th>
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
                                <?= $value['total_kursi']; ?>
                                </td>
                                <td>
                                <a href="<?= base_url();?>rekom/detail/<?= $value['id_rekom']?>/<?= $value['geo_prov_id'] ?>/<?= $value['geo_kab_id'] ?>" type="button" class="btn btn-warning btn-xs">
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

