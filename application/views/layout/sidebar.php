<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy-dark">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>assets/logo.jpg" target="_blank" class="brand-link">
    <img src="<?= base_url() ?>assets/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">FikFish</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/image_profile/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->session->userdata('full_name') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview ">
          <?php if (isset($active_index)) { ?>
            <a href="<?= base_url(); ?>dashboard/" class="nav-link activee">
            <?php } else { ?>
              <a href="<?= base_url(); ?>dashboard/" class="nav-link ml-1">
              <?php } ?>
              <i class="fas fa-home"></i>
              <p class="ml-2">
                Home
              </p>
              </a>

        </li>
        <li class="nav-item">
          <?php if (isset($active_product)) { ?>
            <a href="<?= base_url() ?>dashboard/list_product/" class="nav-link activee">
            <?php } else { ?>
              <a href="<?= base_url() ?>dashboard/list_product/" class="nav-link">
              <?php } ?>
              <?php if (isset($active_product)) { ?>
                <i class="nav-icon fas fa-list " style="margin-left:-4px;"></i>
              <?php } else { ?>
                <i class="nav-icon fas fa-list " style=""></i>
              <?php } ?>
              <p>
                Data Produk
              </p>
              </a>
        </li>
        <?php if (isset($active_pemesanan) || isset($active_transaksi) || isset($active_pembayaran) || isset($active_pengemasan) || isset($active_pengiriman)) { ?>
          <li class="nav-item has-treeview show menu-open">
            <a href="#" class="nav-link activee">
            <?php } else { ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
            <?php } ?>

            <i class="nav-icon fas fa-list"></i>
            <p>
              Data Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <?php if (isset($active_pemesanan)) { ?>
                  <a href="<?= base_url() ?>dashboard/list_pemesanan/" class="nav-link activeee">
                  <?php } else { ?>
                    <a href="<?= base_url() ?>dashboard/list_pemesanan/" class="nav-link ">
                    <?php } ?>
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Data Pemesanan</p>
                    <span class="badge bg-color-primary right"><?= count($count_pemesanan); ?></span>
                    </a>
              </li>
              <li class="nav-item">
                <?php if (isset($active_pembayaran)) { ?>
                  <a href="<?= base_url() ?>dashboard/list_pembayaran/" class="nav-link activeee">
                  <?php } else { ?>
                    <a href="<?= base_url() ?>dashboard/list_pembayaran/" class="nav-link">
                    <?php } ?>
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Data Pembayaran</p>
                    <span class="badge bg-color-primary right"><?= count($count_pembayaran); ?></span>
                    </a>
              </li>
              <li class="nav-item">
                <?php if (isset($active_pengemasan)) { ?>
                  <a href="<?= base_url() ?>dashboard/list_pengemasan/" class="nav-link activeee">
                  <?php } else { ?>
                    <a href="<?= base_url() ?>dashboard/list_pengemasan/" class="nav-link">
                    <?php } ?>
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Data Pengemasan</p>
                    <span class="badge bg-color-primary right"><?= count($count_pengemasan); ?></span>
                    </a>
              </li>

          </li>
          <li class="nav-item">
            <?php if (isset($active_pengiriman)) { ?>
              <a href="<?= base_url() ?>dashboard/list_pengiriman/" class="nav-link activeee">
              <?php } else { ?>
                <a href="<?= base_url() ?>dashboard/list_pengiriman/" class="nav-link">
                <?php } ?>
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Data Pengiriman</p>
                </a>
          </li>
      </ul>
      </li>
      <li class="nav-item has-treeview">
        <?php if (isset($active_jadwal)) { ?>
          <a href="<?= base_url() ?>dashboard/jadwal_pengiriman/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/jadwal_pengiriman/" class="nav-link ">
            <?php } ?>
            <i class="nav-icon fas fa-calendar"></i>
            <p>
              Jadwal Pengiriman
            </p>
            </a>

      </li>
      <li class="nav-item has-treeview">
        <?php if (isset($active_kurir)) { ?>
          <a href="<?= base_url() ?>dashboard/list_kurir/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/list_kurir/" class="nav-link ">
            <?php } ?>
            <i class="nav-icon fas fa-shipping-fast"></i>
            <p>
              Data Kurir
            </p>
            </a>

      </li>
      <li class="nav-item">
        <?php if (isset($active_users)) { ?>
          <a href="<?= base_url() ?>dashboard/list_users/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/list_users/" class="nav-link">
            <?php } ?>
            <i class="nav-icon fas fa-grin"></i>
            <p>
              Data Customer

            </p>
            </a>
      </li>
      <li class="nav-item">
        <?php if (isset($active_laporan)) { ?>
          <a href="<?= base_url() ?>dashboard/laporan/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/laporan/" class="nav-link">
            <?php } ?>
            <i class="nav-icon fas fa-table"></i>
            <p>
              Laporan

            </p>
            </a>
      </li>

      <li class="nav-header">lain-lain</li>

      <li class="nav-item">
        <?php if (isset($active_kategori)) { ?>
          <a href="<?= base_url() ?>dashboard/list_jenis/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/list_jenis/" class="nav-link ">
            <?php } ?>
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Data Jenis
              <span class="badge bg-color-primary right"><?= count($count_jenis); ?></span>
            </p>
            </a>
      </li>
      <li class="nav-item">
        <?php if (isset($active_kategori)) { ?>
          <a href="<?= base_url() ?>dashboard/list_wilayah/" class="nav-link activee">
          <?php } else { ?>
            <a href="<?= base_url() ?>dashboard/list_wilayah/" class="nav-link ">
            <?php } ?>
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Data Wilayah
              <span class="badge bg-color-primary right"></span>
            </p>
            </a>
      </li>


      <li class="nav-header">LABELS</li>
      <li class="nav-item">
        <a href="<?= base_url() ?>login/logout/" class="nav-link">
          <i class="nav-icon far fa-circle text-danger"></i>
          <p class="text">Logout</p>
        </a>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>