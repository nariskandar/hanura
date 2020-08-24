<div class="page-inner">
    
<div class="page-title">
    <div class="container">
        <div class="col-md-12">
            <h3>Master Data Jenis Surat</h3>
        </div>      
    </div>
</div>


<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div id="main-wrapper" class="container">
    <small class="form-text text-danger"><?= form_error('nama_jenis_surat'); ?></small>
     
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="row">
                    <div class="pull-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modaltambah"><i class="fa fa-plus"></i> Tambah Data</button>
                    </div>
                </div>
   
                    <div class="panel-body">
                    <div class="table-responsive">
                    
                    <table id="table_id" class="display table"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="col-md-10">Nama Surat</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        <?php $no=1; ?>
                            <?php foreach ($surat as $s) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <!-- echo strtoupper("Hello WORLD!"); -->

                                <td><?= strtoupper ($s['nama_jenis_surat']); ?></td>
                                <td>
<button type="button" class="btn btn-info btn-xs" id="btn-edit" data-toggle="modal" data-target=".modaledit" data-id="<?= $s['id_jenis_surat']; ?>" data-nama="<?= $s['nama_jenis_surat']; ?>"><i class="fa fa-edit"></i></button>
<a href="<?= base_url();?>surat/delete_aksi/<?= $s['id_jenis_surat'];?>" type="button" id="button-hapus" class="btn btn-danger btn-xs button-hapus"><i class="fa fa-trash"></i></a>
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


<!-- MODAL TAMBAH -->
<div class="modal fade modaltambah" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mySmallModalLabel">Tambah Jenis Surat</h4>
			</div>
			<div class="modal-body">
                <form action="<?= base_url('surat/tambah_aksi') ?>" method="POST">
                <input type="text" name="nama_jenis_surat" id="nama_jenis_surat" class="form-control" placeholder="Nama Jenis Surat" style="text-transform: uppercase">

			</div>
			<div class="modal-footer">
				<a href="<?= base_url('surat/index') ?>" type="button" class="btn btn-default">Batal</a>
				<button type="submit" name="tambah" class="btn btn-success">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade modaledit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
						aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="mySmallModalLabel">Edit Jenis Surat</h4>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('surat/edit_aksi') ?>" method="POST">
                    <input type="hidden" name="id_jenis_surat" id="id_jenis_surat" value="<?= $s['id_jenis_surat']; ?>">
                    <input type="text" name="nama_jenis_surat" id="nama_jenis_surat" class="form-control" value="<?= $s['nama_jenis_surat']; ?>" style="text-transform: uppercase">
			</div>
			<div class="modal-footer">
				<a href="<?= base_url('surat/index') ?>" type="button" class="btn btn-default">Batal</a>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
            </form>
		</div>
	</div>
</div>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
    
} );

$(document).on('click', '#btn-edit', function(){
    $('.modal-body #id_jenis_surat').val($(this).data('id'));
    $('.modal-body #nama_jenis_surat').val($(this).data('nama'));
})
</script>