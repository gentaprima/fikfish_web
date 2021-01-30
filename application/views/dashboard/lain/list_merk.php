<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Merk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Merk</li>
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
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Merk</h3>
                        <!-- <button style="float: right;" class="btn bg-color-primary">Tambah</button> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Merk</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($count_merk as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama_merk'] ?></td>
                                        <td>
                                            <center>
                                                <span data-toggle="modal" data-targe="#modalMerk">
                                                    <button class="btn bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-edit"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalDelete">
                                                    <button onClick="deleteMerk('<?= $row['id_merk']; ?>')" class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Data"> <i class="fas fa-trash"></i></button>
                                                </span>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
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
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Merk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= base_url() ?>merk/addMerk/" method="post">
                            <div class="form-group">
                                <label for="">Nama Merk</label>
                                <input type="text" name="merk_name" class="form-control">
                            </div>
                            <button type="submit" style="width:100%;" class="btn bg-color-primary">Submit</button>
                        </form>
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
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Merk</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data tersebut ?
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>