$(function () {
	$('#tabel_pegawai').DataTable( {
		responsive: true,
		"columnDefs": [
		{ responsivePriority: 1, targets: 0},
		{ responsivePriority: 2, targets: 1}
		]
	});
});

$(function () {
	$('#tabel_ormas').DataTable( {
		responsive: true,
		"columnDefs": [
		{ responsivePriority: 1, targets: 0},
		{ responsivePriority: 2, targets: 1}
		]
	});
});