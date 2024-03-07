<?php $tahun = date('Y'); ?>
<!-- Start Footer area-->
<div class="footer-copyright-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="footer-copy-right">
					<p>Copyright © <?= $tahun ?>
						. SPK Monitor </p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Footer area-->
<!-- jquery
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/bootstrap.min.js"></script>
<!-- wow JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/wow.min.js"></script>
<!-- price-slider JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/owl.carousel.min.js"></script>
<!-- scrollUp JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/counterup/waypoints.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jvectormap JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/jvectormap/jvectormap-active.js"></script>
<!-- sparkline JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/sparkline/sparkline-active.js"></script>
<!-- sparkline JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/flot/jquery.flot.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/flot/curvedLines.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/flot/flot-active.js"></script>
<!-- knob JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/knob/jquery.knob.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/knob/jquery.appear.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/knob/knob-active.js"></script>
<!--  wave JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/wave/waves.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/wave/wave-active.js"></script>
<!--  todo JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/todo/jquery.todo.js"></script>
<!-- plugins JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/plugins.js"></script>
<!--  Chat JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/dropzone/dropzone.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/chat/moment.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/chat/jquery.chat.js"></script>
<!-- main JS
		============================================ -->
<script src="<?= base_url('assets/landing/') ?>js/main.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/data-table/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/landing/') ?>js/data-table/data-table-act.js"></script>
<!-- tawk chat JS============================================ -->
<!-- <script src="<?= base_url('assets/landing/') ?>js/tawk-chat.js"></script> -->
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


</body>

</html>