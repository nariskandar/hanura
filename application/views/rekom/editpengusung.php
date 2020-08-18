


<style>
   #tengah {
   	width: 500px;
   	margin: 100px auto;
   }

   .remove {
   	width: 30px;
   	height: 30px;
   	font-size: 20px;
   	background-color: tomato;
   	color: white;
   	border: none;
   	border-radius: 15px;
   }

   tr:hover {
   	cursor: move;
   }
</style>

<div class="page-inner">
	<div class="page-title">
		<div class="container">
			<h3>Edit Data Pengusung</h3>
		</div>
	</div>

	<!-- KOLOM PERTAMA -->
	<div id="main-wrapper" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<h4 class="no-m m-b-sm">Provinsi</h4>
								<p class="form-control-static"><?= $datarekom->geo_prov_nama; ?></p>
							</div>
							<div class="col-md-6">
								<h4 class="no-m m-b-sm">Kota / Kabupaten</h4>
								<p class="form-control-static"><?= $datarekom->geo_kab_nama; ?></p>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<h4 class="no-m m-b-sm">Nama Calon</h4>
								<p class="form-control-static"><?= $datarekom->nama_calon; ?></p>
							</div>
							<div class="col-md-6">
								<h4 class="no-m m-b-sm">Nama Pasangan</h4>
								<p class="form-control-static"><?= $datarekom->nama_pasangan; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- KOLOM EDIT PENGUSUNG -->
	<div id="main-wrapper" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="table-responsive project-stats col-md-12">
							<form action="" method="POST" enctype="multipart/form-data">
								<?php foreach ($selected as $s) : ?>
								<input type="hidden" name="id_pengusung[]" id="id_pengusung" value="<?= $s['id_pengusung']; ?>">
								<?php endforeach; ?>
								<table class="table">
									<thead>
										<tr>
											<th class="col-md-5">Nama Partai</th>
											<th class="col-md-5">Kursi</th>
											<th class="col-md-2"></th>
										</tr>
									</thead>
									<tbody>
										<?php $clone = 0;  ?>
										<?php foreach ($selected as $s) : ?>
										<?php $clone++;  ?>
										<tr>
											<td>
												<select name="partai[]" id="partai<?= $clone; ?>" class="js-states form-control"
													tabindex="-1">
													<?php foreach ($listpartai as $lp) : ?>
													<?php if ($lp['id_partai'] == $s['id_partai'])  : ?>
													<option selected value="<?= $lp['id_partai']; ?>"><?= $lp['partai']; ?></option>
													<?php else :  ?>
													<option value="<?= $lp['id_partai']; ?>"><?= $lp['partai']; ?></option>
													<?php endif; ?>
													<?php endforeach; ?>
												</select>
											</td>
											<td>
												<div id="total_kursi<?= $clone; ?>">
													<input type="text" name="total_kursi[]" class="form-control"
														value="<?= $s['total_kursi']; ?>" readonly>
												</div>
											</td>
											<td>

												<button type="button" name="remove" id="remove" data-id="<?= $s['id_pengusung']; ?>"
													class="remove">-</button>
											</td>
											<?php endforeach; ?>
										</tr>
									</tbody>
								</table>
								<!-- <button name="button" id="addRow">+ Add</button> -->
								<div class="col-md-6">
									<button type="button" id="addRow" name="addRow"
										class="btn btn-warning btn-addon m-b-sm btn-md"><i
											class="glyphicon glyphicon-plus"></i>Tambah Pengusung</button>
									<button type="submit" id="submit" name="submit"
										class="btn btn-success btn-addon m-b-sm btn-md"><i
											class="glyphicon glyphicon-check"></i>Update</button>
								</div>
							</form>
							<!-- <button name="button" id="getValues">Get Values</button> -->
						</div>
						<!-- Row -->
					</div>
					<!-- Main Wrapper -->
				</div>
			</div>
		</div>
	</div>
</div>

<script>

var geo_prov_id = <?= $geo_prov_id ?>;
var geo_kab_id = <?= $geo_kab_id ?>;

$(document).ready(function(){

<?php $clone2 = 0;  ?>
<?php foreach ($selected as $s) : ?>
<?php $clone2++;?>

$('#partai<?=$clone2?>').on('select2:select', function (e) {
	   			// $("#calon").val("").trigger("change");
            $.ajax({
               type : "GET",
               url : "<?= site_url('rekom/edit_ajax_kursi');?>/",
               data : {
                  "geo_prov_id" : geo_prov_id, 
                  "geo_kab_id"  : geo_kab_id,
                  "id_partai" : $(this).val()
               }, 
               success:function(resp){
      
                  $('#total_kursi<?=$clone2?>').html(resp)
               },
               error:function(){
               }
            })
            // return false;
      // })
   });
<?php endforeach; ?>
});



function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}


$(function() {
   
    $('tbody').sortable();
 
    $('#addRow').click(function(){         

      var generate = makeid(4);
      var id_partai = 'partai'+generate;

      var html    = ''; 
         html    += '<tr>';
         html    += '<input type="hidden" name="id_pengusung[]" id="id_pengusung" value="0">';
         html    += '<td>';
         html    += '<select name="partai[]" id="'+id_partai+'" class="js-states form-control" tabindex="-1" >'; 
         html    += '<option value="">-- Pilih Partai --</option>';
         html    += '</select>'
         html    += '</td>';
         html    += '<td>';
         html    += '<div id="'+id_partai+'total">';
         html    += '<input class="form-control" name="total_kursi[]" type="text" readonly="">';
         html    += '</div>';
         html    += '</td>';
         html    += '<td>';
         html    += '<button class="remove">-</button>';
         html    += '</td>';
         html    +=  '</tr>';

        $('tbody').append(html);
         $('#partai1 option').clone().appendTo('#'+id_partai);

         $('#'+id_partai).select2('');
         
         $('#'+id_partai).change(function (){
	   			// $("#calon").val("").trigger("change");
                     $.ajax({
                        type : "GET",
                        url : "<?= site_url('rekom/edit_ajax_kursi');?>/",
                        data : {
                           "geo_prov_id" : geo_prov_id, 
                           "geo_kab_id"  : geo_kab_id,
                           "id_partai" : $(this).val()
                        },
                        success:function(resp){
                           $('#'+id_partai+'total').html(resp)
                        },
                        error:function(){
                        }
                     })
                  return false;
            })
         });
 
         $(document).on('click', '.remove', function(){  
            var id_pengusung = $(this).data('id');  
            var element = $(this);
           if(confirm("Yakin akan di hapus?"))  
           {  
                $.ajax({  
                     type : "POST",
                     url  : "<?= site_url('rekom/remove_ajax_pengusung');?>/"+id_pengusung,
                     data :{
                        "id_pengusung": id_pengusung
                     },  
                     success:function(resp)  
                     {  
                        element.parents('tr').remove() 
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });  
});

</script>