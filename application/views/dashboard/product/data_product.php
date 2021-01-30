<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Ikan</h3>
                        <span data-toggle="modal" data-target="#modalInsert">
                            <button onClick="addProduct('<?= base_url(); ?>')" data-toggle="tooltip" data-placement="top" title="Tambah Data" style="float: right;" class="btn bg-color-primary">Tambah</button>
                        </span>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ikan</th>
                                    <th>Harga</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_product as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama_ikan'] ?></td>
                                        <td>Rp <?= number_format($row['harga'], 0, ",", "."); ?></td>
                                        <td><span class="btn btn-outline-success"><?= $row['nama_jenis'] ?></span></td>
                                        <td><?= substr($row['deskripsi'], 0, 50) ?> ...</td>
                                        <td>
                                            <center><a data-toggle="modal" data-target="#modalImage" onClick="seeImageProduct('<?= $row['foto'] ?>','<?= base_url() ?>')" class="btn bg-color-primary">Lihat Foto</a></center>
                                        </td>
                                        <td>
                                            <center>
                                                <span data-toggle="modal" data-target="#modalInsert">
                                                    <button onClick="updateProduct('<?= $row['id_ikan']; ?>','<?= $row['nama_ikan']; ?>','<?= $row['harga']; ?>','<?= $row['id_jenis']; ?>','<?= $row['foto']; ?>','<?= base_url(); ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-edit"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalDelete">
                                                    <button onClick="deleteProduct('<?= $row['id_ikan']; ?>','<?= base_url(); ?>')" class="btn btn-circle btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Data"> <i class="fas fa-trash"></i></button>
                                                </span>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ikan</th>
                                    <th>Harga</th>
                                    <th>Jenis</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>product/addProduct/" method="post" id="action" enctype="multipart/form-data">
                    <input type="hidden" name="id_product" id="id_product">
                    <div class="form-group">
                        <label for="">Nama Ikan</label>
                        <input type="text" id="nama" placeholder="Nama ikan ..." name="nama_ikan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" id="harga" class="form-control" name="harga" placeholder="Harga ...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="">-- Pilih Jenis --</option>
                            <?php foreach ($count_jenis as $jenis) { ?>
                                <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control"></textarea>
                    </div>
                    <label for="">Foto</label>
                    <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile" id="foto"></label>
                    </div>

            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button name="submit" class="btn bg-color-primary" type="submit">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Hapus Data Produk</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Anda Yakin ingin menghapus data tersebut ? </h5>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Foto Produk</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img style="width: 300px; height:300px;" id="image" src="" alt=""></center>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <!-- <a id="btn_delete" class="btn bg-color-primary" >Save changes</a> -->
            </div>
        </div>
    </div>
</div>