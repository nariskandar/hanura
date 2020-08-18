<?php


$id_partai      = array_keys($hitung[0]['id_partai']);
$nama_partai    = array_keys($hitung[0]['nama_partai']);
$count          = ($hitung[0]['count']);
// $result         = array_combine($id_partai, $nama_partai);
// $result2        = array_combine($count, $result);

// var_dump($result2);

$combine = [];
foreach ( $id_partai as $idx => $val ) {
    $combine[] = [ $val, $nama_partai[$idx], $count[$idx] ];
}

$result = array_column($combine, '2');

array_multisort($result, SORT_DESC, $combine);



// usort($combine, function($a, $b) {
//     return $a['2'] <=> $b['2'];
// });

// $id_partai = array_keys($hitung[0]['id_partai']);
// $nama_partai = array_keys($hitung[0]['nama_partai']);
// $count = ($hitun g[0]['count']);

?>



<div class="page-inner">

<div class="page-title">
    <div class="container">
        <div class="col-md-3">
            <h3>Chart Calon</h3>
        </div>
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                <div class="col-md-6 order-md-1">

                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div id="morris4"></div>
                    </div>
                
                </div>

                <div class="col-md-6 order-md-1">

                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
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

                                    <tbody>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?=  $c['1']; ?></td>
                                            <td><?=  $c['2']; ?></td>
                                        </tr>
                                    </tbody>

                                    <?php $no++; ?>
                            <?php endforeach;  ?>
                                    </table>
                    </div>
                
                </div>

                <div>

                </div>
                

            </div>
        </div>
    </div>
</div>

<script>

$( document ).ready(function() {
    Morris.Donut({
        element: 'morris4',
        data: [
            {label: 'PBB', value: 35 },
            {label: 'PKS', value: 45 },
            {label: 'GERINDRA', value: 30 },
            {label: 'PDIP', value: 20 }
        ],
        resize: true,
        colors: ['#74e4d1', '#44cbb4', '#119d85','#22BAA0'],
    });
});
</script>


</div>
</div>
</div>

