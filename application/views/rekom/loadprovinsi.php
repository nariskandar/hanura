<!-- <button type="button" class="btn btn-warning" onclick="filterProvinsi()">Cetaks</button> -->
<!-- <?php foreach ($filter_provinsi as $fp => $value) : ?>

<a style="display:none" href="<?= base_url('rekom/cetakbyprov/'.$value['geo_prov_id']); ?>" target="_blank">
	<button type="button" class="btn btn-warning"><i class="fa fa-file-pdf-o"></i> Cetak</button>
</a>
<?php endforeach; ?> -->


<?php $no=1;
?><?php foreach ($rekomendasi as $key=> $value) : ?><?php $value['pengusung_i'];

$ico=explode(' ', $value['pengusung_i']);

$first="";
$hanura="";
$hanuraData="";

foreach ($ico as $key=> $item) {
if ($key==0) {
$first=$item;
}

// var_dump($item);

if ($item=='hanura.ico') {
$hanura=$key;
$hanuraData=$item;
}
}

$ico[$hanura]=$first;
$ico[0]=$hanuraData;

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
<!-- <a href="#" title="Hello from speech bubble!" class="tooltip"> -->
<img src="<?= base_url('assets/images/partai_ico/'.$key); ?>" width="25px" alt="" srcset="">
<!-- </a> -->
<?php endforeach; ?>
</td>
<td>
<?= $value['syarat']; ?>
</td>
<td>
<?= $value['total_kursi']; ?>
</td>
<td>
<div class="btn-rekom">

<a href="<?= base_url();?>rekom/detail/<?= $value['id_rekomendasi']?>/<?= $value['id_rekom']; ?>/<?= $value['geo_prov_id']; ?>/<?= $value['geo_kab_id']; ?>"
	type="button" class="btn btn-warning btn-xs">
	<i class="fa fa-search-plus"></i>
</a>

<?php if ($value['id_rekom'] != null) : ?>

<a href="<?= base_url();?>rekom/editrekom/<?= $value['id_rekom']; ?>" type="button"
	class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>

<a href="<?= base_url();?>rekom/delete/<?= $value['id_rekom']; ?>/<?= $value['id_rekomendasi']?>" type="button"
	class="btn btn-danger btn-xs button-hapus"><i class="fa fa-trash"></i></a>

<a href="<?= base_url();?>rekom/editpengusung/<?= $value['id_rekom']?>/<?= $value['geo_prov_id'] ?>/<?= $value['geo_kab_id'] ?>"
	type="button" class="btn btn-info btn-xs"><i class="fa fa-flag"></i></a>

</div>

<?php endif; ?>


</td>
<?php $no++; ?>
<?php endforeach; ?>
</tr>