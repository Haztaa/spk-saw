(function ($) {
	"use strict";

	$(document).ready(function () {
		$("#data-table-basic").DataTable({
			language: {
				decimal: "",
				emptyTable: "Tidak Ada Data Yang Ditemukan",
				info: "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
				infoEmpty: "Menampilkan 0 to 0 of 0 Data",
				infoFiltered: "(Di Filter Dari _MAX_ total data)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Menampilkan _MENU_ Data ",
				loadingRecords: "Mohon Tunggu...",
				processing: "Memproses...",
				search: "Cari:",
				zeroRecords: "Data Tidak Ditemukan",
				paginate: {
					first: "Awal",
					last: "Akhir",
					next: "Selanjutnya",
					previous: "Sebelumnya",
				},
				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	});
})(jQuery);
