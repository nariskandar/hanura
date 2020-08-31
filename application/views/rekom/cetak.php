<?php 
// var_dump($rekomendasi);
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
                    <td width="60%"><?= $rekomendasi[0]['geo_prov_nama']; ?></td>
                    <td width="60%"><?= $rekomendasi[0]['geo_kab_nama']; ?></td>
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
                    <td width="60%"><?= $rekomendasi[0]['nama_calon']; ?></td>
                    <td width="60%"><?= $rekomendasi[0]['nama_pasangan']; ?></td>
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
                    <td width="120%"><?= $rekomendasi['0']['total_kursi']; ?></td>
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
                <?php foreach ($datakursi as $dk => $value) : ?>
                <tr>
                    <td width="10%"><?= $no; ?></td>
                    <td width="25%"><?= $value['partai']; ?></td>
                    <td width="25%"><?= $value['total_kursi']; ?></td>
                    <td width="25%"><?= strtoupper ($value['nama_jenis_surat']); ?></td>
                    <td width="25%"><?= $value['no_surat']; ?></td>
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
                    <td width="10%"><?= $rekomendasi['0']['catatan']; ?></td>
                </tr>
            </table>
        </li>
<br>
<br>

    </ul>

    <p style="margin-top:0pt; margin-bottom:8pt; line-height:108%; font-size:12pt"><span style="font-family:Calibri; color:#ff0000">&#xa0;</span></p>
</div>



















