<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Tambah Data Rekom</h3>
    </div>
</div>

<div id="flash" class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

<div id="main-wrapper" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">

            <form action="" method="POST" enctype="multipart/form-data">
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
                            <option name="calon" value="">-- Pilih Nama calon --</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('calon'); ?></small>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm">Nama Pasangan Calon</h4>
                        <!-- <input type="text" name="pasangan" id="pasangan" class="js-states form-control" tabindex="-1" style="display: none; width: 100%" readonly> -->
                        <div id="pasangan" >
                            <input name="pasangan" type="text" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <h4 class="no-m m-b-sm m-t-lg">Partai Pengusung</h4>
<table class="table">
<thead>
<tr>
<td class="col-md-2">Nama Partai</td>
<td class="col-md-1">Kursi</td>
<td class="col-md-2">Jenis Surat</td>
<td class="col-md-2">Nomer Surat</td>
<td class="col-md-1"> </td>
</tr>
</thead>

<tbody>
<tr>
    <td>
    <select name="partai[]" id="partai" class="js-states form-control" tabindex="-1" >
    </select>
    </td>
    
    <td>
    <div id="total_kursi">
    <input type="text" name="total_kursi[]" class="form-control" value="" readonly>
    </div>
    </td>

    <td>
    <select name="ket" id="ket" class="form-control m-b-sm">
        <option value="">-- Pilih Jenis Surat --</option>
        <option id="sk" value="SK">SK</option>
        <option id="st" value="ST">ST</option>
        <option id="usulan_dpc" value="Usulan DPC">Usulan DPC</option>
        <option id="usulan_dpd" value="Usulan DPD">Usulan DPD</option>
        <option id="usulan_dpd" value="Usulan DPD">Usulan DPD</option>
        <option id="usulan_dpw" value="Usulan DPW">Usulan DPW</option>
    </select>
    </td>

    <td>
    <input type="text" class="form-control" name="no_ket" id="no_ket" value="" placeholder="Nomer Jenis Surat">
    </td>
    
    <td>
    <button type="button" name="remove"  id="remove" data-id="" class="remove">-</button>
    </td>


</tr>
</tbody>
</table>
<small class="form-text text-danger"><?= form_error('partai'); ?></small>
</div>

                <div class="col-md-2">
                    <h4 class="no-m m-b-sm m-t-lg">Total Kursi</h4>
                    <div id="total_kursi">
                        <input name="total_kursi" type="text" class="form-control" placeholder="" readonly>
                    </div>
                    </div>
                </div>
                <br>

                <!-- <div class="row">

                <div class="col-md-3">
                    <h4 class="no-m m-b-sm">Jenis Surat</h4>
                    <select name="ket" id="ket" class="form-control m-b-sm">
                        <option value="">-- Pilih Jenis Surat --</option>
                        <option id="sk" value="SK">SK</option>
                        <option id="st" value="ST">ST</option>
                        <option id="usulan_dpc" value="Usulan DPC">Usulan DPC</option>
                        <option id="usulan_dpd" value="Usulan DPD">Usulan DPD</option>
                        <option id="usulan_dpd" value="Usulan DPD">Usulan DPD</option>
                        <option id="usulan_dpw" value="Usulan DPW">Usulan DPW</option>
                    </select>
                    <small class="form-text text-danger"><?= form_error('ket'); ?></small>
                    <br>
                    <br>
                </div>
                <div class="col-md-3">
                    <h4 class="no-m m-b-sm">Nomer Jenis Surat</h4>
                    <input type="text" class="form-control" name="no_ket" id="no_ket" value="" placeholder="Nomer Jenis Surat">
                    <small class="form-text text-danger"><?= form_error('no_ket'); ?></small>
                </div>
                </div>             -->

                <div class="row">
                    <div class="col-md-12">
                    <h4 class="no-m m-b-sm m-t-lg">Catatan</h4>
                    <textarea style="resize:none; margin: 0px 16px 0px 0px; height: 207px; width: 1081px;" class="form-control" type="text" name="catatan" id="catatan" row="4" cols="20"></textarea>
                    </div>
                </div>

                <br>

                <div class="row pull-right">
                
                <div class="col-md-6">

                <a href="<?= base_url(); ?>rekom">
                            <button type="button" name="kembali" class="btn btn-primary btn-addon m-b-sm btn-sm"><i class="fa fa-arrow-left"></i>Kembali</button>
                        </a>

                    </div>
                
                    <div class="col-md-6">
                        <a href="">
                            <button type="submit" name="submit" class="btn btn-success btn-addon m-b-sm btn-sm"><i class="glyphicon glyphicon-saved"></i>Submit</button>
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