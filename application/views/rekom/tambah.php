<?php

?>

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

</style>

<div class="page-inner">

	<div class="page-title">
		<div class="container">
			<h3>Tambah Data Rekom</h3>
		</div>
	</div>

	<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

	<div id="main-wrapper" class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">

						<form action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id_rekom" id="id_rekom">

							<div class="row">
								<div class="col-md-6">
									<h4 class="no-m m-b-sm">Provinsi</h4>
									<select name="provinsi" id="provinsi" class="js-states form-control" tabindex="-1"
										style="display: none; width: 100%">
										<option>-- Pilih Provinsi --</option>
										<?php
                                foreach ($provinsi as $prov) {
                                    echo '<option value="'.$prov->geo_prov_id.'">'.$prov->geo_prov_nama.'</option>';
                                }
                            ?>
									</select>

								</div>

								<div class="col-md-6">
									<h4 class="no-m m-b-sm">Kota / Kabupaten</h4>
									<select name="kab" id="kab" class="js-states form-control" tabindex="-1"
										style="display: none; width: 100%">
										<option value="">-- Pilih Kota/Kabupaten --</option>
									</select>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-md-12">
									<h4 class="no-m m-b-sm">Nama Calon</h4>
									<select name="calon" id="calon" class="js-states form-control" tabindex="-1"
										style="display: none; width: 100%">
										<option name="calon" value="">-- Pilih Nama Calon --</option>
									</select>
									<small class="form-text text-danger"><?= form_error('calon'); ?></small>
								</div>
							</div>

							<br>

							<div class="row">
								<div class="col-md-12">
									<h4 class="no-m m-b-sm">Nama Pasangan Calon</h4>
									<!-- <input type="text" name="pasangan" id="pasangan" class="js-states form-control" tabindex="-1" style="display: none; width: 100%" readonly> -->
									<div id="pasangan">
										<input name="pasangan" type="text" class="form-control" readonly>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<h4 class="no-m m-b-sm m-t-lg">Partai Pengusung</h4>
									<table class="table">
										<thead>
											<tr>
												<td class="col-md-3">Nama Partai</td>
												<td class="col-md-2">Kursi</td>
												<td class="col-md-3">Jenis Surat</td>
												<td class="col-md-3">Nomer Jenis Surat</td>
												<td class="col-md-1">
													<button type="button" id="addRow" name="addRow"
														class="btn btn-warning"><i
															class="glyphicon glyphicon-plus"></i></button>
												</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<select name="partai[]" id="partai" class="js-states form-control"
														tabindex="-1" style="display: none; width: 100%">
														<option value="">-- Pilih Partai --</option>
													</select>
												</td>

												<td>
													<div id="total_kursi">
														<input type="text" name="total_kursi[]" class="form-control"
															value="" readonly>
													</div>
												</td>

												<td>
													<select name="jenis_surat[]" id="jenis_surat"
														class="form-control m-b-sm"> -->
														<option value="">-- Pilih Jenis Surat --</option>
														<?php
															foreach ($jenissurat as $js) {
																echo '<option value="'.$js['id_jenis_surat'].'">'.$js['nama_jenis_surat'].'</option>';
															}
														?>
														</select>


														<!-- <option id="sk" value="3">SK</option>
														<option id="st" value="4">ST</option>
														<option id="usulan_dpc" value="5">Usulan DPC</option>
														<option id="usulan_dpd" value="6">Usulan DPD</option>
														<option id="usulan_dpw" value="7">Usulan DPW</option> -->
												</td>

												<td>
													<input type="text" class="form-control" name="no_surat[]"
														id="no_surat" value="" placeholder="Nomer Jenis Surat">
												</td>

												<td>
													<button type="button" name="remove" id="remove" data-id=""
														class="remove">-</button>
												</td>
											</tr>
										</tbody>

									</table>
									<small class="form-text text-danger"><?= form_error('partai'); ?></small>
								</div>
							</div>

							<!-- <div class="row">
								<div class="col-md-12">
									<h4 class="no-m m-b-sm m-t-lg">Jumlah Kursi</h4>
								</div>
								<div class="col-md-3" id="total_kursi">
									<input type="text" name="total_kursi[]" class="form-control" value="" readonly>
								</div>
							</div> -->

							<div class="row">
								<div class="col-md-12">
									<h4 class="no-m m-b-sm m-t-lg">Catatan</h4>
									<textarea
										style="resize:none; margin: 0px 16px 0px 0px; height: 207px; width: 1081px;"
										class="form-control" type="text" name="catatan" id="catatan" row="4"
										cols="20"></textarea>
								</div>
							</div>

							<br>

							<div class="row pull-right">

								<div class="col-md-6">
									<a href="<?= base_url(); ?>rekom">
										<button type="button" name="kembali"
											class="btn btn-primary btn-addon m-b-sm btn-sm"><i
												class="fa fa-arrow-left"></i>Kembali</button>
									</a>
								</div>

								<div class="col-md-6">
									<a href="">
										<button type="submit" name="submit"
											class="btn btn-success btn-addon m-b-sm btn-sm">
											<i class="glyphicon glyphicon-saved"></i>Submit
										</button>
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

