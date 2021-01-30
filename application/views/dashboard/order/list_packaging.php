<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pengemasan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Pengemasan</li>
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
                        <h3 class="card-title">Data Pengemasan</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemesan</th>
                                    <th>ID Order</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($count_pengemasan as $row) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['full_name'] ?></td>
                                        <td><span class="btn bg-color-primary"><?= $row['order_id']; ?></span></td>
                                        <td><?= date_format(date_create($row['date_order']), "d F Y") ?></td>
                                        <td>
                                            <center><span class="btn btn-outline-info"><?= $row['status'] ?></span></center>
                                        </td>
                                        <td>
                                            <center>
                                                <span data-toggle="modal" data-target="#modalSend">
                                                    <button style="padding: 7px 9px 7px 9px;" onClick="sendCourier('<?= $row['order_id'] ?>','<?= base_url() ?>','<?= $row['alamat'] ?>','<?= $row['number'] ?>')" class="btn btn-circle bg-danger" data-toggle="tooltip" data-placement="top" title="Kirim Pesanan"> <i class="fas fa-shipping-fast"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalInfo">
                                                    <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalPesanan">
                                                    <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                </span>
                                                <!-- <span data-toggle="modal" data-target="#modalConfirm">
                                                    <button onClick="confirmPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn bg-success" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pesanan"> <i class="fa fa-check-circle"></i></button>
                                                </span> -->
                                                <!-- <span data-toggle="modal" data-target="#modalDelete">
                                                    <button class="btn btn-light" data-toggle="tooltip" data-placement="top" title="Hapus Pesanan"> <i class="fas fa-trash"></i></button>
                                                </span> -->
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
<div class="modal fade" id="modalSend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title-bukti-pembayaran">Kirim Pemesanan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pr-5 pl-5 pt-3">
                    <form action="" method="post" id="form">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">No Pesanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="id_order" id="id_order" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Alamat Pengiriman</label>
                            <div class="col-sm-9">
                                <textarea style="height: 100px;" class="form-control" rows="50" name="alamat" id="alamat" readonly>
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Pilih Pengirim</label>
                            <div class="col-sm-9">
                                <select name="kurir" id="kurir" class="form-control">
                                    <option value="">-- Pilih Pengirim --</option>
                                    <?php foreach ($data_kurir as $row) { ?>
                                        <option value="<?= $row['id_kurir'] ?>"><?= $row['courier_name'] ?> - <?= $row['nama_wilayah'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="number_order" id="number_order">
                </div>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" id="btn_confirm" class="btn bg-color-primary">Kirim Ke kurir</button>
                </form>
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