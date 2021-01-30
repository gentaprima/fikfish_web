<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y') ?> <a href="">FIK FISH</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">

  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?= base_url(); ?>assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url(); ?>assets/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/admin/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url(); ?>assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/admin/alert.js"></script>
<script src="<?= base_url(); ?>assets/admin/kategori.js"></script>
<script src="<?= base_url(); ?>assets/admin/product.js"></script>
<script src="<?= base_url(); ?>assets/admin/order.js"></script>
<script src="<?= base_url(); ?>assets/admin/courier.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/admin/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/tables/jquery-datatable.js"></script>
<!-- <script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->


<script type="text/javascript">
  $(document).ready(function() {
    bsCustomFileInput.init();
  });
</script>

<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

<script>
  var text = document.getElementById("text");
  if (text != null) {
    var icon = document.getElementById("icon").innerHTML;
    var title = document.getElementById("title").innerHTML;
    swal({
      title: title,
      text: text.innerHTML,
      icon: icon,
    });
  }
</script>
<script>
  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var date = '<?= $date ?>';

    var areaChartData = {
      labels: ['Ikan Terlaris Bulan '+date],
      datasets: [

      <?php foreach ($productChart as $row) { ?> {
          label: '<?= $row['nama_ikan'] ?>',
          backgroundColor: '<?= $row['warna_chart'] ?>',
          borderColor: 'rgba(60,141,188,0.8)',
          pointRadius: false,
          pointColor: '#3b8bba',
          pointStrokeColor: 'rgba(60,141,188,1)',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data: [<?= $row['jumlah'] ?>]
        },
      <?php } ?>
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        ticks: {
          min: 0
        },
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          gridLines: {
            display: true,
          }
        }]
      }
    }



    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
      labels: <?php
              $php_array = $nama_wilayah;
              $js_array = json_encode($php_array);
              echo "$js_array \n"
              ?>,
      datasets: [{
        data: <?php
              $jumlahData = $jumlahPerwilayah;
              $jsJumlah = json_encode($jumlahData);
              echo "$jsJumlah \n";
              ?>,
        backgroundColor: ['#ad1457', '#66bb6a', '#2979ff', '#9575cd', '#81d4fa', '#d1c4e9', '#e57373', '#009688', '#ffe57f'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false,
      scales: {
        ticks: {
          min: 0
        },
        xAxes: [{
          gridLines: {
            display: false,
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true
          },
          gridLines: {
            display: true,
          }
        }]
      }
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


  })
</script>

</body>

</html>