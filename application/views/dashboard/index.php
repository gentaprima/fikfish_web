<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Produk</span>
              <span class="info-box-number">
                <?= count($count_product) ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pelanggan Terdaftar</span>
              <span class="info-box-number"><?= count($count_users) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-motorcycle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kurir</span>
              <span class="info-box-number"><?= count($count_courier) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pesanan Hari ini</span>
              <span class="info-box-number"><?= count($count_pemesanan) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        </div>

        <div class="row justify-content-center">

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-shipping-fast"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengiriman Hari ini</span>
              <span class="info-box-number"><?= count($count_shipping) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-calendar-times"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengiriman Tertunda</span>
              <span class="info-box-number"><?= count($count_shippingDelay) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        </div>

        <!-- <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-money-bill-wave"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemasukan Hari ini</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-olive elevation-1"><i class="fas fa-money-check"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pemasukan Bulan ini</span>
              <span class="info-box-number">2,000</span>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.row -->



      <!-- /.row -->
   
    <!--/. container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->