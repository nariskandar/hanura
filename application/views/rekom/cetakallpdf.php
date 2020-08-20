<?php
// foreach ($rekomendasi as $key => $value) {
//     var_dump($value);
// }


?>


<style>    
</style>
<div>
    <p></p>

    <!-- HEADER -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <td width="10%">
                <table cellspacing="5" cellpadding="0" width="100%">
                    <tr><td><img src="<?= base_url('assets/images/hanura.png') ?>" width="70" height="40" alt=""></td></tr>
                </table>
            </td>
            <td width="80%" align="center">
                <table cellspacing="0" cellpadding="5" border="0">
                    <tr><td style="font-size: 14px"><b>BAKAL CALON KEPALA DAERAH YANG MENYERAHKAN SURAT TUGAS/REKOMENDASI PARTAI LAIN KE TIM PILKADA PUSAT DPP PARTAI HANURA</b></td></tr>
                </table>
            </td>
            <td width="10%">
                <table cellspacing="5" cellpadding="0" width="100%">
                <tr><td></td></tr>
                </table>
            </td>
        </tr>
    </table>
    
    <hr size="1" noshade="" style="width:100%; color:#000000; background-color:#000000" />
    <p style="font-size: 10px"></span></p>
    <ul type="disc" style="margin:0pt; font-size: 10px; padding-left:0pt">


        <h4 style="font-size: 12px"> PARTAI PENGUSUNG</h4>
        <li>
            <table width="100%" cellspacing="1" cellpadding="1%" border="1">
                <tr>
                    <th width="10%"><strong>No</strong></th>
                    <th width="30%"><strong>Provinsi</strong></th>
                    <th width="30%"><strong>Kab/Kota</strong></th>
                    <th width="30%"><strong>Nama Calon</strong></th>
                    <th width="30%"><strong>Nama Pasangan</strong></th>
                    <th width="15%"><strong>Total Kursi</strong></th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($rekomendasi as $key => $value) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value['geo_prov_nama']; ?></td>
                    <td><?= $value['geo_kab_nama']; ?></td>
                    <td><?= $value['nama_calon']; ?></td>
                    <td><?= $value['nama_pasangan']; ?></td>
                    <td><?= $value['total_kursi']; ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </table>
        </li>

    </ul>
<br>
<br>

    <p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:12pt"><span style="font-family:Calibri; color:#ff0000">&#xa0;</span></p>
</div>




















<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">

    <div class="row">
        <div class="col-md-12">
        <h4 style="text-align:center; font-weight: bold;">BAKAL CALON KEPALA DAERAH YANG MENYERAHKAN SURAT TUGAS/REKOMENDASI PARTAI LAIN KE TIM PILKADA PUSAT DPP PARTAI HANURA</h4>
        <h4 style="text-align:center;">__________________________________________________________________________________</h4>
        </div>
    </div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">

<form>
        <div class="row">
            <div style="width: 33%">
                <h5 class="no-m m-b-sm">PROVINSI</h5>
                <label for=""><?=$rekomendasi['geo_prov_nama']; ?></label>
            </div>
            <div >
                <h5 style="width: 33%">KAB/KOTA</h5>
                <label for=""><?=$rekomendasi['geo_kab_nama']; ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h5 class="no-m m-b-sm">NAMA CALON</h5>
                <span><?=$rekomendasi['nama_calon']; ?></span>                            
            </div>
            <div class="col-md-3">
                <h5 class="no-m m-b-sm">NAMA PASANGAN</h5>
                <ul>
                    <li>
                    <?=$rekomendasi['nama_pasangan']; ?>        
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h5 class="no-m m-b-sm">PARTAI PENGUSUNG</h5>
                        
                <ul>
                    <?php foreach ($datakursi as $dk) : ?>
                       <li><?= $dk['partai']; ?><span class="label label-info">    
                           <?= $dk['total_kursi']; ?> Kursi</span></li> 
                       <?php endforeach; ?>
                    </ul>
                    
            </div>
            <div class="col-md-3">
                <h5 class="no-m m-b-sm">TOTAL KURSI</h5>
                <ul>
                    <li>
                    <?=$rekomendasi['total_kursi']; ?>        
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h5 class="no-m m-b-sm">CATATAN</h5>
                <ul>
                    <li>
                        <?=$rekomendasi['catatan']; ?>
                    </li>
                </ul>
            </div>
        </div>
    </form>   

</div>
</div>
</div>


    </body>
    </html>
 -->
