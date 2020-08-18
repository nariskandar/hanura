<!DOCTYPE html>
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
                <h5 class="no-m m-b-sm">JENIS SURAT</h5>
                <ul>
                    <li>
                    <?=$rekomendasi['ket']; ?>
                    <?=$rekomendasi['no_ket']; ?>        
                    </li>
                </ul>
            </div>
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

