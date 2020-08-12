
<div class="page-inner">

<div class="page-title">
    <div class="container">
        <h3>Data Barang</h3>
    </div>
</div>

<div id="main-wrapper" class="container">
    <div class="row">
    
    <div class="col-lg-12 col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <div class="col-lg-6 col-md-6">

                    <a href="<?= base_url(); ?>databarang/tambah">
                        <button type="button" class="btn btn-warning">+ Tambah Data Barang</button>
                    </a>

                    </div>
                    <div class="col-lg-6 col-md-6">

                    <form class="form-inline pull-right" action="" method="post">
                        <input class="form-control mr-md-2" type="search" placeholder="Search" aria-label="Search ..." size="30">
                        <button class="btn btn-default btn-sm" type="submit">cari</button>
                    </form>
                    
                    </div>
        
                </div>
                <div class="panel-body">
                    <div class="table-responsive project-stats">  
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Stock</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>
<?php $no=1; ?>
<?php foreach($data_barang as $dt) : ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $no; ?></th>
                                    <td><span class="label label-info"><?= $dt['id_databarang'] ?></span></td>
                                    <td><?= $dt ['nama_barang']; ?></td>
                                    <td><?= $dt ['jenis_barang']; ?></td>
                                    <td><?= $dt ['jenis_barang']; ?></td>
                                    <td><?= $dt ['satuan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('databarang') ?>">Edit</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Main Wrapper -->



<!-- modal tambah -->

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-tittle" id="formModalLabel">Tambah data barang</h4>
            </div>
            <div class="modal-body">

            <form class="form-horizontal" action="<?= base_url('databarang/tambah'); ?>" method="POST">
            <input type="hidden" name="id" id="id">

                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Jenis Barang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                    </div>
                </div> -->

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

                <!-- <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Stock</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Satuan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="satuan_barang" name="satuan_barang">
                    </div>
                </div> -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>

            </div>

        </div>
    </div>
</div>