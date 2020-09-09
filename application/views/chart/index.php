<?php

$arr_color = [
    array("name" => "NOT_FOUND", "color" => "#EFEFEF"),
    array("name" => "PDIP", "color" => "#D71921"),
    array("name" => "NASDEM", "color" => "#263883"),
    array("name" => "GOLKAR", "color" => "#CEC700"),
    array("name" => "DEMOKRAT", "color" => "#060695"),
    array("name" => "GERINDRA", "color" => "#C1151C"),
    array("name" => "PAN", "color" => "#050380"),
    array("name" => "PKS", "color" => "#F6CC1E"),
    array("name" => "PKB", "color" => "#089241"),
    array("name" => "PPP", "color" => "#007834"),
    array("name" => "PERINDO", "color" => "#31328B"),
    array("name" => "PKPI", "color" => "#E30016"),
    array("name" => "BERKARYA", "color" => "#E3E40D"),
    array("name" => "PSI", "color" => "#E6222C"),
    array("name" => "GARUDA", "color" => "#AA3235"),
    array("name" => "PBB", "color" => "#2E6046"),
];

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

foreach ($combine as $key => $value) {
    $color = array_search($value[1], array_column($arr_color, "name"));
    if($color === false){
        $color = 0;
    }
    $json[] = [
        'name'  => $value[1],
        'value'  => $value[2],
        'itemStyle' => [
            'color' => $arr_color[$color]['color']
        ]
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
					<div id="morris4" style="width: 100%; height : 450px"></div>
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
                					<th>Nama Partai</th>
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
    var mychart = echarts.init(document.getElementById('morris4'));

    var option = {
        series : [{
            name : "APEM JAHE",
            type : "pie",
            radius : ['50%', '65%'],
            label : {
                show : true,
                position : 'outside',
                formatter : '{b} - {c}',
            },
            labelLine : {
                show : true
            },
            data : <?php echo $hasil; ?>
        }]
    }
    mychart.setOption(option);
    /*Morris.Donut({
        element: 'morris4',            
        data: <?= $hasil ?>,
        resize: true,
        colors: ['#fcba03', '#fc6f03', '#fc3d03','#fc0f03',
        '#fcfc03', '#90fc03', '#03fc52','#03f8fc',
        '#0398fc', '#034efc', '#2403fc','#6b03fc',
        '#fc038c', '#fc0331', '#fc0303','#f55151' ],
    });*/
});



</script>


</div>
</div>
</div>

