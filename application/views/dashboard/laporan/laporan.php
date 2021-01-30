<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Seluruh Laporan </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>dashboard/">Home</a></li>
                        <li class="breadcrumb-item active">Data Laporan</li>
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
                        <h3 class="card-title">Data Seluruh Laporan Bulan <?= $date ?></h3>
                        <button data-target="#modalInsert" data-toggle="modal" style="float:right;" class="btn bg-color-primary">Pilih Bulan</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Laporan Penjualan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Grafik Produk Terlaris</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Grafik Wilayah Terbanyak</a>
                            </li>

                        </ul>
                        <div class="tab-content" style="border: 1px solid #eee" id="myTabContent">
                            <div class="tab-pane fade show active mt-4 pl-3 pr-3 pb-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table id="example1" class="table table-bordered table-striped dataTable js-exportable max-width100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order ID</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengirim</th>
                                            <th>Nama Penerima</th>
                                            <th>Wilayah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($laporan as $row) { ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['order_id'] ?></td>
                                                <td><?= $row['full_name'] ?></td>
                                                <td><?= date_format(date_create($row['date_received']), "d F Y") ?></td>
                                                <td><?= $row['courier_name'] ?></td>
                                                <td><?= $row['receiver'] ?></td>
                                                <td><?= $row['nama_wilayah'] ?></td>
                                                <td><span class="badge badge-success"><?= $row['status'] ?></span></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Order ID</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengirim</th>
                                            <th>Nama Penerima</th>
                                            <th>Wilayah</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="tab-pane fade mt-4 pl-3 pr-3 pb-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Grafik -->
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <div class="tab-pane fade mt-4 pl-3 pr-3 pb-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- Grafik -->
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                           
                        </div>

                    </div>
                    <div class="card-body">

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
<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-navy-dark border-none">
                <h5 class="modal-title" id="modal_title">Pilih Bulan</h5>
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container pr-5 pl-5 pt-3">
                    <form id="form" action="<?= base_url() ?>dashboard/laporan" method="post">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Bulan</label>
                            <div class="col-sm-9">
                                <input type="month" placeholder="Pilih Bulan ..." name="bulan" class="form-control" id="bulan">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer bg-navy-dark border-none">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn bg-color-primary">Lihat Data</button>
                </form>
            </div>
        </div>
    </div>
</div>