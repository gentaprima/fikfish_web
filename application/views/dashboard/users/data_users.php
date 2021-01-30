<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelanggan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php if ($this->session->flashdata('text')) { ?>
        <p style="display: none;" id="text"><?= $this->session->flashdata('text') ?></p>
        <p style="display: none;" id="title"><?= $this->session->flashdata('title') ?></p>
        <p style="display: none;" id="icon"><?= $this->session->flashdata('icon') ?></p>
    <?php } ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pelanggan</h3>
                        <!-- <span data-toggle="modal" data-target="#modalInsert">
                            <button onClick="addProduct('<?= base_url(); ?>')" data-toggle="tooltip" data-placement="top" title="Tambah Data" style="float: right;" class="btn bg-color-primary">Tambah</button>
                        </span> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($data_users as $row){ ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['full_name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['alamat'] ?></td>
                                    <!-- <td>
                                        <center>
                                            <span data-toggle="modal" data-target="#modalInsert">
                                                <button onClick="" class="btn bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-edit"></i></button>
                                            </span>
                                            <span data-toggle="modal" data-target="#modalDelete">
                                                <button onClick="" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Data"> <i class="fas fa-trash"></i></button>
                                            </span>
                                        </center>
                                    </td> -->
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <!-- <th>Action</th> -->
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
                        <label for="">Nama Produk</label>
                        <input type="text" id="nama" placeholder="Nama produk ..." name="nama_produk" class="form-control">
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
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($count_categori as $kategori) { ?>
                                <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Merk</label>
                        <select name="merk" id="merk" class="form-control">
                            <option value="">-- Pilih Merk --</option>
                            <?php foreach ($count_merk as $merk) { ?>
                                <option value="<?= $merk['id_merk'] ?>"><?= $merk['nama_merk'] ?></option>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Hapus Data Produk</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda Yakin ingin menghapus data tersebut ? </p>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>