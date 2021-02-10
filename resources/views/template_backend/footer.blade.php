<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		Version 1.0.0
	</div>
	Copyright &copy; 2020 Kesbangpol Lebak All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('vendor/lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('vendor/lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/lte/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{asset('lib/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lib/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/lte/plugins/moment/moment.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
<script src="{{asset('vendor/lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('lib/js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('vendor/lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('vendor/lte/dist/js/demo.js')}}"></script>
<script src="{{asset('vendor/lte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('vendor/lte/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('lib/js/holder.min.js')}}" type="text/javascript"></script>

<script src="{{asset('vendor/lte/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>

<script src="{{asset('vendor/bootstrap-fileinput/js/plugins/piexif.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/plugins/sortable.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/js/fileinput.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/themes/fas/theme.js')}}"></script>
<script src="{{asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js')}}"></script>

<script src="{{asset('lib/js/yearpicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/jquery.validate.min.js"></script>
<script>
	$(function () {
		$('.select2').select2()
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		$(".yearpicker").yearpicker();

		$('#tabel_umum').DataTable( {
			responsive: true,
			"columnDefs": [
			{ responsivePriority: 1, targets: 0},
			{ responsivePriority: 2, targets: 2}
			]
		});
		bsCustomFileInput.init();

		ClassicEditor
		.create( document.querySelector( '#content' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'alignment' , 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment' ],
			heading: {
				options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
				]
			}
		} )
		.catch( error => {
			console.error( error );
		} );
		ClassicEditor
		.create( document.querySelector( '#content2' ), {
			toolbar: [ 'heading', '|', 'bold', 'italic', 'alignment' , 'link', 'bulletedList', 'numberedList', 'blockQuote', 'alignment' ],
			heading: {
				options: [
				{ model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
				{ model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
				{ model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
				]
			}
		} )
		.catch( error => {
			console.error( error );
		} );

		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
			event.preventDefault();
			$(this).ekkoLightbox();
		});

		@if(Session::has('sukses'))
		toastr.success("{{Session::get('sukses')}}", "sukses");
		@endif
	});
</script>
</body>
</html>