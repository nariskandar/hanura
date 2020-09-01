<?php
$id_partai      = array_keys($hitung[0]['id_partai']);
$nama_partai    = array_keys($hitung[0]['nama_partai']);
$list_id        = $hitung[0]['list_data'];
$count          = ($hitung[0]['count']);

$combine = [];
foreach ( $id_partai as $idx => $val ) {
    $combine[] = [ $val, $nama_partai[$idx], $count[$idx], json_encode($list_id[$val]) ];
}

$result = array_column($combine, '2');
array_multisort($result, SORT_DESC, $combine);

foreach ($hitung as $key => $value) {
    
    $data = $value['list_data'];
}


foreach ($data as $key => $value) {
    if ($key == $id_partai) {
    }  
}

// if ($data == $id_partai ) {
//     var_dump($id_partai);
//         // echo $partai_name["$nama_partai"][] = "getName";
// }


// var_dump($json = json_encode($combine)) ;

// echo "<div id='combine';>" . $json . "</div>";

foreach ($combine as $key => $value) {
    $json[] = [
        'label'  => $value[1],
        'value'  => $value[2]
    ];
}

$hasil = json_encode($json) ;


?>


<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-12">
            <h3>Chart Usungan <strong> Partai Hanura </strong> dengan Partai Lain</h3>
        </div>
    </div>
</div>

<div id="main-wrapper" class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-white">
				<div class="panel-body">
                <br>
					<div id="morris4"></div>
				</div>
                
			</div>
		</div>
        
		<div class="col-md-6">
			<div class="panel panel-white">
                <div class="panel-body">
                		<table class="table">
                			<thead>
                				<tr>
                					<th>No</th>
                					<th>Nama Parti</th>
                					<th>Jumlah</th>
                				</tr>
                			</thead>

                			<?php $no=1; ?>
                			<?php foreach ($combine as $c) : ?>
                			<?php $id_par = $c[0]; ?>
                			<tbody>
                				<tr>
                                <?php if ($no == 1) : ?>
                                    <input type="hidden" value="<?php $no; ?>">
                					<th scope="row"><img src="<?= base_url('assets/images/number-one.svg') ?>" width="25" alt=""> </th>
                                    <?php else : ?>
                					<th scope="row"><?= $no; ?></th>
                                <?php endif; ?>
                					<td>
                						<?php $url_encode = urlencode($c['3']) ;?>
                						<!-- '.$id_rekom.'/'.$geo_prov_id.'/'.$geo_kab_id -->
                						<a href="<?= base_url('chart/partailain/'.$url_encode.'/'.$id_par) ?>">
                							<span><?=  $c['1']; ?></span>
                						</a>
                					</td>
                					<td><?=  $c['2']; ?></td>
                				</tr>
                			</tbody>
                			<?php $no++; ?>
                			<?php endforeach;  ?>
                		</table>
                	</div>
				</div>
			</div>
		</div>
        
        
	</div>

</div>

<script>

// var combines = JSON.parse(document.getElementById('combine').innerHTML);
// console.log(combine);
// combines.forEach(function(combine){
//   console.log(combine.1);
// });





$( document ).ready(function() {
    Morris.Donut({
        element: 'morris4',            
        data: <?= $hasil ?>,
        
        // [
        //     {label: 'PDIP', value: 4 },
        //     {label: 'GERINDRA', value: 2 },
        //     {label: 'NASDEM', value: 2 },
        //     {label: 'PKS', value: 1 },
        //     {label: 'PSI', value: 1 },
        //     {label: 'PAN', value: 1 },
        //     {label: 'DEMOKRAT', value: 1 },
        //     {label: 'PBB', value: 1 }
        // ],
        resize: true,
        colors: ['#fcba03', '#fc6f03', '#fc3d03','#fc0f03',
        '#fcfc03', '#90fc03', '#03fc52','#03f8fc',
        '#0398fc', '#034efc', '#2403fc','#6b03fc',
        '#fc038c', '#fc0331', '#fc0303','#f55151' ],
    });
});



</script>


</div>
</div>
</div>

