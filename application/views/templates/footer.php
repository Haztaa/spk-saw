<div class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        Copyright © <?php echo date('Y') ?> Monitor
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="<?= base_url() ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="<?= base_url() ?>assets/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="<?= base_url() ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="<?= base_url() ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="<?= base_url() ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/c3.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="<?= base_url() ?>assets/libs/js/dashboard-ecommerce.js"></script>
<script src="<?= base_url() ?>assets/vendor/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    // Event listener untuk perubahan nilai dropdown
    for (var i = 1; i <= <?= $jumlah; ?>; i++) {
      $('#tes' + i).change(function() {
        var selectedValues = [];
        var total = 0;
        // Mengambil nilai terpilih dari setiap dropdown
        for (var j = 1; j <= <?= $jumlah; ?>; j++) {
          var selectedValue = parseFloat($('#tes' + j).val());
          selectedValues.push(selectedValue);
          total += selectedValue;
        }

        // Menambahkan nilai terpilih ke elemen lain

        if (total > 1) {
          $('#result').show();
          $(":submit").attr("disabled", true);
          $('#result1').hide();
        } else if (total < 1) {
          $('#result1').show();
          $(":submit").attr("disabled", true);
          $('#result').hide();
        } else {
          $('#result').hide();
          $('#result1').hide();
          $(":submit").attr("disabled", false);
        }
      });
    }
  });
</script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "language": {

        "decimal": "",
        "emptyTable": "Tidak Ada Data Yang Ditemukan",
        "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 to 0 of 0 Data",
        "infoFiltered": "(Di Filter Dari _MAX_ total data)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Menampilkan _MENU_ Data ",
        "loadingRecords": "Mohon Tunggu...",
        "processing": "Memproses...",
        "search": "Cari:",
        "zeroRecords": "Data Tidak Ditemukan",
        "paginate": {
          "first": "Awal",
          "last": "Akhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        },
        "aria": {
          "sortAscending": ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
        }

      }
    });
  });
</script>



</body>

</html>