<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Jenis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Jenis</li>
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
                        <h3 class="card-title">Data Jenis</h3>
                        <!-- <button style="float: right;" class="btn bg-color-primary">Tambah</button> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($count_jenis as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['nama_jenis'] ?></td>
                                        <td>
                                            <center>
                                                <span data-toggle="modal" data-target="#modalUpdate"> 
                                                <button onClick="updateJenis('<?= $row['id_jenis'] ?>','<?= $row['nama_jenis'] ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fa fa-edit"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalDelete">
                                                    <button onClick="deleteJenis('<?= $row['id_jenis'] ;?>','<?= base_url() ?>')" class="btn btn-circle btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Data"> <i class="fa fa-trash"></i></button>
                                                </span>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama jenis</th>
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
                        <h3 class="card-title">Tambah Jenis</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= base_url() ?>jenis/addJenis/" method="post">
                            <div class="form-group">
                                <label for="">Nama Jenis</label>
                                <input type="text" name="type_name" class="form-control">
                            </div>
                            <button style="width:100%;" class="btn bg-color-primary">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Jenis</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data tersebut ?
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Hapus Data</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="exampleModalLabel">Form Ubah Data Jenis</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pr-5 pl-5 pt-3">
                    <form action="<?= base_url() ?>jenis/updateJenis/" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jenis</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Jenis ..." name="jenis" class="form-control" id="jenis">
                                <input type="hidden" name="id_jenis" id="id_jenis">
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_delete" class="btn bg-color-primary">Simpan perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>