<script>
	$(document).ready(function () {

		$("#partai").change(function () {
			$.ajax({
				type: "GET",
				url: "<?= site_url('rekom/add_ajax_kursi');?>/",
				data: {
					"geo_prov_id": $("#provinsi").val(),
					"geo_kab_id": $("#kab").val(),
					"id_partai": $(this).val()
				},
				success: function (resp) {
					$("#total_kursi").html(resp)
				},
				error: function () {}
			})
			return false;
		})
	});

	function makeid(length) {
		var result = '';
		var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		var charactersLength = characters.length;
		for (var i = 0; i < length; i++) {
			result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}
		return result;
	}

	$(function () {
		$('#addRow').click(function () {

			var generate = makeid(4);
			var id_partai = 'partai' + generate;
			var id_kursi = 'kursi' + generate;
			var id_jenis_surat = 'jenis_surat' + generate;
			var id_no_surat = 'no_surat' + generate;

			var html =
				`<tr>
            <td>
                <select name="partai[]" id="${id_partai}" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                        <option value="">-- Pilih Partai --</option>
                </select>
            </td>

            <td>
                <div id="${id_kursi}">
                    <input type="text" name="total_kursi[]" class="js-states form-control" value="" readonly>
                </div>
            </td>
            
            <td>
                <select name="jenis_surat[]" id="${id_jenis_surat}" class="js-states form-control">
                    <option value="">-- Pilih Jenis Surat --</option>
                    <option id="sk" value="3">SK</option>
                    <option id="st" value="4">ST</option>
                    <option id="usulan_dpc" value="5">Usulan DPC</option>
                    <option id="usulan_dpd" value="6">Usulan DPD</option>
                    <option id="usulan_dpw" value="7">Usulan DPW</option>
                </select>
            </td>

            <td>
                <input type="text" class="form-control" name="no_surat[]" id="${id_no_surat}" value="" placeholder="Nomer Jenis Surat">
            </td>
            
            <td>
                <button type="button" name="remove" id="remove" data-id=""
                    class="remove">-</button>
            </td>
        </tr>`;

			$('tbody').append(html);
			$('#partai option').clone().appendTo('#' + id_partai);

			$('#' + id_partai).select2('');

			$('#' + id_partai).change(function () {
				// $("#calon").val("").trigger("change");
				$.ajax({
					type: "GET",
					url: "<?= site_url('rekom/add_ajax_kursi');?>/",
					data: {
						"geo_prov_id": $("#provinsi").val(),
						"geo_kab_id": $("#kab").val(),
						"id_partai": $(this).val()
					},
					success: function (resp) {
						$('#' + id_kursi).html(resp)
					},
					error: function () {}
				})
				return false;
			})
        });

		$(document).on('click', '.remove', function () {
			var id_pengusung = $(this).data('id');
			var element = $(this);
			if (confirm("Yakin akan di hapus?")) {
				$.ajax({
					type: "POST",
					url: "<?= site_url('rekom/remove_ajax_pengusung');?>/" + id_pengusung,
					data: {
						"id_pengusung": id_pengusung
					},
					success: function (resp) {
						element.parents('tr').remove()
					}
				});
			} else {
				return false;
			}
		});
	});

</script>
