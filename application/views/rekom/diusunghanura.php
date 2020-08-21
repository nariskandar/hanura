<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-12">
            <h3>Data Jumlah Calon Yang Diusung Partai Hanura</h3>
        </div>
      
    </div>
</div>
<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      
<div id="main-wrapper" class="container">     
    <div class="row">

    <!-- <div class="form-group">
        <div class="col-sm-3">
            <label>Partai Pengusung</label>
            <select class="form-control m-b-sm">
                <option>-- Pilih Partai --</option>
                <option>Partai PKB</option>
                <option>Partai GERINDRA</option>
                <option>Partai PDIP</option>
                <option>Partai GOLKAR</option>
                <option>Partai HANURA</option>
            </select>
        </div>
        <div class="col-sm-2">
            <label>Partai Pengusung</label>
            <input class="form-control m-b-sm" value="4" readonly="">
            </input>
        </div>
    </div> -->
    
    
        <div class="col-md-12">

            <div class="panel panel-white">
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table id="table_id" class="display table"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="col-md-3">Provinsi</th>
                                <th class="col-md-3">Kab/Kota</th>
                                <th>Nama Calon</th>
                                <th>Nama Pasangan</th>
                                <th class="col-md-3">Pengusung</th>
                                <th>Kursi</th>
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
                                <td>

                                <a href="<?= base_url();?>rekom/detail/<?= $rek['id_rekom']?>/<?= $rek['geo_prov_id'] ?>/<?= $rek['geo_kab_id'] ?>" type="button" class="btn btn-warning btn-xs">
                                <i class="fa fa-search-plus"></i>
                                </a>
                                
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

