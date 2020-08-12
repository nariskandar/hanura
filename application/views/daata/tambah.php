
<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Tambah Data Barang</h3>
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
    
    <div class="col-lg-12 col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="modal-content">

            <form class="form-horizontal" action="" method="POST">
                <?= validation_errors(); ?>
                <input type="hidden" name="id" id="id">

                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Id Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="id_barang" name="id_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Barang</label>
                    <div class="col-sm-5">
                        <select class="form-control m-b-sm" id="jenis_barang" name="jenis_barang">
                            <option value="shampo">Shampo</option>
                            <option value="sabun">Sabun</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="rokok">Rokok</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-10">
                        <div class="input-group m-b-sm">

                            <div class="row">
                                <div class="col-md-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" name="stock" id="stock">
                                </div>
                                <div class="col-md-5">
                                <select class="form-control m-b-sm" id="satuan_barang" name="satuan_barang">
                                        <option value="pcs">pcs</option>
                                        <option value="ball">ball</option>
                                        <option value="pax">pax</option>
                                </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Main Wrapper -->
