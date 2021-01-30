<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengiriman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Pengiriman</li>
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
                        <h3 class="card-title">Data Pengiriman</h3>

                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sedang Berjalan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ditunda</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="menunggu-tab" data-toggle="tab" href="#menunggu" role="tab" aria-controls="menunggu" aria-selected="false">Akan Dikirim</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Sudah Diterima</a>
                            </li>
                        </ul>
                        <div class="tab-content" style="border: 1px solid #eee" id="myTabContent">
                            <div class="tab-pane fade show active mt-4 pl-3 pr-3 pb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>ID Order</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data_sedangdikirim as $row) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><span class="badge bg-color-primary"><?= $row['order_id']; ?></span></td>
                                                <td><?= date_format(date_create($row['date_shipping']), "d F Y") ?></td>
                                                <td>
                                                    <?php if ($row['is_delayed'] == 1) { ?>
                                                        <center><span class="btn btn-outline-danger">Ditunda</span></center>
                                                    <?php } else { ?>
                                                        <center><span class="btn btn-outline-info">Sedang Dikirim</span></center>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span data-toggle="modal" data-target="#modalInfo">
                                                            <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalPesanan">
                                                            <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalInfoCourier">
                                                            <button style="padding: 7px 9px 7px 9px;" onClick="infoCourier('<?= $row['courier_name'] ?>','<?= $row['email'] ?>','<?= $row['phone'] ?>','<?= $row['foto'] ?>','<?= $row['nama_wilayah'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-warning" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengirim"> <i class="fas fa-shipping-fast"></i></button>
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade mt-4 pl-3 pr-3 pb-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>ID Order</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data_tunda as $row) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><span class="badge bg-color-primary"><?= $row['order_id']; ?></span></td>
                                                <td><?= date_format(date_create($row['date_shipping']), "d F Y") ?></td>
                                                <td>
                                                    <?php if ($row['is_delayed'] == 1) { ?>
                                                        <center><span class="btn btn-outline-danger">Ditunda</span></center>
                                                    <?php } else { ?>
                                                        <center><span class="btn btn-outline-info">Sedang Dikirim</span></center>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span data-toggle="modal" data-target="#modalInfo">
                                                            <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalPesanan">
                                                            <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalInfoCourier">
                                                            <button style="padding: 7px 9px 7px 9px;" onClick="infoCourier('<?= $row['courier_name'] ?>','<?= $row['email'] ?>','<?= $row['phone'] ?>','<?= $row['foto'] ?>','<?= $row['nama_wilayah'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-warning" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengirim"> <i class="fas fa-shipping-fast"></i></button>
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade mt-4 pl-3 pr-3 pb-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>ID Order</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($data_diterima as $row) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><span class="badge bg-color-primary"><?= $row['order_id']; ?></span></td>
                                                <td><?= date_format(date_create($row['date_shipping']), "d F Y") ?></td>
                                                <td>
                                                    <?php if ($row['is_delayed'] == 1) { ?>
                                                        <center><span class="btn btn-outline-danger">Ditunda</span></center>
                                                    <?php } else { ?>
                                                        <center><span class="btn btn-outline-info">Sudah Diterima</span></center>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span data-toggle="modal" data-target="#modalInfo">
                                                            <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalPesanan">
                                                            <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalInfoCourier">
                                                            <button style="padding: 7px 9px 7px 9px;" onClick="infoCourier('<?= $row['courier_name'] ?>','<?= $row['email'] ?>','<?= $row['phone'] ?>','<?= $row['foto'] ?>','<?= $row['nama_wilayah'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-warning" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengirim"> <i class="fas fa-shipping-fast"></i></button>
                                                        </span>
                                                        <!-- <?php if ($row['status'] == "Sedang Diproses") { ?>
                                                    <span data-toggle="modal" data-target="#modalConfirm">
                                                        <button onClick="kemasPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn bg-success" data-toggle="tooltip" data-placement="top" title="Kemas Pesanan"> <i class="fa fa-check-circle"></i></button>
                                                    </span>
                                                <?php } else { ?>
                                                    <span data-toggle="modal" data-target="#modalDelete">
                                                        <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Batalkan Pesanan"> <i class="fas fa-trash"></i></button>
                                                    </span>
                                                <?php } ?> -->
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade mt-4 pl-3 pr-3 pb-3" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">
                                <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>ID Order</th>
                                            <th>Tanggal Kirim</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($data_akandikirim as $row) { ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><span class="badge bg-color-primary"><?= $row['order_id']; ?></span></td>
                                                <td><?= date_format(date_create($row['date_shipping']), "d F Y") ?></td>
                                                <td>
                                                    <center><span class="btn btn-outline-danger"><?= $row['status'] ?></span></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span data-toggle="modal" data-target="#modalInfo">
                                                            <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalPesanan">
                                                            <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                        </span>
                                                        <span data-toggle="modal" data-target="#modalInfoCourier">
                                                            <button style="padding: 7px 9px 7px 9px;" onClick="infoCourier('<?= $row['courier_name'] ?>','<?= $row['email'] ?>','<?= $row['phone'] ?>','<?= $row['foto'] ?>','<?= $row['nama_wilayah'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-warning" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pengirim"> <i class="fas fa-shipping-fast"></i></button>
                                                        </span>
                                                        <!-- <?php if ($row['status'] == "Sedang Diproses") { ?>
                                                    <span data-toggle="modal" data-target="#modalConfirm">
                                                        <button onClick="kemasPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn bg-success" data-toggle="tooltip" data-placement="top" title="Kemas Pesanan"> <i class="fa fa-check-circle"></i></button>
                                                    </span>
                                                <?php } else { ?>
                                                    <span data-toggle="modal" data-target="#modalDelete">
                                                        <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Batalkan Pesanan"> <i class="fas fa-trash"></i></button>
                                                    </span>
                                                <?php } ?> -->
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
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

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
<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="modal-title">Detail Data Pemesan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesan</th>
                            <th>No Telepon</th>
                            <th>Alamat Pemesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td id="info_nama"></td>
                            <td id="info_telepon"></td>
                            <td id="info_alamat"></td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button class="btn bg-color-primary" data-dismiss="modal" type="button">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="modal-title-info-pesanan">Detail Data Pesanan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">Ongkir</th>
                            <th id="ongkir">Rp 000</th>
                        </tr>
                        <tr>
                            <th colspan="4">Biaya Tambahan</th>
                            <th id="biaya_tambahan">Rp 000</th>
                        </tr>
                        <tr>
                            <th colspan="4">SubTotal</th>
                            <th id="sub_total">Rp 000</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button class="btn bg-color-primary" data-dismiss="modal" type="button">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title-bukti-pembayaran">Bukti Pembayaran</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img id="image_payment" src="" alt="">
                </center>
                <h5 id="info_payment">Pemesan belum melakukan pembayaran</h5>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" id="btn_confirm" class="btn bg-color-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Pembatalan Data Pesanan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Anda Yakin ingin Membatalkan Pesanan tersebut ? </h5>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_delete" class="btn bg-color-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Pembatalan Data Pesanan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Pesanan sudah dibayar,Silahkan Kemas Pesanan !</h5>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a id="btn_kemas" class="btn bg-color-primary">Save changes</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalInfoCourier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title">Detail Pengirm</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pr-5 pl-5 pt-3">
                    <div class="row">
                        <div class="col-4">
                            <img style="width: 200px;height:200px;" src="" id="foto_courier" alt="">
                        </div>
                        <div class="col-7 ml-5 mt-5">
                            <div class="row">
                                <div class="col-6">
                                    <span>Nama Pengirim</span>
                                </div>
                                <div class="col-6">
                                    : <span class="font-weight-bold" id="courier_name"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span>No Telepon</span>
                                </div>
                                <div class="col-6">
                                    : <span class="font-weight-bold" id="phone"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span>Email</span>
                                </div>
                                <div class="col-6">
                                    : <span class="font-weight-bold" id="email"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span>Wilayah</span>
                                </div>
                                <div class="col-6">
                                    : <span class="font-weight-bold" id="wilayah"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>