<div class="page-inner">
<div class="page-title">
    <div class="container">
        <div class="col-md-12">
            <h3>Seluruh Nama dan Pasangan Calon</h3>
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
                                <th class="col-md-1">No</th>
                                <th class="col-md-5">Nama Calon</th>
                                <th class="col-md-5">Nama Pasangan</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no=1; ?>
                            <?php foreach ($alldatacalon as $calon) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $calon['nama_calon']; ?></td>
                                <td><?= $calon['nama_pasangan']; ?></td>
                               
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

