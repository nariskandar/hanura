<?php
// var_dump($rekomendasi);die;
// foreach ($rekomendasi as $key => $value) {
//     var_dump($value['nama_partai']);die;
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
    <p style="font-size: 11px" style="text-align:right;">
    Tanggal : 
    <?= date("j F Y");?> 
    </p>
    <ul type="disc" style="margin:0pt; font-size: 10px; padding-left:0pt">

        <!-- <h4 style="font-size: 12px"> PARTAI PENGUSUNG</h4> -->
        <li>
            <table width="100%" cellspacing="1" cellpadding="1%" border="1">
                <tr>
                    <th width="10%"><strong>No</strong></th>
                    <th width="30%"><strong>Provinsi</strong></th>
                    <th width="30%"><strong>Kab/Kota</strong></th>
                    <th width="30%"><strong>Nama Calon</strong></th>
                    <th width="30%"><strong>Nama Pasangan</strong></th>
                    <th width="30%"><strong>Partai</strong></th>
                    <th width="10%"><strong>Syarat</strong></th>
                    <th width="10%"><strong>Total Kursi</strong></th>
                </tr>
                <?php $no=1; ?>
                <?php foreach ($rekomendasi as $key => $value) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $value['geo_prov_nama']; ?></td>
                    <td><?= $value['geo_kab_nama']; ?></td>
                    <td><?= $value['nama_calon']; ?></td>
                    <td><?= $value['nama_pasangan']; ?></td>
                    <td><?= $value['nama_partai']; ?></td>
                    <td><?= $value['syarat']; ?></td>
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