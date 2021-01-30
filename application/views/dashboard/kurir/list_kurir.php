<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Kurir</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Kurir</li>
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
                        <h3 class="card-title">Data Kurir</h3>
                        <button onClick="addDataCourier('<?= base_url() ?>')" data-target="#modalInsert" data-toggle="modal" style="float:right;" class="btn bg-color-primary">Tambah Data</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kurir</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Lihat Foto</th>
                                    <th>Wilayah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_kurir as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['courier_name'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['phone']  ?></td>
                                        <td><span data-target="#seeImage" data-toggle="modal" onClick="seeImage('<?= base_url() ?>assets/image_profile/','<?= $row['foto'] ?>')" class="btn bg-info"><a>Lihat Foto</a></span></td>
                                        <td><?= $row['nama_wilayah'] ?></td>
                                       
                                        <td>
                                            <center>
                                                <span data-toggle="modal" data-target="#modalInsert">
                                                    <button onClick="updateDataCourier('<?= base_url() ?>','<?= $row['courier_name'] ?>','<?= $row['phone'] ?>','<?= $row['email'] ?>','<?= $row['username'] ?>','<?= $row['id_wilayah'] ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fa fa-edit"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalDelete">
                                                    <button onClick="deleteCourier('<?= base_url() ?>','<?= $row['id_kurir'] ?>')" class="btn btn-circle btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Data"> <i class="fas fa-trash"></i></button>
                                                </span>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemesan</th>
                                    <th>ID Order</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Wilayah</th>
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
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pr-5 pl-5 pt-3">
                    <form id="form" action="" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Username ..." name="username" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" placeholder="Nama Lengkap ..." class="form-control" id="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" placeholder="Email ..." id="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">No HP</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_hp" class="form-control" placeholder="No Handphone ..." id="no_hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">No HP</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="wilayah" id="wilayah">
                                    <option value="">-- Pilih Wilayah ---</option>
                                    <?php foreach($data_wilayah as $row){ ?>
                                    <option value="<?= $row['id_wilayah'] ?>"><?= $row['nama_wilayah'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-color-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="seeImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Foto Profil Kurir</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="notif_image" class="pr-3 pl-3 pt-3">Kurir Belum Mengupload Foto Profil !</p>
                <img src="" id="image_courier" alt="">
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button  data-dismiss="modal" data-dismiss="modal" class="btn bg-color-primary">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Form Hapus Data kurir</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Anda yakin ingin menghapus data tersebut? </h5>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Hapus Data</a>
            </div>
        </div>
    </div>
</div>