<?php
// var_dump($datakursi);
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
        <li>
            <table width="100%" cellspacing="0%" cellpadding="1%" border="0">
                <tr>
                    <td width="60%"><strong>PROVINSI</strong></td>
                    <td width="60%"><strong>KABUPATEN/KOTA</strong></td>
                </tr>
                <tr>
                    <td width="60%"><?= $rekomendasi['geo_prov_nama']; ?></td>
                    <td width="60%"><?= $rekomendasi['geo_kab_nama']; ?></td>
                </tr>
            </table>
        </li>
<br>
<br>
        <li>
            <table width="100%" cellspacing="0%" cellpadding="1%" border="0">
                <tr>
                    <td width="60%"><strong>NAMA CALON</strong></td>
                    <td width="60%"> <strong>NAMA PASANGAN</strong></td>
                </tr>
                <tr>
                    <td width="60%"><?= $rekomendasi['nama_calon']; ?></td>
                    <td width="60%"><?= $rekomendasi['nama_pasangan']; ?></td>
                </tr>
            </table>
        </li>
<br>
<br>
        <li>
            <table width="100%" cellspacing="0%" cellpadding="1%" border="0">
                <tr>
                    <td width="120%"><strong>TOTAL KURSI</strong></td>
                <tr>
                    <td width="120%"><?= $rekomendasi['total_kursi']; ?></td>
                </tr>
            </table>
        </li>
<br>
        <h4 style="font-size: 12px"> PARTAI PENGUSUNG</h4>
        <li>
            <table width="100%" cellspacing="2" cellpadding="2%" border="1">
                <tr>
                    <th width="5%"><strong>No</strong></th>
                    <th width="10%"><strong>Nama Partai</strong></th>
                    <th width="10%"><strong>Kursi</strong></th>
                    <th width="10%"><strong>Jenis Surat</strong></th>
                    <th width="10%"><strong>Nomer Surat</strong></th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($datakursi as $dk) : ?>
                <tr>
                    <td width="10%"><?= $no; ?></td>
                    <td width="25%"><?= $dk['partai']; ?></td>
                    <td width="25%"><?= $dk['total_kursi']; ?></td>
                    <td width="25%"><?= $dk['nama_jenis_surat']; ?></td>
                    <td width="25%"><?= $dk['no_surat']; ?></td>
                </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </table>
        </li>
<br>
<br>
        <h4 style="font-size: 12px">CATATAN</h4>
        <li>
            <table width="100%" cellspacing="0" cellpadding="1%" border="1">
            
                <tr>
                    <td width="10%">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</td>
                </tr>
            </table>
        </li>
<br>
<br>

    </ul>

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
