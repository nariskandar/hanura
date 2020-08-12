<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Tambah Data</h3>
        <!-- <h6>YANG MENYERAHKAN SURAT TUGAS/REKOMENDASI PARTAI LAIN</h6> -->
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

            <form action="<?= base_url(); ?>tambah/add" method="post">
                <input type="hidden" name="id_rekom" id="id_rekom">

                <div class="row">

                    <div class="col-md-6">
                        <h4 class="no-m m-b-sm">Provinsi</h4>
                        <select name="provinsi" id="provinsi" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                        <option>-- Pilih Provinsi --</option>
                            <?php 
                                foreach($provinsi as $prov)
                                {
                                    echo '<option value="'.$prov->geo_prov_id.'">'.$prov->geo_prov_nama.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                <div class="col-md-6">
                    <h4 class="no-m m-b-sm">Kota / Kabupaten</h4>
                    <select name="kab" id="kab" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                        <option value="">-- Pilih Kota/Kabupaten --</option>
                    </select>
                </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Calon</h4>
                        <select name="calon" id="calon" class="js-states form-control" tabindex="-1" style="display: none; width: 100%">
                            <option value="">-- Pilih Nama calon --</option>
                        </select>
                    </div>
                </div>

                <br>

                <!-- <div class="form-group">
                    <label for="input-readonly" class="col-sm-2 control-label">ReadOnly Input</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-readonly" placeholder="This is readonly input..." readonly>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Pasangan Calon</h4>
                        <!-- <input type="text" name="pasangan" id="pasangan" class="js-states form-control" tabindex="-1" style="display: none; width: 100%" readonly> -->
                        <div id="pasangan" >
                            <input type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <h4 class="no-m m-b-sm m-t-lg">Partai Pendukung</h4>
                        <select name="partai" id="partai" class="js-states form-control" multiple="multiple" tabindex="-1" style="display: none; width: 100%">
                            <option value="">-- Pilih Partai --</option>
                        </select>
                    </div>

                <div class="col-md-4">
                    <h4 class="no-m m-b-sm m-t-lg">Kursi</h4>
                    <div id="kursi">
                        <input name="kursi" type="text" class="form-control" placeholder="" readonly>
                    </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="no-m m-b-sm m-t-lg">Jenis Surat</h4>
                        <input class="form-check-input" type="radio" name="js" id="sk" value="SK" >
                        <label class="form-check-label" for="sk">SK</label>
                        <input class="form-check-input" type="radio" name="js" id="st" value="ST" >
                        <label class="form-check-label" for="st">ST</label>
                        <input class="form-check-input" type="radio" name="js" id="usulan_dpc" value="USULAN_DPC" >
                        <label class="form-check-label" for="usulan_dpc">Usulan DPC</label>
                        <input class="form-check-input" type="radio" name="js" id="usulan_dpn" value="USULAN_DPN" >
                        <label class="form-check-label" for="usulan_dpn">Usulan DPN</label>
                        <input class="form-check-input" type="radio" name="js" id="usulan_dpn" value="USULAN_DPN" >
                        <input class="form-check-input" type="text" name="js" for="usulan_dpn" id="usulan_dpn" value="" placeholder="others" >
                        
                        <!-- <input type="checkbox" id="sk" name="sk" value="SK">
                            <label for="sk">SK</label><br>
                        <input type="checkbox" id="st" name="st" value="ST">
                            <label for="st">ST</label><br>
                        <input type="checkbox" id="usulan_dpc" name="usulan_dpc" value="USULAN_DPC">
                            <label for="usulan_dpc">Usulan DPC</label><br>
                        <input type="checkbox" id="usulan_dpn" name="usulan_dpn" value="USULAN_DPN">
                            <label for="usulan_dpn">Usulan DPN</label><br>
                        <input type="checkbox" id="others" name="others" value="" for="others">
                            <input type="text" name="others"> -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm m-t-lg">Catatan</h4>
                    <textarea style="resize:none; margin: 0px 16px 0px 0px; height: 207px; width: 1081px;" class="form-control" type="text" name="catatan" id="catatan" row="4" cols="20"></textarea>
                    </div>
                </div>

                <br>

                <div class="row pull-right">
                
                <div class="col-md-6">
                        <a href="">
                        <button type="button" class="btn btn-warning btn-addon m-b-sm btn-sm"><i class="glyphicon glyphicon-print"></i>Print PDF</button>
                        </a>
                    </div>
                
                    <div class="col-md-6">
                        <a href="">
                            <button type="submit" class="btn btn-success btn-addon m-b-sm btn-sm"><i class="glyphicon glyphicon-saved"></i>Submit</button>
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