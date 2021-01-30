<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pemesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Pemesanan</li>
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
                        <h3 class="card-title">Data Pemesanan</h3>

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
                                foreach ($count_pembayaran as $row) { ?>
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
                                                <span data-toggle="modal" data-target="#modalImage">
                                                    <button style="padding: 7px 9px 7px 9px;" onClick="seePayment('<?= $row['image_payment'] ?>','<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-danger" data-toggle="tooltip" data-placement="top" title="Lihat Bukti Pembayaran"> <i class="fas fa-money"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalInfo">
                                                    <button onClick="infoPemesan('<?= $row['full_name'] ?>','<?= $row['no_hp'] ?>','<?= $row['alamat'] ?>')" class="btn btn-circle bg-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Customer"> <i class="fa fa-user"></i></button>
                                                </span>
                                                <span data-toggle="modal" data-target="#modalPesanan">
                                                    <button onClick="infoPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-navy-dark" data-toggle="tooltip" data-placement="top" title="Lihat Detail Pesanan"> <i class="fa fa-book"></i></button>
                                                </span>
                                                <?php if($row['status'] == "Sedang Diproses"){ ?>
                                                <span data-toggle="modal" data-target="#modalConfirm">
                                                    <button onClick="kemasPesanan('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle bg-success" data-toggle="tooltip" data-placement="top" title="Kemas Pesanan"> <i class="fa fa-check-circle"></i></button>
                                                </span>
                                                <?php }else{ ?>
                                                <span data-toggle="modal" data-target="#modalDelete">
                                                    <button onClick="cancelOrder('<?= $row['order_id'] ?>','<?= base_url() ?>')" class="btn btn-circle btn-light" data-toggle="tooltip" data-placement="top" title="Batalkan Pesanan"> <i class="fas fa-trash"></i></button>
                                                </span>
                                                <?php } ?>
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
                <img style="width: 350px; height:350px;" id="image_payment" src="" alt="">
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