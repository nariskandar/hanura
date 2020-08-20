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
                                <th>Bupati</th>
                                <th>Wakil Bupati</th>
                                <th class="col-md-3">Pengusung</th>
                                <th>Kursi</th>
                                <th class="col-md-3">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no=1; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>JAWA BARAT</td>
                                <td>GARUT</td>
                                <td>BOAS SALOSA</td>
                                <td>SALAMPESY</td>
                                <td>8 Kursi</td>
                                <td>x</td>
                            </tr>
                        <?php $no++; ?>
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

